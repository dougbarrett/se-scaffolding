<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		@$viewData->pageList = (array)json_decode(file_get_contents('./ds/pagelist.json'));
		@$viewData->templateList = (array)json_decode(file_get_contents('./ds/templatelist.json'));
		@$viewData->cssList = get_filenames('./ds/less/');
		$this->_showPage('index', $viewData);
	}
	
	public function logout() {
		redirect('');
	}
	
	public function addtemplate() {
		if($this->input->post('templateTitle')) {
			$this->_saveTemplate();
		}
		$this->_showPage('addtemplate');
	}
	
	public function addcss() {
		if($this->input->post('cssName')) {
			$this->_saveCSS();
		}
		$this->_showPage('addCSS');
	}
	
	public function editcss($cssName = null) {
		if($this->input->post('cssName')) {
			$this->_saveCSS($cssName);
		}
		$cssFile->name = $cssName;
		$cssFile->body = read_file('./ds/less/' . $cssName . '.less');
		$this->_showPage('editCSS', $cssFile);
	}
	
	public function addpage(){
		if($this->input->post('pageTitle')) {
			$this->_savePage();
		}
		@$viewData->templateList = (array)json_decode(file_get_contents('./ds/templatelist.json'));
		$this->_showPage('addpage', $viewData);
		
	}
	
	public function editpage($pageURL) {
		if($this->input->post('pageTitle')) {
			$this->_savePage($pageURL);
		}
		$pageInfo = json_decode(file_get_contents("./ds/pages/$pageURL.php"));
		@$pageInfo->templateList = (array)json_decode(file_get_contents('./ds/templatelist.json'));
		$this->_showPage("editpage", $pageInfo);
	}
	
	public function edittemplate($templateHash) {
		if($this->input->post('templateTitle')) {
			$this->_saveTemplate($templateHash);
		}
		$pageInfo = json_decode(file_get_contents("./ds/templates/$templateHash.php"));
		$this->_showPage("edittemplate", $pageInfo);
	}
	
	public function deletepage($pageURL) {
		unlink('./ds/pages/' . $pageURL . '.php');
		
		$pageList = (array)json_decode(file_get_contents("./ds/pagelist.json"));
		
		unset($pageList[$pageURL]);
		
		$data = json_encode($pageList);
				
				if(write_file('./ds/pagelist.json', $data))
			     	redirect('admin');
	}
	
	public function deletetemplate($templateHash) {
		unlink('./ds/templates/' . $templateHash . '.php');
		
		$templateList = (array)json_decode(file_get_contents('./ds/templatelist.json'));
		
		unset($templateList[$templateHash]);
		
		$data = json_encode($templateList);
		
		if(write_file('./ds/templatelist.json', $data))
			redirect('admin');
	}
	
	public function deletecss($cssName) {
		unlink('./ds/less/' . $cssName . '.less');
		unlink('./usercss/' . $cssName . '.css');
		redirect('admin');
	}
	
	/*
	 * Media Info
	 */ 
	public function media()
	{
		$this->_showPage('media/index');
	}
	
	public function addimage(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload())
			redirect('admin/media');
	}
	
	public function addmedia() {
		$config['upload_path'] = './media/';
		$config['allowed_types'] = 'exe|zip|docx|doc|pdf|xls|xlsx|swf|flv|psd|txt';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload())
			redirect('admin/media');
	}
	
	public function deleteimage($imageName) {
		if(unlink('./images/' . $imageName))
			redirect('admin/media');
	}
	
	public function deletemedia($imageName) {
		if(unlink('./media/' . $imageName))
			redirect('admin/media');
	}
	
	public function _showPage($viewPage, $viewData = NULL) {
		$parse->body = $this->load->view('admin/'. $viewPage, $viewData, TRUE);
		$this->parser->parse('admin/template', $parse);
	}
	
	public function _saveCSS($cssName = NULL) {
		
		include('./includes/lessc.php');
		
		if(isset($cssName)) {
			unlink('./ds/less/' . $cssName . '.less');
			unlink('./usercss/' . $cssName . '.css');
		}
		
		$cssBody = $this->input->post('css');
		$cssName = $this->input->post('cssName');
		$cssName = strtolower(str_replace (" ", "", $cssName));
		
		if(write_file('./ds/less/' . $cssName . '.less', $cssBody)) {
			lessc::ccompile("./ds/less/$cssName.less", "./usercss/$cssName.css");
			redirect('admin');
		}
	}
	
	public function _savePage($pageURL = NULL) {
		if(!empty($pageURL))
			unlink("./ds/pages/$pageURL.php");
		
		$fileInfo->title = $this->input->post('pageTitle');
			$fileInfo->hash = random_string('alnum', 16);
			$fileInfo->pageURL = $this->input->post('pageURL');
			$fileInfo->pageBody = $this->input->post('pageBody');
			$fileInfo->pageTemplate = $this->input->post('pageTemplate');
	
			$data = json_encode($fileInfo);
			
	
			if ( ! write_file('./ds/pages/' . $fileInfo->pageURL . '.php', $data))
			{
			     echo 'Unable to write the file';
			}
			else
			{
				$pageList = array();
				$pageList = (array)json_decode(file_get_contents("./ds/pagelist.json"));
				
				if(!empty($pageURL))
					unset($pageList[$pageURL]);
				
				$pageList[$fileInfo->pageURL] = $fileInfo->title;
								
				$data = json_encode($pageList);
				
				if(write_file('./ds/pagelist.json', $data))
			     	redirect('admin');
			}	
	}
	
	public function _saveTemplate($templateHash = NULL) {
		
		$fileInfo->title = $this->input->post('templateTitle');
			$fileInfo->hash = (isset($templateHash)) ? $templateHash : random_string('alnum', 16);
			$fileInfo->body = $this->input->post('templateBody');
			
			$data = json_encode($fileInfo);
			
			if ( ! write_file('./ds/templates/' . $fileInfo->hash . '.php', $data))
			{
			     echo 'Unable to write the file';
			}
			else
			{
				$templateList = array();
				$templateList = (array)json_decode(file_get_contents("./ds/templatelist.json"));
				
				$templateList[$fileInfo->hash] = $fileInfo->title;
				
				$data = json_encode($templateList);
				
				if(write_file('./ds/templatelist.json', $data))
			     	redirect('admin');
			}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
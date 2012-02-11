<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

	public function index()
	{
		$this->_showPage('index');
	}
	
	public function addimage(){
		$config['upload_path'] = './images/';
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			redirect('admin/media');
	}
	
	public function addmedia() {
		$config['upload_path'] = './media/';
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			redirect('admin/media');
	}
	
	public function _showPage($viewPage, $viewData = NULL) {
		$parse->body = $this->load->view('admin/media/'. $viewPage, $viewData, TRUE);
		$this->parser->parse('admin/template', $parse);
	}
	
}
		
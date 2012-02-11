<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function view($pageName)
	{
		
		include('./includes/markdown.php');
		
		$pageName = $this->uri->uri_string();
		$pageName = (empty($pageName)) ? 'index' : str_replace("/", "", $pageName);
		$pageData = file_get_contents("./ds/pages/" . $pageName . ".php");
		
		$pageData = json_decode($pageData);
		
		$templateData = json_decode(file_get_contents("./ds/templates/$pageData->pageTemplate.php"));
		
		$bodyView->imageopen = '<img src="/images/';
		$bodyView->imageclose = '" />';
		$bodyView->imageURL = "/images/";
		$bodyView->mediaURL = "/media/";
		
		$pageData->pageBody = $this->parser->parse_string($pageData->pageBody, $bodyView, TRUE);
		
		$templateView->title = $pageData->title;
		$templateView->body = Markdown($pageData->pageBody);
		$templateView->opencss = '<link rel="stylesheet" href="/usercss/';
		$templateView->closecss = '.css" type="text/css" charset="utf-8"/>';
		$templateView->openimage = '<img src=""';
		$templateView->closeimage = '" />';
		
		$this->parser->parse_string($templateData->body, $templateView);
		

	}
	
	public function _showPage($viewPage, $viewData = NULL) {
		$parse->body = $this->load->view($viewPage, $viewData, TRUE);
		$this->parser->parse('admin/template', $parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
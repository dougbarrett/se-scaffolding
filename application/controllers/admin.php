<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function index()
	{
		
		$this->load->view('admin/index');
	}
	
	public function writeTest(){
		$fileInfo->title = "Title of the webpage";

		$data = 'Some file data';

		if ( ! write_file('./path/to/file.php', $data))
		{
		     echo 'Unable to write the file';
		}
		else
		{
		     echo 'File written!';
		}
	}
	
	public function _showPage($viewPage, $viewData = NULL) {
		$parse->body = $this->load->view($viewPage, $viewData, TRUE);
		$this->parser->parse('admin/template', $parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
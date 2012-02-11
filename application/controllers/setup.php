<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            
            #if(file_exists('./ds/sitesettings.json'))
			#	redirect('admin');
       }
	   
	   public function index() {
	   	if($this->input->post('username')) {
	   		$saveData->hash = random_string('alnum', 32);
			$saveData->username = md5($saveData->hash . $this->input->post('username'));
			$saveData->password = md5($saveData->hash . $this->input->post('password'));
			
			$saveData = json_encode($saveData);
			
			if(write_file('./ds/sitesettings.json', $saveData)) {
				$this->session->set_userdata('loggedin', 1);
				redirect('admin');
			}
	   	}
	   	$this->load->view('setup');
	   }
}
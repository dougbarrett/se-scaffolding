<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            
            if( ! file_exists('./ds/sitesettings.json'))
				redirect('setup');
       }
	   
	   public function index() {
	   	$viewData->loggedin = TRUE;
	   	if($this->input->post('username') && $this->input->post('password')) {
	   		
			$settingsData = json_decode(read_file("./ds/sitesettings.json"));
			
			$viewData->loggedin = FALSE;
						
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
	   		if(($settingsData->username == md5($settingsData->hash . $username) && ($settingsData->password = $settingsData->hash . $password))) {
	   			$this->session->set_userdata('loggedin', 1);
				redirect('admin');
	   		}
	   	}
	   	$this->load->view('login', $viewData);
	   }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array();   
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data['view'] = 'home';         
		$this->load->view('app', $data);
	}
}

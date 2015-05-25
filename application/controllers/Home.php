<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
       
        $em = $this->doctrine->em;
        
        $clients = $em->getRepository('Entities\Clientes')->findAll();        
        var_dump($clients);
        
		$this->load->view('home/index');
	}
}

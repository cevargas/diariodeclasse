<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
       
        $em = $this->doctrine->em;
        
        $data = array();
        
        $disciplinas = $em->getRepository('Entities\Disciplina')->findAll();        
        $data['lista_disciplinas'] = $disciplinas;
        
		$this->load->view('home/index', $data);
	}
}

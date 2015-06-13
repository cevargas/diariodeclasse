<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinas extends CI_Controller {

	public function index()
	{
		$data = array();        		
         
		$em = $this->doctrine->em;
        $disciplinas = $em->getRepository('Entities\Disciplina')->findAll();        
        $data['lista_disciplinas'] = $disciplinas;
        $data['view'] = 'disciplinas/index';

		$this->load->view('app', $data);
	}
}

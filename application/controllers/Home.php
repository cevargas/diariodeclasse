<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array();        
		
        /* Examplo de uso, precisa configurar o banco de dados
		*  Configuracao do doctrine em application/libraries/Doctrine.php
			*/
        
		$em = $this->doctrine->em;
        $disciplinas = $em->getRepository('Entities\Disciplina')->findAll();        
        $data['lista_disciplinas'] = $disciplinas;
        
        var_dump($data);
        
		
		$this->load->view('home/index', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frequencia extends CI_Controller {

    public function __construct() {     
        
        parent::__construct();   
        $this->load->library('form_validation');  
        
    }

	public function index() {
		$this->listar();
	}
    
    public function listar($msg=false) {
        
        if($msg === false)
            $this->session->set_flashdata('error_msg', NULL);
            	
        $data = array();  
        
        $disciplinas = $this->doctrine->em->getRepository('Entities\Frequencia')->findBy(array(), ['codigo' => 'DESC']);
        $data['lista_frequencia'] = $disciplinas;
        $data['view'] = 'frequencia/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {
    
    }
    
    public function editar($codigo) {   
    
    }
    
    public function salvar() {    
 	
    }
    
    public function excluir() {
        
    }
    
    public function pesquisa(){
    
    }
}

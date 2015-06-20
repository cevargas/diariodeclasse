<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinas extends CI_Controller {

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
        
        $disciplinas = $this->doctrine->em->getRepository('Entities\Disciplina')->findBy(array(), ['nome' => 'ASC']);
        $data['lista_disciplinas'] = $disciplinas;
        $data['view'] = 'disciplinas/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {        
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array();
        
        $data['view'] = 'disciplinas/editar';        
		$this->load->view('app', $data);
    
    }
    
    public function editar($codigo) {   
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array(); 
        
        $disciplina = $this->doctrine->em->getRepository('Entities\Disciplina')->findOneBy(array('codigo' => $codigo));

        $data['disciplina'] = $disciplina;
        $data['view'] = 'disciplinas/editar';
        
		$this->load->view('app', $data);
    
    }
    
    public function salvar() {    
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_message('required', 'Disciplina é um campo obrigatório.');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
         
        if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('success_msg', NULL);   
            $this->novo(); 
            
        }
        else {
        
            $codigo = $this->input->post('codigo');
            $nome = $this->input->post('nome');

            $message = '';

            if($codigo) {
                
                $disciplina = $this->doctrine->em->getRepository('Entities\Disciplina')->findOneBy(array('codigo' => $codigo));  
                $message = 'Dados atualizados com sucesso.';
                
            }
            else {
                
                $disciplina = new Entities\Disciplina;
                $message = 'Dados incluídos com sucesso.';
                
            }
            
            $disciplina->setNome($nome);
            
            $this->doctrine->em->persist($disciplina);
            $this->doctrine->em->flush();
            
            $this->session->set_flashdata('success_msg', $message);
            
            redirect('disciplinas');
        }	
    }
    
    public function excluir() {
        
        $codigo = $this->input->post('codigo');
        
        $data = array();
        
        $disciplina = $this->doctrine->em->getRepository('Entities\Disciplina')->findOneBy(array('codigo' => $codigo));

        $this->doctrine->em->remove($disciplina);
        $this->doctrine->em->flush();
        
        $data['return'] = 'success';
        
        echo json_encode($data);
    }
    
    public function pesquisa(){
        
        $data = array();
        
        $this->form_validation->set_rules('disciplina', 'Disciplinca', 'required');
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Informe o nome da Disciplina que deseja pesquisar');
           $this->listar(true); 
            
        }
        else {
            
            $this->session->set_flashdata('error_msg', NULL);
            
            $disciplina_pesquisa = $this->input->post('disciplina');
            $disciplinas = $this->doctrine->em->getRepository('Entities\Disciplina')
                ->createQueryBuilder('d')
                ->where('LOWER(d.nome) LIKE :disciplina')
                ->setParameter('disciplina', '%'.strtolower($disciplina_pesquisa).'%')
                ->getQuery()
                ->getResult();
 
            $data['lista_disciplinas'] = $disciplinas;
            $data['view'] = 'disciplinas/index';

            $this->load->view('app', $data);   
        }       
    }
}

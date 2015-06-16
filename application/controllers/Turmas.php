<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends CI_Controller {

    public function __construct() {        
        parent::__construct();   
        
        $this->load->library('form_validation');  
    }

	public function index() {
		$this->listar();
	}
    
    public function listar() {
            	
        $data = array();  
        
        $turmas = $this->doctrine->em->getRepository('Entities\Turma')->findBy(array(), ['datainicio' => 'ASC']);
        $data['lista_turmas'] = $turmas;
        $data['view'] = 'turmas/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {        
        
        $data = array();
        
        $data['view'] = 'turmas/editar';        
		$this->load->view('app', $data);
    
    }
    
    public function editar($codigo) {        
        
        $data = array(); 
        
        $turma = $this->doctrine->em->getRepository('Entities\Turma')->findOneBy(array('codigo' => $codigo));
        
        $data['turma'] = $turma;
        $data['view'] = 'turma/editar';
        
		$this->load->view('app', $data);
    
    }
    
    public function salvar() {    
 
        $this->form_validation->set_rules('datainicio', 'Data Inicio', 'required');
        $this->form_validation->set_rules('datafim', 'Data Fim', 'required');
        $this->form_validation->set_rules('quantidadeaulas', 'Quantidade de Aulas', 'required');
        $this->form_validation->set_rules('codigodisciplina', 'Código da Disciplina', 'required');
        $this->form_validation->set_rules('codigoprofessor', 'Código do Professor', 'required');
        
        $this->form_validation->set_message('required', '%s é um campo obrigatório.');

        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
         
        if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('success_msg', NULL);            
            $this->novo(); 
            
        }
        else {
        
            $codigo = $this->input->post('codigo');
            $datainicio = $this->input->post('datainicio');
            $datafim = $this->input->post('datafim');
            $quantidadeaulas = $this->input->post('quantidadeaulas');
            $codigoDisciplina = $this->input->post('codigoDisciplina');
            $codigoprofessor = $this->input->post('codigoprofessor');

            $message = '';

            if($codigo) {
                
                $turma = $this->doctrine->em->getRepository('Entities\Turma')->findOneBy(array('codigo' => $codigo));
                $message = 'Dados atualizados com sucesso.';
                
            }
            else {
                
                $turma = new Entities\Turma;                
                $message = 'Dados incluídos com sucesso.';
            }
            
            $turma->setDatainicio($datainicio);
            $turma->setDatafim($datafim);
            $turma->setQuantidadeaulas($email);
            $turma->setCodigoDisciplina($codigoDisciplina);
            $turma->setCodigoProfessor($codigoprofessor);
            
            $this->doctrine->em->persist($turma);
            $this->doctrine->em->flush();
            
            $this->session->set_flashdata('success_msg', $message);
            
            redirect('turmas');
        }	
    }
    
    public function excluir() {
        
        $codigo = $this->input->post('codigo');
        
        $data = array();
        
        $disciplina = $this->doctrine->em->getRepository('Entities\Pessoa')->findOneBy(array('codigo' => $codigo));

        $this->doctrine->em->remove($disciplina);
        $this->doctrine->em->flush();
        
        $data['return'] = 'success';
        
        echo json_encode($data);
    }
    
    public function pesquisa(){
        
        $data = array();
        
        $this->form_validation->set_rules('datainicial', 'Data Inicial', 'required');
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Informe a Data Inicial que deseja pesquisar');
           $this->listar(); 
            
        }
        else {

            $this->session->set_flashdata('error_msg', NULL);
            
            $turma_pesquisa = $this->input->post('datainicial');
            $date = new DateTime($turma_pesquisa);
        
            
            var_dump($date);
            exit;

            $turma = $this->doctrine->em->getRepository('Entities\Turma')
                ->createQueryBuilder('d')
                ->where('d.datainicio = :datainicial')
                ->setParameter('datainicial', $date->format('Y-m-d H:i:s'))
                ->getQuery()
                ->getResult();
 
            $data['lista_turmas'] = $turma;
            $data['view'] = 'turmas/index';

            $this->load->view('app', $data);   
        }       
    }
}

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
        
        $data['lista_turmas'] = $this->doctrine->em->getRepository('Entities\Turma')->findBy(array(), ['codigo' => 'DESC']);		
		$data['turmas_pesq'] = $data['lista_turmas'];
     
        $data['view'] = 'frequencia/index';

		$this->load->view('app', $data);
    }
    
    public function chamada($codigoTurma = false) {

		if($codigoTurma === false)
			redirect('frequencia');
        
        $data = array();
		
		try {
			
       		$data['turma'] = $this->doctrine->em->getRepository('Entities\Turma')
										->findOneBy(array('codigo' => $codigoTurma));
										
			if($data['turma']):
										
				$data['listafrequencia'] = $this->doctrine->em->getRepository('Entities\Frequencia')
											->findBy(array('codigoTurma' => $codigoTurma));

				$data['alunoturma'] = $this->doctrine->em->getRepository('Entities\Alunoturma')
											->findBy(array('codigoTurma' => $codigoTurma));  
											
			else:
				redirect('frequencia');
											
			endif;
			
		} catch(Exception $e) {
			redirect('frequencia');
			//exit($e->getMessage());
		}
		
        $data['view'] = 'frequencia/chamada';

		$this->load->view('app', $data);
    
    }
	
	public function salvar(){

		if(!$this->input->post())
			redirect('frequencia');
		
		$turmacod = $this->input->post('codigo');
		
		$turma = $this->doctrine->em->getRepository('Entities\Turma')
                                    ->findOneBy(array('codigo' => $turmacod));		
									
									
		//deleta frequencia
		$getFrequencias = $this->doctrine->em->getRepository('Entities\Frequencia')
									->findBy(array('codigoTurma' => $turmacod));
									
		if(count($getFrequencias) > 0):
			foreach($getFrequencias as $alfreq):
				$this->doctrine->em->remove($alfreq);
			endforeach;
		endif;

		$frequencias = $this->input->post('frequencia');
		
		foreach($frequencias as $keyf => $alunofreq):
		
			$aluno = $this->doctrine->em->getRepository('Entities\Pessoa')
                                    ->findOneBy(array('codigo' => $keyf));
									
			foreach($alunofreq as $keya => $aulafreq):
				
				$freq = new Entities\Frequencia;
				$freq->setAula($keya);
				$freq->setPresenca($aulafreq);
				$freq->setCodigoAluno($aluno);
				$freq->setCodigoTurma($turma);
				
				$this->doctrine->em->persist($freq);
				
			endforeach;
				
		endforeach;
		
		$this->doctrine->em->flush();
		
		$this->session->set_flashdata('success_msg', 'Chamada realizada com sucesso!');
		redirect('frequencia');
			
	}
	
	public function pesquisa(){
        
        $data = array();
        
        $this->form_validation->set_rules('turmacodigo', 'Turma', 'required');
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Selecione o nome da Turma que deseja pesquisar');
           $this->listar(true); 
            
        }
        else {
            
            $this->session->set_flashdata('error_msg', NULL);
            
            $turma_pesquisa = $this->input->post('turmacodigo');
			
            $data['lista_turmas'] = $this->doctrine->em->getRepository('Entities\Turma')->findBy(array('codigo' => $turma_pesquisa));										
			$data['turmas_pesq'] = $this->doctrine->em->getRepository('Entities\Turma')->findBy(array(), ['codigo' => 'DESC']);						
			      
        	$data['view'] = 'frequencia/index';
			
            $this->load->view('app', $data);   
        }       
    }
	
}
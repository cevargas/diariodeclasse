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
    
    public function listar($msg=false) {
        
        if($msg === false)
            $this->session->set_flashdata('error_msg', NULL);
            	
        $data = array(); 
        
        $turmas = $this->doctrine->em->getRepository('Entities\Turma')->findBy(array(), ['codigo' => 'DESC']);
        $data['lista_turmas'] = $turmas;
        $data['view'] = 'turmas/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {    
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array();
        
        $data['alunos'] = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array('tipo' => 2), ['nome' => 'ASC']);
        $data['pessoas'] = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array('tipo'=>1), ['nome' => 'ASC']);
        $data['disciplinas'] = $this->doctrine->em->getRepository('Entities\Disciplina')->findBy(array(), ['nome' => 'ASC']);
        
        $data['view'] = 'turmas/editar';        
		$this->load->view('app', $data);
    
    }
    
    public function editar($codigo) {
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array(); 
        
        $data['alunoturma'] = $this->doctrine->em->getRepository('Entities\Alunoturma')->findBy(array('codigoTurma' => $codigo));   
        $data['turma'] = $this->doctrine->em->getRepository('Entities\Turma')->findOneBy(array('codigo' => $codigo));
        $data['alunos'] = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array('tipo' => 2), ['nome' => 'ASC']);
        $data['pessoas'] = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array('tipo'=>1), ['nome' => 'ASC']);
        $data['disciplinas'] = $this->doctrine->em->getRepository('Entities\Disciplina')->findBy(array(), ['nome' => 'ASC']);

        $data['view'] = 'turmas/editar';
        
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
            
            $datein = DateTime::createFromFormat('d/m/Y', $datainicio);
            $datein->setTime(0, 0);
            
            $dateoff = DateTime::createFromFormat('d/m/Y', $datafim);
            $dateoff->setTime(0, 0);

            $quantidadeaulas = $this->input->post('quantidadeaulas');
            $codigodisciplina = $this->input->post('codigodisciplina');
            $codigoprofessor = $this->input->post('codigoprofessor');
            
            $professor = $this->doctrine->em->getRepository('Entities\Pessoa')
                                        ->findOneBy(array('codigo' => $codigoprofessor, 'tipo' => 1));
            
            $disciplina = $this->doctrine->em->getRepository('Entities\Disciplina')
                                            ->findOneBy(array('codigo' => $codigodisciplina));
        
            $message = '';

            if($professor and $disciplina):
            
                if($codigo) :
                    //insert
                    $turma = $this->doctrine->em->getRepository('Entities\Turma')
                                            ->findOneBy(array('codigo' => $codigo));
            
                    if($turma):
                        $message = 'Dados atualizados com sucesso.';
            
                    else: 
                        $this->session->set_flashdata('error_msg', 'Dados inválidos!');
                        $this->listar(true);
            
                    endif;
            
                else:            
                    //update
                    $turma = new Entities\Turma;                
                    $message = 'Dados incluídos com sucesso.';

                endif;
                        
                $turma->setDatainicio($datein);
                $turma->setDatafim($dateoff);
                $turma->setQuantidadeaulas($quantidadeaulas);
                $turma->setCodigoDisciplina($disciplina);
                $turma->setCodigoProfessor($professor);
                
                //salva nova turma
                $this->doctrine->em->persist($turma);
            
                //deleta da alunoturma       
                $getAlunosTurma = $this->doctrine->em->getRepository('Entities\Alunoturma')
                                            ->findBy(array('codigoTurma' => $turma->getCodigo()));

                if(count($getAlunosTurma) > 0):
                    foreach($getAlunosTurma as $alTurm):
                        $this->doctrine->em->remove($alTurm);
                    endforeach;
                endif;
                                                     
                //lista de alunos
                $alunos = $this->input->post('alunos');
            
                if($alunos):

                    foreach($alunos as $aluno):  
            
                        $alunosTurma = new Entities\Alunoturma;

                        $getAluno = $this->doctrine->em->getRepository('Entities\Pessoa')
                                            ->findOneBy(array('codigo' => $aluno, 'tipo' => 2));

                        $alunosTurma->setCodigoAluno($getAluno);
                        $alunosTurma->setCodigoTurma($turma);
                        
                        //salva alunos da turma
                        $this->doctrine->em->persist($alunosTurma);
                        
                    endforeach;

                endif;
                
                $this->doctrine->em->flush();
                $this->session->set_flashdata('success_msg', $message);

                redirect('turmas');           
                          
            else:
                $this->session->set_flashdata('error_msg', 'Dados inválidos!');
                $this->listar(true);
                
            endif;
            
        }	
    }
    
    public function excluir() {
        
        $data = array();
        
        $codigo = $this->input->post('codigo');
        $turma = $this->doctrine->em->getRepository('Entities\Turma')->findOneBy(array('codigo' => $codigo));

        //deleta da alunoturma       
        $getAlunosTurma = $this->doctrine->em->getRepository('Entities\Alunoturma')
                                    ->findBy(array('codigoTurma' => $turma->getCodigo()));

        if(count($getAlunosTurma) > 0):
            foreach($getAlunosTurma as $alTurm):
                $this->doctrine->em->remove($alTurm);
            endforeach;
        endif;

        //deleta turma
        $this->doctrine->em->remove($turma);
        
        $this->doctrine->em->flush();
        
        $data['return'] = 'success';
        
        echo json_encode($data);
    }
    
    public function pesquisa(){
        
        $data = array();
        
        $this->form_validation->set_rules('datainicialpesq', 'Data Inicial', 'required');
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Informe a Data Inicial que deseja pesquisar');
           $this->listar(true); 
            
        }
        else {

            $this->session->set_flashdata('error_msg', NULL);
            
            $turma_pesquisa = $this->input->post('datainicialpesq');

            $date = DateTime::createFromFormat('d/m/Y', $turma_pesquisa);
            $date->setTime(0, 0);

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
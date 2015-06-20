<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends CI_Controller {

    public function __construct() { 
        parent::__construct();   
        $this->load->library('form_validation');
    }

	public function index() {
        $this->session->set_flashdata('error_msg', NULL);
		$this->listar();
	}
    
    public function listar($msg=false) {
        
        if($msg === false)
            $this->session->set_flashdata('error_msg', NULL);
            	
        $data = array();  
        
        $pessoas = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array(), ['nome' => 'ASC']);
        $data['lista_pessoas'] = $pessoas;
        $data['view'] = 'pessoas/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {     
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array();
        
        $data['view'] = 'pessoas/editar';        
		$this->load->view('app', $data);
    
    }
    
    public function editar($codigo) { 
        
        $this->session->set_flashdata('error_msg', NULL);
        
        $data = array(); 
        
        $pessoa = $this->doctrine->em->getRepository('Entities\Pessoa')->findOneBy(array('codigo' => $codigo));
        
        $data['pessoa'] = $pessoa;
        $data['view'] = 'pessoas/editar';
        
		$this->load->view('app', $data);
    
    }
    
    public function salvar() {    
 
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required|trim');
        
        $this->form_validation->set_message('required', '%s é um campo obrigatório.');
        $this->form_validation->set_message('valid_email', 'Informe um email válido.');
        $this->form_validation->set_message('min_length', 'Senha deve ter no mínimo 3 caracteres.');
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
         
        if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('success_msg', NULL);            
            $this->novo(); 
            
        }
        else {
        
            $codigo = $this->input->post('codigo');
            $nome = $this->input->post('nome');
            $endereco = $this->input->post('endereco');
            $email = $this->input->post('email');
            $ddd = $this->input->post('ddd');
            $telefone = $this->input->post('telefone');
            $tipo = $this->input->post('tipo');
            $senha = $this->input->post('senha');
            
            $message = '';

            if($codigo) {
                
                $pessoa = $this->doctrine->em->getRepository('Entities\Pessoa')->findOneBy(array('codigo' => $codigo));
                $message = 'Dados atualizados com sucesso.';
                
            }
            else {
                
                $pessoa = new Entities\Pessoa;                
                $message = 'Dados incluídos com sucesso.';
            }
            
            $pessoa->setNome($nome);
            $pessoa->setEndereco($endereco);
            $pessoa->setEmail($email);
            $pessoa->setDdd($ddd);
            $pessoa->setTelefone($telefone);
            $pessoa->setTipo($tipo);
            $pessoa->setSenha($senha); 
            
            $this->doctrine->em->persist($pessoa);
            $this->doctrine->em->flush();
            
            $this->session->set_flashdata('success_msg', $message);
            
            redirect('pessoas');
        }	
    }
    
    public function excluir() {
        
        $data = array();
        
        $codigo = $this->input->post('codigo');
        $pessoa = $this->doctrine->em->getRepository('Entities\Pessoa')->findOneBy(array('codigo' => $codigo));
        
        //deleta da alunoturma       
        $getAlunosTurma = $this->doctrine->em->getRepository('Entities\Alunoturma')
                                    ->findBy(array('codigoAluno' => $pessoa->getCodigo()));

        if(count($getAlunosTurma) > 0):
            foreach($getAlunosTurma as $alTurm):
                $this->doctrine->em->remove($alTurm);
            endforeach;
        endif;

        $this->doctrine->em->remove($pessoa);
        $this->doctrine->em->flush();
        
        $data['return'] = 'success';
        
        echo json_encode($data);
    }
    
    public function pesquisa(){
        
        $data = array();
        
        $pessoa_pesquisa = $this->input->post('nome');
        $tipo = (string)$this->input->post('tipopessoa');
        
        if(strlen($pessoa_pesquisa) > 0)
        {
            $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        }
        
        if(strlen($tipo) > 0)
        {
            $this->form_validation->set_rules('tipopessoa', 'Tipo', 'required|trim');
        }
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Informe o Nome ou o Tipo de Pessoa que deseja pesquisar');
           $this->listar(true); 
            
        }
        else {
            
            $this->session->set_flashdata('error_msg', NULL);
             
            $find = ($pessoa_pesquisa) ? "where LOWER(p.nome) LIKE '%".$pessoa_pesquisa."%' " : NULL;
            $find .= ($tipo) ? (($pessoa_pesquisa) ? "and " : "where ") . "p.tipo = '".$tipo."' " : NULL;        
            
            $q = $this->doctrine->em->createQuery("select p from Entities\Pessoa p ".$find." ");

            $pessoas = $q->getResult();           
 
            $data['lista_pessoas'] = $pessoas;
            $data['view'] = 'pessoas/index';

            $this->load->view('app', $data);   
        }       
    }
}

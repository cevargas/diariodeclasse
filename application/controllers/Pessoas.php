<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends CI_Controller {

    public function __construct() {        
        parent::__construct();   
        
        $this->load->library('form_validation');  
    }

	public function index() {
		$this->listar();
	}
    
    public function listar() {
            	
        $data = array();  
        
        $pessoas = $this->doctrine->em->getRepository('Entities\Pessoa')->findBy(array(), ['nome' => 'ASC']);
        $data['lista_pessoas'] = $pessoas;
        $data['view'] = 'pessoas/index';

		$this->load->view('app', $data);
    }
    
    public function novo() {        
        
        $data = array();
        
        $data['view'] = 'pessoas/editar';        
		$this->load->view('app', $data);
    
    }
    
    public function editar($codigo) {        
        
        $data = array(); 
        
        $pessoa = $this->doctrine->em->getRepository('Entities\Pessoa')->findOneBy(array('codigo' => $codigo));
        
        $data['pessoa'] = $pessoa;
        $data['view'] = 'pessoas/editar';
        
		$this->load->view('app', $data);
    
    }
    
    public function salvar() {    
 
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');
        
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
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
         
        if ($this->form_validation->run() == FALSE) {
            
           $this->session->set_flashdata('error_msg', 'Informe o nome da Pessoa que deseja pesquisar');
           $this->listar(); 
            
        }
        else {
            
            $this->session->set_flashdata('error_msg', NULL);
            
            $pessoa_pesquisa = $this->input->post('nome');
            $pessoas = $this->doctrine->em->getRepository('Entities\Pessoa')
                ->createQueryBuilder('d')
                ->where('LOWER(d.nome) LIKE :nome')
                ->setParameter('nome', '%'.strtolower($pessoa_pesquisa).'%')
                ->getQuery()
                ->getResult();
 
            $data['lista_pessoas'] = $pessoas;
            $data['view'] = 'pessoas/index';

            $this->load->view('app', $data);   
        }       
    }
}

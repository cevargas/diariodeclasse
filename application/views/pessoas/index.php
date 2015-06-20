<div class="panel panel-default">
    <div class="panel-body">        
        
        <form id="frm-pesquisa" action="<?php echo base_url()?>pessoas/pesquisa" method="post" class="form-inline pull-left">
            <div class="form-group">
                <input type="text" class="form-control input-sm" 
                    id="nome" 
                    name="nome" 
                    value="<?php if($this->input->post('nome')): 
                                    echo $this->input->post('nome'); 
                                  endif;?>"
                     placeholder="Nome">
            </div>
            
            <div class="form-group">
                <select name="tipopessoa" class="form-control input-sm">       
                    <option value="">Selecione</option>
                    
                    <?php
                        $prof = '';
                        $alun = '';
                        if($this->input->post('tipopessoa')):
                            $prof = ($this->input->post('tipopessoa') == 1) ? 'selected' : '';
                            $alun = ($this->input->post('tipopessoa') == 2) ? 'selected' : '';
                        endif;
                    ?>
                    <option value="1" <?php echo $prof;?>>Professor</option>
                    <option value="2" <?php echo $alun;?>>Aluno</option>
                </select>  
            </div>  
                         
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-search"></i> Pesquisar</button>
        </form>        
        
        <div class="btn-group pull-right" role="group">
            <a class="btn btn-success btn-sm" href="<?php echo base_url()?>pessoas/novo">
                <i class="fa fa-plus-circle"></i> Adicionar Pessoa
            </a>&nbsp;
            <a class="btn btn-info btn-sm" href="<?php echo base_url()?>pessoas/listar">
                <i class="fa fa-refresh"></i> Listar Todas
            </a>
        </div>
    </div>
</div>

<table class="table table-responsive table-striped">

    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th colspan="2"></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($lista_pessoas as $key=> $val): ?>
        <tr id="tr_<?php echo $val->getCodigo();?>">
            <td class="col-md-1">
                <?php echo $val->getCodigo();?>
            </td>                
            <td class="col-md-4">
                <?php echo $val->getNome();?>
            </td>                
            <td class="col-md-3">
                <?php echo $val->getEmail();?>
            </td>                
            <td class="col-md-2">
                <?php echo ($val->getTipo() == 1) ? "Professor" : "Estudante";?>
            </td>                
            <td class="col-md-1">
                <a href="<?php echo base_url()?>pessoas/editar/<?php echo $val->getCodigo();?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil-square-o"></i> Editar</a>
            </td>
            <td class="col-md-1">
                <a href="#" type="button" 
                   data-id="<?php echo $val->getCodigo();?>" 
                   data-url="<?php echo base_url()?>pessoas" 
                   class="btn btn-danger btn-sm" 
                   data-toggle="modal" 
                   data-target="#confirm-dialog">
                    <i class="fa fa-times"></i> Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php
            if(count($lista_pessoas) <= 0):
        ?>
            <tr>
                <td colspan="6" class="col-md-12">
                    Nenhuma informação encontrada. 
                </td>
            </tr>            
        <?php
            endif;
        ?>        
    </tbody>
</table>

<div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Confirmação</h4>
            </div>
            <div class="modal-body">
                <p>Deseja mesmo excluir esta Pessoa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="delete" type="button" class="btn btn-danger" data-dismiss="modal">Excluir</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
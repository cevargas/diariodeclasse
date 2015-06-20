<div class="panel panel-default">
    <div class="panel-body">        
        
        <form id="frm-pesquisa" action="<?php echo base_url()?>turmas/pesquisa" method="post" class="form-inline pull-left">
            <div class="form-group">
                 <div id="datepesquturma" class='input-group date'>
                   
                    <input type='text' class="form-control" 
                        name="datainicialpesq"
                        id="datainicialpesq"
                        placeholder="Data Inicial"
                        value="<?php if($this->input->post('datainicialpesq')): echo set_value('datainicialpesq'); endif;?>"/>
                        
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>           
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-search"></i> Pesquisar</button>
        </form>        
        
        <div class="btn-group pull-right" role="group">
            <a class="btn btn-success btn-sm" href="<?php echo base_url()?>turmas/novo">
                <i class="fa fa-plus-circle"></i> Adicionar Turma
            </a>&nbsp;
            <a class="btn btn-info btn-sm" href="<?php echo base_url()?>turmas/listar">
                <i class="fa fa-refresh"></i> Listar Todas
            </a>
        </div>
    </div>
</div>

<table class="table table-responsive table-striped">

    <thead>
        <tr>
            <th>Código</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Aulas</th>
            <th>Disciplina</th>
            <th>Professor</th>
            <th colspan="2"></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($lista_turmas as $key=> $val): ?>
        <tr id="tr_<?php echo $val->getCodigo();?>">
            <td class="col-md-1">
                <?php echo $val->getCodigo();?>
            </td>                
            <td class="col-md-1">                 
                 <?php 
                    if($val->getDatainicio()):
                        echo $val->getDatainicio()->format('d/m/Y');
                    endif;
                ?>    
            </td>   
            <td class="col-md-1">                 
                 <?php 
                    if($val->getDatafim()):
                        echo $val->getDatafim()->format('d/m/Y');
                    endif;
                ?>    
            </td>
            <td class="col-md-1">
                 <?php echo $val->getQuantidadeaulas();?>
            </td>                
            <td class="col-md-4">
                <?php echo $val->getCodigoDisciplina()->getNome();?>
            </td>                
            <td class="col-md-2">
                <?php echo $val->getCodigoProfessor()->getNome();?>
            </td>                
            <td class="col-md-1">
                <a href="<?php echo base_url()?>turmas/editar/<?php echo $val->getCodigo();?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil-square-o"></i> Editar</a>
            </td>
            <td class="col-md-1">
                <a href="#" type="button" 
                   data-id="<?php echo $val->getCodigo();?>" 
                   data-url="<?php echo base_url()?>turmas" 
                   class="btn btn-danger btn-sm" 
                   data-toggle="modal" 
                   data-target="#confirm-dialog">
                    <i class="fa fa-times"></i> Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
        
        <?php
            if(count($lista_turmas) <= 0):
        ?>
            <tr>
                <td colspan="12" class="col-md-12">
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
                <p>Deseja mesmo excluir esta Turma?</p>
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
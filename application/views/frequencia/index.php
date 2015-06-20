<div class="panel panel-default">
    <div class="panel-body">       
    
         <form id="frm-pesquisa" action="<?php echo base_url()?>frequencia/pesquisa" method="post" class="form-inline pull-left">
            
            <div class="form-group">
                <select name="turmacodigo" class="form-control input-sm">       
                    <option value="">Selecione</option>
                    <?php foreach($turmas_pesq as $key => $val): 
							$sel = '';
							if($this->input->post('turmacodigo') == $val->getCodigo())
								$sel = 'selected';
						?>
                    	<option value="<?php echo $val->getCodigo();?>" <?php echo $sel;?>><?php echo $val->getCodigoDisciplina()->getNome();?></option>
					<?php endforeach; ?>
                </select>  
            </div>  
                         
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-search"></i> Pesquisar</button>
        </form>  

        <div class="btn-group pull-right" role="group">
            <a class="btn btn-info btn-sm" href="<?php echo base_url()?>frequencia/listar">
                <i class="fa fa-refresh"></i> Listar Todas
            </a>
        </div>
    </div>
</div>

<table class="table table-responsive table-striped">

    <thead>
        <tr>
            <th>Código</th>
            <th>Turma</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($lista_turmas as $key=> $val): ?>
        <tr id="tr_<?php echo $val->getCodigo();?>">
            <td class="col-md-1">
                <?php echo $val->getCodigo();?>
            </td>    
            <td class="col-md-10">
                <?php echo $val->getCodigoDisciplina()->getNome();?>
            </td>   
            <td class="col-md-1">
                <a href="<?php echo base_url()?>frequencia/chamada/<?php echo $val->getCodigo();?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil-square-o"></i> Chamada</a>
            </td>             
        </tr>
        <?php endforeach; ?>
        
        <?php
            if(count($lista_turmas) <= 0):
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
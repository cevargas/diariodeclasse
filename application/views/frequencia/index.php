<div class="panel panel-default">
    <div class="panel-body">        

        <div class="btn-group pull-right" role="group">
            <a class="btn btn-success btn-sm" href="<?php echo base_url()?>frequencia/novo">
                <i class="fa fa-plus-circle"></i> Chamada
            </a>&nbsp;
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
        </tr>
    </thead>

    <tbody>
        <?php foreach($lista_frequencia as $key=> $val): ?>
        <tr id="tr_<?php echo $val->getCodigo();?>">
            <td class="col-md-12">
                <?php echo $val->getCodigo();?>
            </td>                
        </tr>
        <?php endforeach; ?>
        <?php
            if(count($lista_frequencia) <= 0):
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
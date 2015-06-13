<div class="col-md-12">

    <?php if($this->session->flashdata('success_msg')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
    <?php endif; ?>

    <div class="pull-right">
        <a href="<?php echo base_url()?>disciplinas/novo" class="btn btn-info btn-sm">
            <i class="fa fa-plus-circle"></i> Novo
        </a>
    </div>

    <table class="table table-hover">

        <thead>
            <tr>
                <th>#</th>
                <th>Disciplina</th>
                <th colspan="2"></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($lista_disciplinas as $key=> $val): ?>
            <tr id="tr_<?php echo $val->getCodigo();?>">
                <td>
                    <?php echo $val->getCodigo();?></td>
                <td>
                    <?php echo $val->getNome();?></td>
                <td>
                    <a href="<?php echo base_url()?>disciplinas/editar/<?php echo $val->getCodigo();?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-square-o"></i> Editar</a>
                </td>
                <td>
                    <a href="#" type="button" data-id="<?php echo $val->getCodigo();?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm-dialog">
                        <i class="fa fa-times"></i> Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja mesmo excluir esta disciplina?</p>
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

</div>
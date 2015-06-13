<div class="col-md-3">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Disciplinas</h3>
        </div>
        <div class="panel-body">
            Lista de Disciplinas do Curso
        </div>
    </div>

</div>

<div class="col-md-9">

    <table class="table table-hover">

        <thead>
            <tr>
                <th>#</th>
                <th>Disciplina</th>
                <th>Opções</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($lista_disciplinas as $key=> $val): ?>
            <tr>
                <td>
                    <?php echo $val->getCodigo();?></td>
                <td>
                    <?php echo $val->getNome();?></td>
                <td>
                    <a href="javascript:;" class="btn btn-info btn-sm editar" data-id="<?php echo $val->getCodigo();?>">
                        <i class="fa fa-pencil-square-o"></i> Editar</a>
                </td>
                <td>
                    <a href="javascript:;" type="button" class="btn btn-info btn-sm excluir" data-id="<?php echo $val->getCodigo();?>">
                        <i class="fa fa-times"></i> Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
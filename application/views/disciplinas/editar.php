<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Disciplinas</div>
    <div class="panel-body">

        <?php echo validation_errors(); ?>

        <form name="frm_disciplinas" action="<?php echo base_url()?>disciplinas/salvar" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Disciplina</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" placeholder="Nome da Disciplina" value="<?php if(isset($disciplina)) : echo $disciplina->getNome(); else: echo set_value('nome'); endif;?>">
                </div>
            </div>
            
            <input type="hidden" name="codigo" value="<?php if(isset($disciplina)) : echo $disciplina->getCodigo(); else: echo set_value('codigo'); endif; ?>">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="<?php echo base_url()?>disciplinas" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>

    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Turmas</div>
    <div class="panel-body">

        <?php echo validation_errors(); ?>

        <form name="frm_pessoas" action="<?php echo base_url()?>turmas/salvar" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Data Inicial</label>
                <div class="col-sm-4">
                    <div class='input-group date datetimepicker'>
                        <input type="text" class="form-control" name="datainicio" placeholder="Data Inicial" value="<?php if(isset($turma)) : echo $turma->getDatainicio()->format('d/m/Y'); else: echo set_value('datainicio'); endif;?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Data Final</label>
                <div class="col-sm-4">
                    <div class='input-group date datetimepicker'>
                        <input type="text" class="form-control" name="datafim" placeholder="Data Final" value="<?php if(isset($turma)) : echo $turma->getDatafim()->format('d/m/Y'); else: echo set_value('datainicio'); endif;?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Disciplinas</label>
                <div class="col-sm-4">
                    <select name="codigodisciplina" class="form-control">
                        <option value="">Selecione</option>
                        <?php
                            foreach($disciplinas as $disciplina):

                            $sel = '';
                            if(isset($turma)):
                                if($disciplina->getCodigo() == $turma->getCodigoDisciplina()->getCodigo()):
                                    $sel = 'selected';
                                endif;
                            endif;
                        ?>
                            <option value="<?php echo $disciplina->getCodigo();?>" <?php echo $sel;?>><?php echo $disciplina->getNome()?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Professor</label>
                <div class="col-sm-4">
                    <select name="codigoprofessor" class="form-control">
                        <option value="">Selecione</option>
                        <?php
                            foreach($pessoas as $pessoa):

                            $selp = '';
                            if(isset($turma)):                               
                                if($pessoa->getCodigo() == $turma->getCodigoProfessor()->getCodigo()):
                                    $selp = 'selected';
                                endif;
                            endif;
                        ?>
                            <option value="<?php echo $pessoa->getCodigo();?>" <?php echo $selp;?>><?php echo $pessoa->getNome()?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Quant. Aulas</label>
                <div class="col-sm-4">                  
                    <input type="text" class="form-control" name="quantidadeaulas" placeholder="Quantidade de Aulas" value="<?php if(isset($turma)) : echo $turma->getQuantidadeaulas(); else: echo set_value('quantidadeaulas'); endif;?>">
                </div>
            </div>            
            
            <input type="hidden" name="codigo" value="<?php if(isset($turma)) : echo $turma->getCodigo(); else: echo set_value('codigo'); endif; ?>">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="<?php echo base_url()?>turmas" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>

    </div>
</div>
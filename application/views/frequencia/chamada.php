<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $turma->getCodigoDisciplina()->getNome();?></div>
    <div class="panel-body">

        <?php echo validation_errors(); ?>

        <form name="frm_frequencia" action="<?php echo base_url()?>frequencia/salvar" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="col-sm-3">Alunos</th>
                                <th class="col-sm-9" colspan="<?php echo $turma->getQuantidadeaulas();?>">Aulas</th>
                            </tr>
                            <tr>
                                <th></th>                             
                                <?php
                                    $qtdaulas = $turma->getQuantidadeaulas();
									for($i=1;$i<=$qtdaulas;$i++):
								?>
                                    <th>
                                        <?php
                                            echo $i;
                                        ?>
                                    </th>
                                <?php
									endfor;
								?>    
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
						   		$salvar = true;
			
                                if(isset($alunoturma)):
                                    if(count($alunoturma) > 0):                                        
                                        foreach($alunoturma as $alunot):
										?>
										 <tr>
                                            <td>
                                            	<input type="hidden" name="alunos[]" value="<?php echo $alunot->getCodigoAluno()->getCodigo();?>" /> 
                                           		<?php echo $alunot->getCodigoAluno()->getNome();?>
                                            </td>
                                           
											<?php
                                                if(isset($turma)) :
                                                    $qtd = $turma->getQuantidadeaulas();
                                                    
                                                    for($i=1;$i<=$qtd;$i++):													
																									
														$checkp = '';
														$checkf = '';
														$checkj = '';
														
														foreach($listafrequencia as $lfreq):
															if( ($lfreq->getAula() == $i)
																	and ($lfreq->getCodigoAluno()->getCodigo() == $alunot->getCodigoAluno()->getCodigo())
																	and ($lfreq->getPresenca() == 'P')
																):
																$checkp = 'checked';
															endif;	
															
															if( ($lfreq->getAula() == $i)
																	and ($lfreq->getCodigoAluno()->getCodigo() == $alunot->getCodigoAluno()->getCodigo())
																	and ($lfreq->getPresenca() == 'F')
																):
																$checkf = 'checked';
															endif;	
															
															if( ($lfreq->getAula() == $i)
																	and ($lfreq->getCodigoAluno()->getCodigo() == $alunot->getCodigoAluno()->getCodigo())
																	and ($lfreq->getPresenca() == 'J')
																):
																$checkj = 'checked';
															endif;	
															
														endforeach;		
                                                    ?>	
                                                    <td>	
                                                    	<div class="radio">											
                                                        <label class="radio">
                                                            <input type="radio" <?php echo $checkp;?>
                                                            	name="frequencia[<?php echo $alunot->getCodigoAluno()->getCodigo();?>][<?php echo $i?>]"
                                                                value="P">P
                                                        </label> 
                                                        </div>
                                                        <div class="radio">
                                                        <label class="radio">
                                                            <input type="radio" <?php echo $checkf;?>
                                                            	name="frequencia[<?php echo $alunot->getCodigoAluno()->getCodigo();?>][<?php echo $i?>]"
                                                                value="F">F
                                                        </label> 
                                                        </div>
                                                        <div class="radio">
                                                        <label class="radio">
                                                            <input type="radio" <?php echo $checkj;?> 
                                                            	name="frequencia[<?php echo $alunot->getCodigoAluno()->getCodigo();?>][<?php echo $i?>]"
                                                                value="J">J
                                                        </label> 
                                                        </div>
                                                    </td>                                                          
                                                    <?php
                                                    endfor;														
                                                endif;
                                            ?>
                                        </tr>	
										<?php
                                        endforeach;

                                    else:
                                        $salvar = false;
									?>
                            	 		<tr>
                                            <td colspan="<?php echo $turma->getQuantidadeaulas()+2;?>" class="col-sm-12">
                                            		Nenhum aluno matriculado nesta Disciplina.
                                            </td>
                                        </tr>	
                            		<?php
                                    endif;
                                endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <input type="hidden" name="codigo" value="<?php if(isset($turma)) : echo $turma->getCodigo(); else: echo set_value('codigo'); endif; ?>">

            <div class="form-group">
                <div class="col-sm-12">
                    <?php if($salvar == true) :?>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    <?php endif;?>
                    <a href="<?php echo base_url()?>frequencia" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>

    </div>
</div>
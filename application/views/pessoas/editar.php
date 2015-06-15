<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Pessoas</div>
    <div class="panel-body">

        <?php echo validation_errors(); ?>

        <form name="frm_pessoas" action="<?php echo base_url()?>pessoas/salvar" method="post" class="form-horizontal">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php if(isset($pessoa)) : echo $pessoa->getNome(); else: echo set_value('nome'); endif;?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Telefone</label>
                 <div class="col-sm-1">
                    <input type="text" class="form-control" name="ddd" placeholder="DDD" value="<?php if(isset($pessoa)) : echo $pessoa->getDdd(); else: echo set_value('ddd'); endif;?>">
                </div>
                
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php if(isset($pessoa)) : echo $pessoa->getTelefone(); else: echo set_value('telefone'); endif;?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Endereço</label>                 
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço" value="<?php if(isset($pessoa)) : echo $pessoa->getEndereco(); else: echo set_value('endereco'); endif;?>">
                </div>
            </div>
            
             <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Email</label>                 
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($pessoa)) : echo $pessoa->getEmail(); else: echo set_value('email'); endif;?>" autocomplete="off" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Tipo</label>                 
                <div class="col-sm-4">
                  
                    <?php 

                        $tp = NULL;
                        $prof = NULL;
                        $alun = NULL;

                        if(isset($pessoa)): 
                            $tp = $pessoa->getTipo();
                        elseif($this->input->post('tipo')):
                            $tp = $this->input->post('tipo');
                        endif;

                        if($tp == '1'):
                            $prof = 'selected'; 
                        elseif($tp == '2'):
                            $alun = 'selected';
                        endif;
                    ?>
                   
                   <select name="tipo" class="form-control">
                      <option value="">Selecione</option>
                      <option value="1" <?php echo $prof;?>>Professor</option>
                      <option value="2" <?php echo $alun;?>>Estudante</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Senha</label>                
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" value="" autocomplete="off">
                </div>
            </div>

            <input type="hidden" name="codigo" value="<?php if(isset($pessoa)) : echo $pessoa->getCodigo(); else: echo set_value('codigo'); endif; ?>">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="<?php echo base_url()?>pessoas" class="btn btn-default">Cancelar</a>
                </div>
            </div>

        </form>

    </div>
</div>
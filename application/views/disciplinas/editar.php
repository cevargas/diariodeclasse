<div class="col-md-12">
    
    <?php echo validation_errors(); ?>
    
    <form name="frm_disciplinas" action="<?php echo base_url()?>disciplinas/salvar" method="post">
        
        <div class="form-group">
            <label for="nome">Disciplina</label>
            <input type="text" class="form-control" name="nome" placeholder="Disciplina" 
                   value="<?php if(isset($disciplina)) : echo $disciplina->getNome(); endif;?>">
        </div>
        
        <input type="hidden" name="codigo" value="<?php if(isset($disciplina)) : echo $disciplina->getCodigo(); endif; ?>">

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?php echo base_url()?>disciplinas" class="btn btn-default">Cancelar</a>

    </form>

</div>
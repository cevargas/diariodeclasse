<ul class="nav nav-pills nav-stacked">

    <li role="presentation" class="<?php if($this->uri->segment(1) == 'home' or !$this->uri->segment(1)) echo 'active';?>">
        <a href="<?php echo base_url();?>home">Home</a>
    </li>
    <li role="presentation" class="<?php if($this->uri->segment(1) == 'disciplinas') echo 'active';?>">
        <a href="<?php echo base_url();?>disciplinas">Disciplinas</a>
    </li>
    <li role="presentation" class="<?php if($this->uri->segment(1) == 'alunos') echo 'active';?>">
        <a href="<?php echo base_url();?>alunos">Alunos</a>
    </li>
    <li role="presentation" class="<?php if($this->uri->segment(1) == 'frequencia') echo 'active';?>">
        <a href="<?php echo base_url();?>frequencia">Frequência</a>
    </li>
    <li role="presentation" class="<?php if($this->uri->segment(1) == 'turmas') echo 'active';?>">
        <a href="<?php echo base_url();?>turmas">Turmas</a>
    </li>

</ul>
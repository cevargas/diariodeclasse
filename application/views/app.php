<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
        Doctrine ORM - Persistência e Armazenamento de Dados
    </title>

    <?php 
        $this->minify->css(array('bootstrap/css/bootstrap.min.css', 
                                 'bootstrap/css/bootstrap-theme.min.css', 
                                 'assets/css/custom.css', 
                                 'assets/css/fonts.css',
                                 'require.css'));
        echo $this->minify->deploy_css(true); 
    ?>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Diário de Classe</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                        <ul class="nav navbar-nav">                            
                            <li class="<?php if($this->uri->segment(1) == 'home') echo 'active';?>">
                                <a href="<?php echo base_url();?>home">Home</a>
                            </li>                            
                            <li class="<?php if($this->uri->segment(1) == 'disciplinas') echo 'active';?>">
                                <a href="<?php echo base_url();?>disciplinas">Disciplinas</a>
                            </li>                            
                            <li class="<?php if($this->uri->segment(1) == 'alunos') echo 'active';?>">
                                <a href="<?php echo base_url();?>alunos">Alunos</a>
                            </li>                            
                            <li class="<?php if($this->uri->segment(1) == 'frequencia') echo 'active';?>">
                                <a href="<?php echo base_url();?>frequencia">Frequência</a>
                            </li>                            
                            <li class="<?php if($this->uri->segment(1) == 'turmas') echo 'active';?>">
                                <a href="<?php echo base_url();?>turmas">Turmas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="col-md-12">
                <?php $this->load->view($view);?>     
            </div>

        </div>
    </div>
        
    <script data-main="bootstrap" src="components/require.js"></script>
    
</body>
</html>
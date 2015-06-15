<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Carlos Eduardo de Vargas">
    
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url()?>components/assets/images/favicon.ico' />

    <title>
        Doctrine ORM - Persistência e Armazenamento de Dados
    </title>

    <?php 
        $this->minify->css(array('bootstrap/css/bootstrap.min.css', 
                                 'custom/css/custom.css', 
                                 'custom/css/fonts.css',
                                 'toastr/toastr.css',
                                 'font-awesome/css/font-awesome.min.css'));
        echo $this->minify->deploy_css(true); 
    ?>
    
    <?php 
        $this->minify->js(array('jquery/jquery-1.11.3.min.js',
                                'bootstrap/js/bootstrap.min.js',
                                'toastr/toastr.js',
                                'custom/js/scripts.js'));
        echo $this->minify->deploy_js(true); 
    ?>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-default navbar-static-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Diário de Classe</a>
                    </div>
                </div>
            </nav>

            <div class="col-md-2">
                <?php $this->load->view('menu.php');?>     
            </div>
           
            <div class="col-md-10">
                <?php $this->load->view($view);?>     
            </div>

        </div>
    </div>
    
    <?php if($this->session->flashdata('success_msg')) : ?>
        <script>
            $(function () {
                toastr.success('<?php echo $this->session->flashdata('success_msg');?>', 'Sucesso');
            });
        </script>   
    <?php endif; ?>
    
     <?php if($this->session->flashdata('error_msg')) : ?>
        <script>
            $(function () {
                toastr.warning('<?php echo $this->session->flashdata('error_msg');?>', 'Opss..');
            });
        </script>   
    <?php endif; ?>
    
</body>
</html>
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
            Doctrine ORM
        </title>
        
		<?php // add css files
			$this->minify->css(array('bootstrap/css/bootstrap.min.css', 
									 'bootstrap/css/bootstrap-theme.min.css', 
									 'assets/css/custom.css',
									 'assets/css/fonts.css'));
			echo $this->minify->deploy_css(true);
		?>        
    </head>     
    
    <body>
        
        <div class="container-fluid">
          <div class="row">
            <h1>Doctrine ORM</h1>
          </div>
        </div>
        
    </body>     

    <script data-main="bootstrap" src="components/require.js"></script>

  </body>
</html>
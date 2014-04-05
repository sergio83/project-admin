<?php

  date_default_timezone_set('America/Buenos_Aires');
  $string = file_get_contents("menuConfig.json");
  $json = json_decode($string,true);

  $title = $json["title"];

  $testing = isset($_GET["t"])?true:false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title><?php echo($title)?></title>
    

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
		
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
   

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->   
    
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div class="container">

  	<?php require_once("includes/header.php");?>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1><?php echo($title)?></h1>
        </div>

		<div class="container marketing">
		  	<!-- Three columns of text below the carousel -->

 		   <ul id="menuList" class="rig columns-4">
          <?php
            foreach ($json["items"] as $valor) {
              if($valor["hidden"] == false || $testing == true){
                echo('<li><a href="'.$valor["link"].'"><img src="'.$valor["icon"].'" class="img-circle item"/><h3>'.$valor["title"].'</h3></a></li>');
              }
            }
          ?>
        </ul>

		  </div>

      </div>
    </div>
  <?php require_once("includes/footer.php");?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/holder.js"></script>    
    
    <script type="text/javascript">

    $(document).ready(function(){
      $(window).resize(function(){
        if($(window).width() < 770){
          if($("#menuList").hasClass("columns-4")){
            $("#menuList").removeClass("columns-4");
            $("#menuList").addClass("columns-3");
          }
        }else{
          if($("#menuList").hasClass("columns-3")){
            $("#menuList").removeClass("columns-3");
            $("#menuList").addClass("columns-4");
          }
        }
      });
    });

    </script>    
  </body>
</html>
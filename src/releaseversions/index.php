<?php
	date_default_timezone_set('America/Buenos_Aires');
	$testing = isset($_GET["t"])?true:false;
	$string = file_get_contents("../menuConfig.json");
    $json = json_decode($string,true);
    $title = $json["title"];
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
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
		
    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    
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

  	<?php require_once("../includes/header.php");?>

      <!-- Begin page content -->
      <div class="container">
<div class="container">
        <div class="page-header">
          <h1><?php echo($title);?></h1>
        </div>
        
  <?php
	   $string = file_get_contents("../appConfig.json");
	   $json=json_decode($string,true);
	   $iphoneDic = $json["iphone"];
	   $androidDic = $json["android"];	
	   
	   if(isset($iphoneDic) && $iphoneDic["hidden"]==false)
	   {   
	   $apps = $iphoneDic["apps"];
   ?>
		<div class="panel panel-primary">
		<div class="panel-heading"><img src="../images/appleIcon.png" width="20" /> <span>iPhone</span></div>
			<div class="panel-body1">
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th> Version #</th>
						<th>Release Date</th>
						<th>Application</th>
						<th>Release Notes</th>
					  </tr>
					</thead>	
					<?php
					 foreach ($apps as &$valor) {
						if($testing==true || $valor["hidden"]==false){
							echo('<tr>');
								echo('<td>'.$valor["version"].'</td>');
								echo('<td>'.$valor["date"].'</td>');
								echo('<td><button type="button" class="btn btn-success install" onclick="location.href=\''.$valor["link"].'\'">Install</button></td>');
								echo('<td>'.$valor["notes"].'</td>');
							echo('</tr>');
						}
					 }
					?>	
				</table> 
				</div>
			</div>
		</div>
		<br>
	<?php
	}
	
	   if(isset($androidDic) && $androidDic["hidden"]==false)
	   {   
	   $apps = $androidDic["apps"];
	?>		
		<div class="panel panel-success">
		<div class="panel-heading"><img src="../images/androidIcon.png" width="20" /> <span>Android</span></div>
			<div class="panel-body1">
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th> Version #</th>
						<th>Release Date</th>
						<th>Application</th>
						<th>Release Notes</th>
					  </tr>
					</thead>		
					<?php
					 foreach ($apps as &$valor) {
						if($testing==true || $valor["hidden"]==false){
							echo('<tr>');
								echo('<td>'.$valor["version"].'</td>');
								echo('<td>'.$valor["date"].'</td>');
								echo('<td><button type="button" class="btn btn-success install" onclick="location.href=\''.$valor["link"].'\'">Install</button></td>');
								echo('<td>'.$valor["notes"].'</td>');
							echo('</tr>');
						}
					 }
					?>				
				</table> 
				</div>
			</div>
		</div>
		<?php
		}
		?>
				
      </div>


      </div>
    </div>
  <?php require_once("../includes/footer.php");?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/holder.js"></script>    
       
  </body>
</html>
<!DOCTYPE html>
<?php 
  session_start();
  require 'php/DBConnection.php';
  require 'php/phpGeneral.php';
  if(!isset($_SESSION["currentUser"]))
  {
    header("Location: .");
  }
?>
<html>
<head>
	<title>Exam Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/mainLayout.css">
</head>

<body>
	

	<div class="container-fluid">
		<div class="contentArea">
			<div class="examPage">
				<h2>Exam: <?php echo $_GET["examId"];?></h2>
			</div>
		</div>
		<!--contentArea end-->
	</div>
	<!--Conatiner fluid End-->

	<script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>
</body>
</html>
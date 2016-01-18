<!DOCTYPE html>
<?php 
  session_start();
  require 'php/DBConnection.php';
  require 'php/phpGeneral.php';
  if(!isset($_SESSION["currentUser"]))
  {
    header("Location: .");
  }
	date_default_timezone_set('Asia/Dhaka');
  $_SESSION["startTime"] = date("Y-m-d H:i:s");

?>

<html lang="en">
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
	<div id="examClock">
		<span class="glyphicon glyphicon-time"></span> <b><time id="countdown"></time></b>
	</div>
	<div class="container-fluid">
		<div class="contentArea">
			<br>
			<div id="examPage">
				<?php include 'php/examControl.php'; ?>
			</div>
		</div>
		<!--contentArea end-->
	</div>
	<!--Conatiner fluid End-->

	<script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  	<script type="text/javascript" src="js/ajax.js"></script>
  	<script type="text/javascript" src="js/jqueryHelper.js"></script>
  	<script>countdown();</script>
</body>
</html>
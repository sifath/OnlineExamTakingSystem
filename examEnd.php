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
  ?>
<html>
<head>
	<title>Exam Duration Ended</title>
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
       		<?php include 'layout/header.php';?>

       		<h2 id="examEnd">
       			<br><br><br>
       			The Exam Duration is Over! Thanks for Joining the exam.
       			<br>
       			<small>All of your answer saved automatically</small>
       			<br><br><br><br><br><br>
       		</h2>

       		<?php include 'layout/footer.php';?>
       	</div>
       	<!--contentArea-->
    </div>
       	<!--container-fluid-->


<script type="text/javascript" src="js/ajax.js"></script>
<script>
	document.cookie = "remainingTime=; expires=Thu, 01 Jan 1970 00:00:00";
</script>
</body>
</html>
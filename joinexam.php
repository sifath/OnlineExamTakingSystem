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
	<title>Participate in an Exam</title>
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
		<div id="joinExam">
		<br><br><br>
			<form>
						<div class="input-group">
							<label for="examId">Exam Id: </label>
							<input id="examId"  name="text" onkeyup="startExamValidation()" type="text" class="form-control">
						</div>
							<br>
						<div class="input-group">
							<label for="institutionId">Institution Id: </label>
							<input id="institutionId"  name="text" onkeyup="startExamValidation()" type="text" class="form-control">
						</div>	
						<br>
						<input type="button" id="startExamBtn"  class="btn btn-primary" onclick="startExam()" value="Start Exam" disabled>	
						&nbsp;&nbsp;&nbsp;
						<span id="joinExamError" class="error"></span>		
			</form>
			<br><br><br>
		</div>
		<!--Join Exam-->
		<?php include 'layout/footer.php';?>
	</div>
	<!--Content Area-->
</div>
<!--Conatiner Fluid-->
	
	<script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>
</body>
</html>
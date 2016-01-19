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
	<title>Exam Dashboard</title>
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
    <br>
			<div id="examDashboard">
				<div id="dashboardNav">
					<ul class="nav nav-tabs">
  						<li class="active"><a href="examDashboard.php">Exams Created By You</a></li>
  						<li><a href="examDashboard.php?show=participation">Exams Participated By You</a></li>
					</ul>
				</div>
        <!--dashboardNav-->
        <br>

        <?php
          if(!isset($_GET["show"]))
          {
            include 'php/createdExamList.php';
          }
        ?>
        <br><br><br><br><br><br><br><br><br>
			</div>
		<!--exam Dashboard-->
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
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

			<div id="allResult">

        <table id ="examList" class="table table-hover table-responsive">
          <tr>
            <th>Examinee Name</th>
            <th>Institution Id</th>
            <th>Acquired Mark</th>
            <th>Option 1</th>
          </tr>
        <?php 
        $examineeList = selectAllExamineeOf($_GET["examId"]);

        if($examineeList)
        {
        foreach ($examineeList as $examinee) {
          $examineeInfo  = selectUserInfo($examinee["examineeId"]);
        ?>
          <tr>
          <td><?php echo $examineeInfo["name"];?></td>
          <td><?php echo $examinee["institutionId"];?></td>
          <td><?php echo getAcquiredMarks($_GET["examId"],$examinee["examineeId"]);?></td>
          <td><a href="#">Detail</a></td>
          </tr>

          <?php 
            }
          }
          ?>
        </table>
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
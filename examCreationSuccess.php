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
	<title>Exam Created Successfully</title>
	<script src="bootstrap/js/jquery-1.11.3.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/mainLayout.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container-fluid">
  		<div class="contentArea">
      <?php include 'layout/header.php';?>
        <div class="allExamList">

  			<h3>List Of all the Exam You Created</h3>
  			<br>

  			<table id ="examList" class="table table-hover table-responsive">

          <tr>
            <th>Exam Name</th>
            <th>Exam Id</th>
            <th>Start Time</th>
            <th>Duration</th>
            <th>Option 1</th>
            <th>Option 2</th>
          </tr>
  			<?php 
  			$exams = selectAllExamOfExaminer($_SESSION["currentUser"]);

  			foreach (array_reverse($exams) as $e) {
  			
  			?>
  				<tr>
  				<td><?php echo $e["examName"];?></td>
  				<td><?php echo $e["examId"];?></td>
  				<td><?php echo $e["startTime"];?></td>
  				<td><?php echo $e["duration"];?></td>
  				<td><a href="createQuestion.php?examId=<?php echo $e["examId"]?>">Add Question</a></td>
  				<td><a href="#">Edit Exam Setting</a></td>
  				</tr>

  				<?php 
  					}
  				?>
  			</table>
        <br><br><br>
        </div>
        <!--End allExamList-->
         <?php include 'layout/footer.php';?>
  		</div>
  		<!--End contentArea-->
    </div>
    <!--End container-fluid-->


	<script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>
</body>
</html>
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
	<title>Create Question</title>

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
			<div id="createQuestion">
				
					<form id="defaultValue">
						<h3>Default Values:</h3>
						<div class="input-group">
							<label for="defaultMarks">Marks for each question: </label>
							<input id="defaultMarks" type="number" value="1" name="defaultMarks" class="form-control">
						</div>
							<br>
						<div class="input-group">
							<label for="domain">Question Domain: </label>
							<input id="domain"  name="text" type="text" class="form-control">
						</div>
							<br>
						<div class="input-group">
							<label for="topics">Question Topics: </label>
							<input id="topics"  name="text" type="text" class="form-control">
						</div>
							<br>						
					</form>					
				
					<br>

					<hr>
				
					<form id="questionGroup">
						<label for="question">Question</label>
						<textarea id="question" class="form-control"  placeholder="Write your question here"></textarea>

						<br><br>
						<label>Answer options:</label>
						<table id="questionTable">
							<tr>
								<td><input type="checkbox" class="optionCheck"  ></td>

								<td><textarea  class="option form-control" onkeyup="addNewOption()"></textarea></td>
							</tr>
							
							<tr>
								<td><input type="checkbox" class="optionCheck" ></td>

								<td><textarea   class="option form-control" onkeyup="addNewOption()"></textarea></td>
							</tr>
						</table> 
						<br>

						<p style="text-align:center"><input type="button"  class="btn btn-default" onclick="addQuestion()" value="Submit the Question"></p>
					
						<br><br>
						<p id = "successM" style="text-align:center; visibility:hidden; color:red" >Question Created Successfully</p>
						<br><br>
					</form>		

			</div>
			<!--createQuestion-->

			<?php include 'layout/footer.php';?>
		</div>
		<!--contentArea-->
		
	</div>
	<!--container-fluid-->


	<script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>
</body>
</html>
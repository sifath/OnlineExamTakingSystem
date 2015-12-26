<!DOCTYPE html>
<?php
  session_start();
  require '../php/DBConnection.php';
  
 
  
?>
<html lang="en">
<head>
	<title>Home</title>
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

    <div  id="createExam">
      <form>
        <label style="color:red"><b>*</b>&nbsp;<i>mean required</i></label>
            <br><br><br>
              <div class="form-group">
                <label for="examName">Exam Title&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
       
                <textarea id="examName" name="examName" class="resizeable form-control" placeholder="Write the Exam Heading Here" required></textarea>                      
              </div>
              <br>
              <div class="form-group">
                <label for="startTime">Exam Start time&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
                <input id="startTime" type="text" class="form-control" name="startTime" value="" placeholder="Exam Strat Time">
              </div>
              <br>
              <div class="form-group">
                <label for="duration">Exam Duration (in minute)&nbsp;&nbsp;&nbsp;<span  style="color:red"><b>*</b></span></label>
                <input id="duration" type="password" class="form-control" name="duration" value="" placeholder="Exam Duration">
              </div>
              <br>
            <input type="button" name="signupBtn" onclick="signup()" class="btn btn-primary" value="Save">

      </form>
    </div>
      <br><br><br>
       
  	 </div>
  	<!--contentArea-->
    <?php include 'layout/footer.php';?>
	</div>
	<!--fluid container-->
  <script type="text/javascript" src="vjs/ajax.js"></script>

</body>
</html>
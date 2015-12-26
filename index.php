<!DOCTYPE html>
<?php
  session_start();
  require 'php/DBConnection.php';
  

  
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

    <div class="instruction" id="instruction1">
      <div >
          Publish Your Exam in Online
      </div>

      <div>
        
      </div>
    </div>

    <div class="instruction" id="instruction2">
      <div >
          
      </div>

      <div>
        Join in an Exam
      </div>
    </div>
      <br><br><br>
      
  	 </div>
  	<!--contentArea-->
    <?php include 'layout/footer.php';?>
	</div>
	<!--fluid container-->
  <script type="text/javascript" src="js/ajax.js"></script>

</body>
</html>
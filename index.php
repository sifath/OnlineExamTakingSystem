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
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 80%;
	  height:250px;
      margin: auto;
  }
  </style>
</head>
<body>
	<div class="container-fluid">
  	<div class="contentArea">
       <?php include 'layout/header.php';?>

    
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/1.jpg" width="350" height="250">
      </div>

      <div class="item">
        <img src="img/2.jpg" width="350" height="250">
      </div>
    
      <div class="item">
        <img src="img/3.jpg" width="350" height="250">
      </div>


      <div class="item">
        <img src="img/4.jpg" width="350" height="250">
      </div>
    </div>

   
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <br>
	<div class="instruction">
		<div class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-5" style="height:200px;">
				<img src="img/publish.png"/> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
				<span class="glyphicon glyphicon-arrow-right" style="color:#4d9900;"></span> 
			</div>
		
			<div class="col-sm-4" style="height:300px; background-color:#4d9900;">
				<div class="step" style="color:white">
					•	Register online free <br>
					•	Select your domain	<br>
					•	Select your topics	<br>
					•	Prepare questions	<br>
					•	Select time and duration of exam <br>
					•	Select time of result published <br>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="instruction">
		<div class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-4" style="height:300px; background-color:#4d9900;">
				<div class="step" style="color:white">
					•	Register online free <br>
					•	Select your domain <br>
					•	Select your topics <br>
					•	Start Your Examination <br>
					•	Be careful about the exam time <br>
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-4" style="height:250px;">
				<span class="glyphicon glyphicon-arrow-left" style="color:#4d9900;"></span> 
				&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
				<img src="img/join.png" />
			</div>
			<div class="col-sm-1"></div>
			
		</div>
	</div>
	<br><br>
	<div class="narrative">
	<br>
		<div class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<h3> Secure Online Exam System</h3>
				<br>
				<p style="text-align:justify">The ClassMarker hosted online testing software is the 
				best exam maker for teachers & businesses. Used for business & training tests; 
				recruitment & pre-employment assessments; educational facilities, schools, 
				universities, distance learning, online courses, E-Learning, self-study groups, 
				practice tests & more.
				<br><br>
				Optionally charge for your exams, so you can sell quizzes online and receive payments 
				instantly. Custom web-based testing services allow you to easily create & give secure 
				online exams to your exact requirements with features such as time limits, public & 
				private test access, randomize questions, instant feedback, multiple choice, short 
				answer, essay & more question types.</p>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<h3> Business & Education Plans</h3>
				<br>
				<p style="text-align:justify">We understand every organization is different. That's why we've created 
				affordable online testing plans to suit your needs. <br><br>
				From occasional usage to bulk testing requirements, we have you covered.</p>
			</div>
			<div class="col-sm-2"></div>
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
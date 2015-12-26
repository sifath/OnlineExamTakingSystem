<!DOCTYPE html>

<?php
  session_start();
  require 'php/DBConnection.php';
  
  $name=$institution=$email="";
  
  $email= $_SESSION["currentUser"];
  $name=$_SESSION["name"];
  $institution=$_SESSION["institution"];
  $password=$_SESSION["password"];
  
  if(($_SERVER["REQUEST_METHOD"]=="POST") && (isset($_POST["update"])))
  {
	  if($password==$_POST["oldPassword"])
	  {
		  if($_POST["newPassword"]==$_POST["confirmPassword"])
		  {
			  updateUser($email, $name, $institution, $_POST["newPassword"]);
		  }
		  else
		  {
			  echo "password does not match";
		  }
	  }
	  else
	  {
		  echo "re enter old password";
	  }
  }
  
?>

<html lang="en">
<head>
	<title>Change Password</title>
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
<div class="bodyContent">	  

  	<div class="contentArea">
  		
            <br>

<div class="container">
  <h2>Change Password</h2>
  <br><br>
  
  <form class="form-horizontal" role="form" method="post">
	<div class="form-group">
      <label class="control-label col-sm-2" for="oldPassword">Old Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="oldPassword" name= "oldPassword">
      </div>
	  <div class="col-sm-6"></div>
    
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="NewPassword">New Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="newPassword" name= "newPassword">
      </div>
	  <div class="col-sm-6"></div>
    
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="confirmPassword">Confirm Password:</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="confirmPassword" name= "confirmPassword">
      </div>
	  <div class="col-sm-6"></div>
    
    </div>
	
		<div class="form-group">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
		<input type="button" class="btn btn-default" value="Update" name="update" style="width:150px;"/>
		</div>
		<div class="col-sm-5"></div>
	</div>
	
  </form>
</div>
</div>
</div>
	  
	  <br><br>
	  
    <?php include 'layout/footer.php';?>
  	 </div>
  	<!--content-->
	
	</div>
	<!--container-->
  <script type="text/javascript" src="js/ajax.js"></script>
  
</body>
</html>
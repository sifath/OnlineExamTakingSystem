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

<?php

  
  $userInfo=$email=$name=$institution=$photo="";
  
  if(isset($_SESSION["currentUser"]))
  {
	$email= $_SESSION["currentUser"];
	$userInfo = selectUserInfo($email);
	
	$_SESSION["name"]=$userInfo["name"];
	$_SESSION["institution"]=$userInfo["institution"];
	$_SESSION["password"]=$userInfo["password"];
	
  }
	
	if(isset($_SESSION["name"]))
	{
		$name=$_SESSION["name"];
	}
	
	if(isset($_SESSION["institution"]))
	{
		$institution=$_SESSION["institution"];
	}
	
	if(isset($_SESSION["password"]))
	{
		$password=$_SESSION["password"];
	}
	
  if(($_SERVER["REQUEST_METHOD"]=="POST") && isset($_POST["changePassword"]))
  {
		$_SESSION["name"]=$_POST["name"];
		$_SESSION["institution"]= $_POST["institution"];
		header("location:changePassword.php");
  }
  
  if(($_SERVER["REQUEST_METHOD"]=="POST") && isset($_POST["update"]))
  {
	  	$name=$_POST["name"];
		$institution= $_POST["institution"];
		updateUser($email, $name, $institution, $password, $photo);
		
  }
  
 ?>
<html lang="en">
<head>
	<title>User Information</title>
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
<div class="container">
  <h2>Edit Profile</h2>
  <br><br>
  
  <form class="form-horizontal"  method="post">
	<div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" name= "name" value= "<?php echo $name; ?>">
      </div>
	  <div class="col-sm-2"></div>
	  <div class="col-sm-4">
		<div class="image">
		<?php
		$image="";
		
		$image = $userInfo["photo"];
		if(empty($image))
		{
			
			echo "No Profile Picture";
		}
		
		?>
		</div>
		<br>
		<input type="file" name="photo" id="photo">
	  </div>
    
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="institution">Institution:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="institution" name= "institution" value= "<?php echo $institution; ?>">
      </div>
	  <div class="col-sm-6">
		
	   </div>
        
    </div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
		
		<input type="submit" class="btn btn-link" value="Change Password" name="changePassword"/>
		
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-4"></div>
		
	</div>
	<div class="form-group">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
		<input type="submit" class="btn btn-default" value="Update" name="update" style="width:150px;"/>
		</div>
		<div class="col-sm-5"></div>
	</div>
  </form>
</div>

</div>

 <br><br>
	  
      <?php include 'layout/footer.php';?>
  	 </div>
  	<!--content Area-->
	</div>
	<!--container-->
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/authentication.js"></script>

</body>
</html>
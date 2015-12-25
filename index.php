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
  	<div class="content">
  		<div class="header">
  			<nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Exam Solution</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>

                <li><a href="#">About</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <?php
                if(isset($_SESSION["currentUser"]))
                {
              ?>
                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php
                  }
                  else
                  {
                ?>
                <li><a data-toggle="modal" href="#signUpPan"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a data-toggle="modal" href="#loginPan"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </nav>
  		</div>
  		<!--header-->
      <div class="headColor"></div>
      <br><br><br>
      <footer>
        <br>
        <p>Copyright &copy; All right reserved by Md. Asiful Islam and Faria Nawshin.</p>
        <br>
      </footer>
  	 </div>
  	<!--content-->



    <div id="loginPan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login Here</h4>
          </div>
          <div class="modal-body">
            
            <form id="signin" align="center" role="form">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address" required>                                        
              </div>
              <br>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password" required>                                        
              </div>
              <br>
              <span id="error"></span>
              <br>
              <button name="loginbtn" type="button" onclick="login()" class="btn btn-primary">Login</button>
            </form>
          </div>
          <div class="modal-footer">
      
          </div>
        </div>
        
        <!-- Modal content-->
      </div>
    </div>
    <!-- Login Modal -->



    <div id="signUpPan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sign Up Here</h4>
          </div>
          <div class="modal-body">
            
            <form id="signup" align="center" role="form">
            <label style="color:red"><span class="glyphicon glyphicon-star"></span>&nbsp;<i>mean required</i></label>
            <br><br><br>
              <div class="form-group">
                <label for="inputEmail">Email&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star" style="color:red"></span></label>
                <input id="inputEmail" type="email" class="form-control" name="inputEmail" value="" placeholder="Email Address" required>                      
              </div>
              <br>
              <div class="form-group">
                <label for="name">Your Name&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star" style="color:red"></span></label>
                <input id="name" type="text" class="form-control" name="inputName" value="" placeholder="Full Name" required>
              </div>
              <br>
              <div class="form-group">
                <label for="inputPassword">Pasword&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star" style="color:red"></span></label>
                <input id="inputPassword" type="password" class="form-control" name="inputPassword" value="" placeholder="Set a Password" required>
              </div>
              <br>
              <div class="form-group">
                <label for="retypePassword">Re type Password&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star" style="color:red"></span></label>
                <input id="retypePassword" type="password" class="form-control required" name="retypePassword" value="" placeholder="Retype Password" required>
              </div>
              <br>
              <div class="form-group">
                <label for="institutionName">Institution</label>
                <input id="institutionName" type="text" class="form-control required" name="institutionName" value="" placeholder="You Institution Name">
              </div>
              <br>
              <p>
              <button type="button" name="signup" onclick="signup()" class="btn btn-primary">Sign Up</button>
              </p>
            </form>
          </div>
          <div class="modal-footer">
          
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
          </div>
        </div>

        <!-- Modal content-->
      </div>
    </div>
    <!-- Sign Up Modal -->

	</div>
	<!--container-->
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/authentication.js"></script>

</body>
</html>
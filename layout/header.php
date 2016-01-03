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
                <li><a href="."><span class="glyphicon glyphicon-home"></span> Home</a></li>

                <li><a href="#">About</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <?php
                if(isset($_SESSION["currentUser"]))
                {
              ?>
                <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				
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


      


      
   
    <?php 
        if(isset($_SESSION["currentUser"]))
        {
    ?>
      <nav class="userNav">
        <h3>My Dashbord</h3>
        <div>
          <ul clas="row">
            <li><span class="glyphicon glyphicon-education"></span><a href="createExam.php"> Create an Exam</a></li>
            <li><span class="glyphicon glyphicon-certificate"></span><a href="joinexam.php"> Participate in an Exam</a></li>
            <li><span class="glyphicon glyphicon-dashboard"></span><a href="#"> Exam Dashboard</a></li>
          </ul>
        </div>
        <br>
      </nav>
   <?php 
        }
    ?>


    <div class="headColor"></div>



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
              <div id="loginError" class="error"></div>
              <br>
              <button name="loginbtn" type = "button" onclick="login()" class="btn btn-primary">Login</button>
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
            <label style="color:red"><b>*</b>&nbsp;<i>mean required</i></label>
            <br><br><br>
              <div class="form-group">
                <label for="inputEmail">Email&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
                <input id="inputEmail" type="email" class="form-control" name="inputEmail" value="" placeholder="Email Address" required>                      
              </div>
              <br>
              <div class="form-group">
                <label for="name">Your Name&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
                <input id="name" type="text" class="form-control" name="inputName" value="" placeholder="Full Name" required>
              </div>
              <br>
              <div class="form-group">
                <label for="inputPassword">Pasword&nbsp;&nbsp;&nbsp;<span  style="color:red"><b>*</b></span></label>
                <input id="inputPassword" type="password" class="form-control" name="inputPassword" value="" placeholder="Set a Password" required>
              </div>
              <br>
              <div class="form-group">
                <label for="retypePassword">Re type Password&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
                <input id="retypePassword" type="password" class="form-control required" name="retypePassword" value="" placeholder="Retype Password" required>
              </div>
              <br>
              <div class="form-group">
                <label for="institutionName">Institution</label>
                <input id="institutionName" type="text" class="form-control required" name="institutionName" value="" placeholder="You Institution Name">
              </div>
              <br><br>
              <div id="signUpError" class="error"></div>
              <br><br>
              <p>
              <button type="button" name="signupBtn" onclick="signup()" class="btn btn-primary">Sign Up</button>
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

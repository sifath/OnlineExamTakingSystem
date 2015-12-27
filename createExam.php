<!DOCTYPE html>
<?php
  session_start();
  require 'php/DBConnection.php';
  
  if(!isset($_SESSION["currentUser"]))
  {
    header("Location: .");
  }
  
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
    <br><br>
    <h2>Create an Exam Here</h2>
    
      <form>
            <br>
              <div class="form-group">
                <label for="examName">Exam Title :&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
       
                <textarea id="examName" name="examName" class="resizeable form-control" placeholder="Write the Exam Heading Here" required></textarea>                      
              </div>
              <br>
              <div class="form-group">
                <label for="inputTime">Exam Start time :</label>
                <table id="inputTime">
                  <tr>
                    <td>
                      <div class = "input-group">
                        <input id="year" type="number" class="form-control col-sm-6" name="year" value="" placeholder="Year">
                        <span class = "input-group-addon">Year&nbsp;&nbsp;&nbsp;</span>
                      </div>
                    </td>
                    <td>
                      <div class = "input-group">
                        <input id="month" type="number" class="form-control col-sm-6" name="month" value="" placeholder="Month">
                        <span class = "input-group-addon">Month</span>
                      </div>
                    </td>
                    <td>
                      <div class = "input-group">
                        <input id="day" type="number" class="form-control col-sm-6" name="day" value="" placeholder="Day">
                        <span class = "input-group-addon">Day&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div class = "input-group">
                        <input id="hour" type="number" class="form-control" name="hour" value="" placeholder="hour">
                        <span class = "input-group-addon">Hour&nbsp;&nbsp;&nbsp;</span>
                      </div>
                    </td>
                    <td>
                     <div class = "input-group">
                        <input id="minute" type="number" class="form-control" name="minute" value="" placeholder="minute">
                        <span class = "input-group-addon">Minute</span>
                     </div>
                    </td>
                    <td>
                      <select name="amPm">
                        <option>AM</option>
                        <option>PM</option>  
                      </select>
                    </td>
                  </tr>
                </table>
                
              </div>
              <br>
              <label for="duration">Exam Duration : </label>
              <div class="form-group">
                <table id= "duration">
                   <tr>
                     <td>
                        <div class = "input-group">
                           <input id="durationHour" type="number" class="form-control" name="durationHour" value="" placeholder="hour">
                           <span class = "input-group-addon">H</span>
                        </div>
                     </td>
                     <td>
                        <div class = "input-group">
                           <input id="durationMinute" type="number" class="form-control" name="durationMinute" value="" placeholder="minute">
                           <span class = "input-group-addon">M</span>
                        </div>
                     </td>
                   </tr>
                </table>
   
              </div>
              <br>
            <input type="button" name="saveExam" onclick="saveTheExam()" class="btn btn-primary" value="Save the Exam">
            <br>
            <span id="saveExamError" class="error"></span>
      </form>
    </div>
      <br><br><br>
      <?php include 'layout/footer.php';?>
  	 </div>
  	<!--contentArea-->
    
	</div>
	<!--fluid container-->
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>

</body>
</html>
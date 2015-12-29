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
    
      <form role="form">
            <br>
              <div class="form-group">
                <label for="examName">Exam Title :&nbsp;&nbsp;&nbsp;<span style="color:red"><b>*</b></span></label>
       
                <textarea id="examName"  onkeyup="enableSave()" name="examName" class="resizeable form-control" placeholder="Write the Exam Heading Here" required></textarea>                      
              </div>
              <br><br>
              <div class="form-group">
                <label for="examStartTimeT">Exam Start time :</label>
                <table id="examStartTimeT">
                  <tr>
                     <h5>YYYY / MM / DD </h5>
                     <h5>HH : MM </h5>
                  </tr>
                  <tr>
                    <td class = "input-group">
                     
                        <select id="year" class="form-control input-group-addon fcChange" onchange="yearChanged()">
                           
                        <?php    
                            $currentYear = date("Y");
                            echo '<option>Year</option>';
                             for($year = $currentYear ; $year <= $currentYear+10; $year++)
                              {
                                 echo '<option>'.$year.'</option>';
                              }

                           ?>
                        </select>
                        
                        <span class="input-group-addon "><b>/</b></span>
                        <select id="month" class="form-control input-group-addon fcChange" onchange="monthChanged()" disabled>
                           <option>Month</option>
                           <?php 
                             for($month = 1 ; $month <= 12; $month++)
                              {
                                 echo '<option>'.$month.'</option>';
                             }
                           ?>
                        </select>
                        <span class="input-group-addon"><b>/</b></span>
                        <select id="day" class="form-control input-group-addon fcChange" onchange="dayChanged()" disabled>
                           <option>Day</option>
                        </select>
                     </td>
                  </tr>

                  <tr>
                    <td class = "input-group">
                   
                        <select id="hour" class="form-control input-group-addon fcChange" onchange="hourChanged()" disabled>
                           <option>Hour</option>

                           <?php
                             for($hour = 0 ; $hour <= 23; $hour++)
                              {
                                 echo '<option>'.$hour.'</option>';
                             }                             
                           ?>
                        </select>
                        <span class="input-group-addon "><b>:</b></span>
                        <select id="minute" class="form-control input-group-addon  fcChange"  onchange="minuteChange()" disabled>
                           <option>Minute</option>
                        </select>
                        <!--
                        <span class="input-group-addon "><b>:</b></span>
                     <select id="amPm" class="form-control input-group-addon fcChange">
                        <option>AM</option>
                        <option>PM</option>  
                      </select> -->
                        
                    </td>
                  </tr>
                </table>
                
              </div>

              <br>
              <div class="form-group">
               <label for="duration">Exam Duration : </label>
                <table id= "duration">
                  <tr>HH:MM</tr>
                   <tr>
                     <td>
                        <div class = "input-group">
                           <input id="durationHour" type="number" class="form-control fcChange" name="durationHour" placeholder="hour">
                           <span class = "input-group-addon"><b>and</b></span>
                           <select id="durationMinute" class="form-control input-group-addon fcChange" >
                              <option>0</option>
                              <?php
                                 for($i = 1; $i< 60; $i++)
                                 {
                                    echo "<option>".$i."</option>";
                                 }
                              ?>
                           </select>
                        </div>
                     </td>
                   </tr>
                </table>
   
              </div>
              <br>
            <input type="button" id="saveExam" name="saveExam" onclick="saveTheExam()" class="btn btn-primary" value="Save the Exam" disabled>
            &nbsp;&nbsp;&nbsp;
            <span id="mes" class="error" style = "visibility:visible">Fill up the Exam Title to enable this button</span>
            <br>
      </form>
    </div>
      <br><br><br>
      <?php include 'layout/footer.php';?>
  	 </div>
  	<!--contentArea-->
    
	</div>
	<!--fluid container-->


   <script type="text/javascript" src="js/javascriptGeneral.js"></script>  
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/jqueryHelper.js"></script>

</body>
</html>
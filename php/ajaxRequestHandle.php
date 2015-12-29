
<?php
	session_start();
	require 'DBConnection.php';

	
	if(isset($_POST["login"]))
	{
		//echo "I am in login";
		$password = selectPassword($_POST["email"]);

		if($password)
		{
			if($password == $_POST["password"])
			{
				$_SESSION["currentUser"] = $_POST["email"];
				echo "successful";
			}
			else
			{
				echo "Wrong Password";
			}
		}
		else
		{
			echo "Wrong User Name";
		}
	}




	
	if(isset($_POST["signup"]))
	{
				
		$inputEmail = $_POST["inputEmail"];
		$name = $_POST["name"];
		$inputPassword = $_POST["inputPassword"];
		$retypePassword = $_POST["retypePassword"];
		$institutionName = $_POST["institutionName"]; 
		$photo="";
		
		if(selectUserInfo($inputEmail) != null)
		{
			echo "This email already used for another account !";
		}
			
		else
			{
				insertUserInfo($inputEmail,$inputPassword,$name,$institutionName,$photo);
				$_SESSION["currentUser"] = $_POST["inputEmail"];
				echo "successful";
			}
	}
	



	if(isset($_POST["saveTheExam"]))
	{
		$examName = $_POST["examName"];
		
		$startDateTime = $duration = "";
		if(isset($_POST["year"]))
		{
			$d = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"]." ".$_POST["hour"].":".$_POST["minute"];
			$startDateTime = date("Y-m-d H:i:s", strtotime($d));
			//echo $startDateTime;
		}


		if(isset($_POST["durationHour"]))
		{
			$duration = date("H:i:s",strtotime($_POST["durationHour"].":".$_POST["durationMinute"]));
		}
		
		insertExam($_SESSION["currentUser"],$examName,$startDateTime,$duration);
		echo "successful";

	}


	// -------------------end save the exam ------------------------------------




?>



<?php
	session_start();
	require 'DBConnection.php';

	
	if(isset($_POST["login"]))
	{
		//echo "I am in login";
		$password = selectPassword($_POST["email"]);

		if($password != null)
		{
			if($password == $_POST["password"])
			{
				$_SESSION["currentUser"] = $_POST["email"];
				//header("Location: ../editProfile.php");
				//exit();
			}
		}
		else
		{
			echo "Wrong User Name or Password";
		}
	}
	
	if(isset($_POST["signup"]))
	{
				
		$inputEmail = $_POST["inputEmail"];
		$name = $_POST["name"];
		$inputPassword = $_POST["inputPassword"];
		$retypePassword = $_POST["retypePassword"];
		$institutionName = $_POST["institutionName"]; 
		$photo = "";
		
		if(validateUser($inputEmail)===TRUE)
			{
				echo "This user already exits !"
			}
			
		else
			{
				if($inputPassword == $retypePassword)
				{
					$_SESSION["currentUser"] = $_POST["inputEmail"];
					insertUserInfo($inputEmail,$inputPassword,$name,$institutionName,$photo);
					
				}
				else
				{
					echo "Password does not match. Retype password.";
				}
			}
	}
		
	
?>
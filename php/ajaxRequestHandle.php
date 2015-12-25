
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
		$photo = "";
		
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
		
	
?>


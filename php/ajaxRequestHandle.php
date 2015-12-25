
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
				//header("Location: ../index.php");
				//exit();
			}
		}
		else
		{
			echo "Wrong User Name or Password";
		}
	}
?>


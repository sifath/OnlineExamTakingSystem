<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 



	function insertUserInfo($email,$password,$name,$institutionName,$photo)
	{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		$sql = "INSERT INTO oets.userinfo(email,password,name,institution, photo)
						VALUES ('".$email."', '".$password."','".$name."', '".$institutionName."','".$photo."')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "New record created successfully" ;
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	//-----End insertUserInfo() ------------


	function selectUserInfo($email)
	{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		$sql = "SELECT * FROM oets.userinfo where email='".$email."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$user = array();
			while($row = $result->fetch_assoc()) 
			{
				$user = array(
					"email" => $row["email"],
					"password" => $row["password"],
					"name" => $row["name"],
					"institution" => $row["institution"],
					"photo" => $row["photo"]
					);
			}
			$conn->close();
			return $user;
		} 
		else 
		{
			$conn->close();
			return null;
		}

	}
	//------End SelectUserInfo() -----------

	function selectPassword($email)
	{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		$sql = "SELECT password FROM oets.userinfo where email='".$email."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$password = "";
			while($row = $result->fetch_assoc()) 
			{
				
				$password = $row["password"];
			
			}
			$conn->close();
			return $password;
		} 
		else 
		{
			$conn->close();
			return null;
		}
	}
	

function updateUser($email, $name, $institution, $password, $photo)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
	$sql = "UPDATE oets.userInfo SET name='$name', institution='$institution', password='$password', photo='$photo' WHERE email= '$email'";
	$result = $conn->query($sql);
	if($result===TRUE)
	{
		return true;
	}
}


function insertExam($email,$examName,$startDate,$duration)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		$sql = "INSERT INTO oets.exams(examName,examinerId,startTime, duration)
						VALUES ('$examName','$email','$startDate','$duration')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "successfull";
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}



function selectAllExamOfExaminee($email)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		$sql = "SELECT * FROM oets.exams where examinerId='".$email."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$exams = array();
			while($row = $result->fetch_assoc()) 
			{
				$exams[] = array(
					"examId" => $row["examId"],
					"examName" => $row["examName"],
					"examinerId" => $row["examinerId"],
					"startTime" => $row["startTime"],
					"duration" => $row["duration"]
					);
			}
			$conn->close();
			return $exams;
		} 
		else 
		{
			$conn->close();
			return null;
		}
}
?>
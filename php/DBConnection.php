<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "oets";

	//$servername = "mysql9.000webhost.com";
	//$username = "a3649752_sifath";
	//$password = "1234sifath";
	//$dbName = "a3649752_oets";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 



	function insertUserInfo($email,$password,$name,$institutionName,$photo)
	{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "INSERT INTO userinfo(email,password,name,institution, photo)
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
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM userinfo where email='".$email."'";
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
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT password FROM userinfo where email='".$email."'";
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
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
	$sql = "UPDATE userInfo SET name='$name', institution='$institution', password='$password', photo='$photo' WHERE email= '$email'";
	$result = $conn->query($sql);
	if($result===TRUE)
	{
		return true;
	}
}


function insertExam($email,$examName,$startDate,$duration)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "INSERT INTO exams(examName,examinerId,startTime, duration)
						VALUES ('$examName','$email','$startDate','$duration')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "successfull";
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

function selectExamInfo($examId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM exams where examId='$examId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$exam = array();
			while($row = $result->fetch_assoc()) 
			{
				$exam = array(
					"examId" => $row["examId"],
					"examName" => $row["examName"],
					"examinerId" => $row["examinerId"],
					"startTime" => $row["startTime"],
					"duration" => $row["duration"]
					);
			}
			$conn->close();
			return $exam;
		} 
		else 
		{
			$conn->close();
			return null;
		}

}

function selectAllExamOfExaminer($email)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM exams where examinerId='".$email."'";
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


function insertQuestion($type,$question,$domain,$topics,$setter)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "INSERT INTO questionbank(questionType,question,questionDomain, topics,setter)
						VALUES ('$type', '$question','$domain', '$topics','$setter')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "New record created successfully" ;
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}


function insertQuestionOptions($questionId,$option,$isCorrect)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);

		$sql = "INSERT INTO questionoptions(questionId,mcqOption,isCorrectAnswer)
						VALUES ('$questionId', '$option','$isCorrect')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "New record created successfully" ;
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}



function selectQuestionDetail($questionId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM questionbank where questionId='$questionId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$question = array();
			while($row = $result->fetch_assoc()) 
			{
				$question = array(
					"questionId" => $row["questionId"],
					"questionType" => $row["questionType"],
					"question" => $row["question"],
					"questionDomain" => $row["questionDomain"],
					"topics" => $row["topics"],
					"setter" => $row["setter"]
					);
			}
			$conn->close();
			return $question;
		} 
		else 
		{
			$conn->close();
			return null;
		}

}


function selectAllOptionsOf($questionId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM questionoptions where questionId='$questionId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$options = array();
			while($row = $result->fetch_assoc()) 
			{
				$options[] = array(
					"questionId" => $row["questionId"],
					"mcqOption" => $row["mcqOption"],
					"isCorrectAnswer" => $row["isCorrectAnswer"]
					);
			}
			$conn->close();
			return $options;
		} 
		else 
		{
			$conn->close();
			return null;
		}

}

function selectAllCorrectOptionsOf($questionId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM questionoptions where questionId='$questionId' AND isCorrectAnswer='1'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$options = array();
			while($row = $result->fetch_assoc()) 
			{
				$options[] = array(
					"questionId" => $row["questionId"],
					"mcqOption" => htmlspecialchars($row["mcqOption"],ENT_QUOTES,ini_get("default_charset")),
					"isCorrectAnswer" => $row["isCorrectAnswer"]
					);
			}
			$conn->close();
			return $options;
		} 
		else 
		{
			$conn->close();
			return null;
		}	
}


function selectQuestionID($type,$question,$domain,$topics,$setter)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM questionbank where questionType='$type' 
				AND question='$question' AND questionDomain='$domain' AND 
				topics='$topics' AND setter='$setter'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$questionId = "";
			while($row = $result->fetch_assoc()) 
			{
				$questionId = $row["questionId"];
			}

			$conn->close();
			return $questionId;
		} 
		else 
		{
			$conn->close();
			return null;
		}
}


function insertQuestionSet($examId,$questionId,$marks)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);

		$sql = "INSERT INTO questionset(examId,questionId,marks)
						VALUES ('$examId', '$questionId','$marks')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "New record created successfully" ;
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}




function insertExaminee($examId,$examineeId,$institutionId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);

		$sql = "INSERT INTO examineelist(examId,examineeId,institutionId)
						VALUES ('$examId', '$examineeId','$institutionId')" ;
		if ($conn->query($sql) === TRUE) 
		{
			//echo "New record created successfully" ;
		}else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
}


function selectAllQuestionOf($examId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM questionset where examId='$examId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$questionSet = array();
			while($row = $result->fetch_assoc()) 
			{
				$questionSet[] = array(
					"examId" => $row["examId"],
					"questionId" => $row["questionId"],
					"marks" => $row["marks"]
					);
			}
			$conn->close();
			return $questionSet;
		} 
		else 
		{
			$conn->close();
			return null;
		}

}

function selectAllExamineeOf($examId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM examineelist where examId='$examId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$examinee = array();
			while($row = $result->fetch_assoc()) 
			{
				$examinee[] = array(
					"examId" => $row["examId"],
					"examineeId" => $row["examineeId"],
					"institutionId" => $row["institutionId"]
					);
			}
			$conn->close();
			return $examinee;
		} 
		else 
		{
			$conn->close();
			return null;
		}

}

function selectExamineesAnswer($examineeId,$examId,$questionId)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM examineesanswers where studentId='$examineeId' AND examId='$examId' AND questionId='$questionId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			$answers = array();
			while($row = $result->fetch_assoc()) 
			{
				$answers[] = array(
					"studentId" => $row["studentId"],
					"examId" => $row["examId"],
					"questionId" => $row["questionId"],
					"answer" => htmlspecialchars($row["answer"],ENT_QUOTES,ini_get("default_charset"))
					);
			}
			$conn->close();
			return $answers;
		} 
		else 
		{
			$conn->close();
			return null;
		}
}




function deleteAnswer($examineeId,$examId,$questionId,$answer)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
	$sql = "DELETE FROM examineesanswers where studentId='$examineeId' AND examId='$examId' AND questionId='$questionId' AND answer='$answer'";

	//$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) 
	{
    	return "successfull";
	} 
	else 
	{
    	return $conn->error;
	}
}


function insertAnswer($examineeId,$examId,$questionId,$answer)
{
	$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
	$sql = "INSERT INTO examineesanswers(studentId,examId,questionId,answer)
						VALUES ('$examineeId', '$examId','$questionId', '$answer')" ;
	if ($conn->query($sql) === TRUE) 
	{
		return "successfull";
	}
	else 
	{
		//echo "alert(".$conn->error.")";
		return $conn->error;
	}
}

function isSelected($examineeId,$examId,$questionId,$answer)
{
		$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbName"]);
		$sql = "SELECT * FROM examineesanswers 
				where studentId='$examineeId' AND examId='$examId'
				AND questionId='$questionId'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				if(trim(htmlspecialchars($row["answer"],ENT_QUOTES,ini_get("default_charset"))) == trim($answer))
				{
					return true;
				}
			}
		} 
		else 
		{
			
			return false;
		}	
}

?>
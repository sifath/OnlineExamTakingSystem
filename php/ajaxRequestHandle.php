
<?php
	session_start();
	require 'DBConnection.php';
	date_default_timezone_set('Asia/Dhaka');

	
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


	// --------------------- end save the exam -----------------------------



	if(isset($_POST["addQuestion"]))
	{
		$topics = "";


		insertQuestion("MCQ",$_POST["question"],$_POST["domain"],$_POST["topics"],$_SESSION["currentUser"]);
		$options = explode("#",$_POST["options"]);
		$correctOptions = explode("#",$_POST["correctOptions"]);

		$questionId = selectQuestionID("MCQ",$_POST["question"],$_POST["domain"],$_POST["topics"],$_SESSION["currentUser"]);
		
		for($index = 0; $index<count($options); $index++)
		{
			if (in_array($options[$index], $correctOptions))
			{
				insertQuestionOptions($questionId,$options[$index],1);
			}
			else
			{
				insertQuestionOptions($questionId,$options[$index],0);
			}
		}

		insertQuestionSet($_POST["examId"],$questionId,$_POST["marks"]);

		$_SESSION["questionDomain"] = $_POST["domain"];
		$_SESSION["questionTopics"] = $_POST["topics"];

		echo "successful";

	}



	if(isset($_POST["startExam"]))
	{
		$examInfo = selectExamInfo($_POST["examId"]);

		if($examInfo == null)
		{
			echo "This exam Id is Not valid <br>";
			return null;
		}

		if(date("Y-m-d H:i:s",strtotime($examInfo["startTime"])) > date("Y-m-d H:i:s"))
		{
			echo "Your Exam Will Start at '".$examInfo["startTime"]."' <br>";
			return null;
		}

		insertExaminee($_POST["examId"],$_SESSION["currentUser"],$_POST["institutionId"]);

		echo "successful";
	}




	if(isset($_POST["submitAnswer"]))
	{
		$examId = $_POST["examId"];
		$questionId = $_POST["questionId"];
		$answer = $_POST["answer"];
		$check = $_POST["check"];

		if($check == "false")
		{
			$result = deleteAnswer($_SESSION["currentUser"],$examId,$questionId,$answer);
			if($result == "successfull")
			{
				echo "successful";
			}
			else
			{
				echo $result;
			}
		}
		else
		if($check == "true")
		{
			$result = insertAnswer($_SESSION["currentUser"],$examId,$questionId,$answer);
			if($result == "successfull")
			{
				echo "successful";
			}
			else
			{
				echo $result;
			}
		}
	}




	if(isset($_POST["countdown"]))
	{
		$examInfo = selectExamInfo($_POST["examId"]);
		$start = "";
		if(trim($examInfo["startTime"]))
		{
			$start = $examInfo["startTime"];
		}
		else
		{
			$start = date("Y-m-d H:i:s");
		}

		$year = date("Y", strtotime($start));
		//$month = intval(trim(date("m", strtotime($start)))) - 1;
		$month = date("m", strtotime($start));
		$day =	date("d", strtotime($start));
		$time = date("H:i:s", strtotime($start));

		$startDateTime = $year.'-'.$month.'-'.$day.' '.$time;

		$examTime = array(
			"startTime" => $startDateTime,
			"duration" => $examInfo["duration"]
			);

		echo json_encode($examTime);
	}

?>

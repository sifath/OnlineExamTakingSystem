<?php
	$examId = $_GET["examId"];

	$examDetail = selectExamInfo($examId);
	$questionSet = selectAllQuestionOf($examId);

	echo '<div id="examTitle">
			<h3>'.$examDetail["examName"].'</h3>';
			$examinerInfo = selectUserInfo($examDetail["examinerId"]);
	echo '<h4>
			<span>Exam Id : <span id="examId">'.$examId.'</span> , </span>
			<span><u>Exam By : '.$examinerInfo["name"].'</u></span>
			</h4>
			<h5>(Tick The Correct Answers, Your answer will save automatically)</h5>
			</div>';
	echo '<br>';
	
	$start = 0;
	$end = count($questionSet);

	for($index = $start; $index < $end ;$index++)
	{
		$order = $index + 1;
		$question = selectQuestionDetail($questionSet[$index]["questionId"]);
		echo '<div class="question">'.$order.') '.htmlspecialchars($question["question"],ENT_QUOTES,ini_get("default_charset")).'</div>';
		echo '<br>';
		$options = selectAllOptionsOf($questionSet[$index]["questionId"]);
		foreach ($options as $op) {
			if(isSelected($_SESSION["currentUser"],$examId,$question["questionId"],htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset"))))
			{
				echo '<label class="mcqOptions"><input type="checkbox" class="clickOptions" onchange="submitAnswer()" name="'.$question["questionId"].'" value="'.htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset")).'" checked> '.htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset")).'</label>';
			}
			else
			{
				echo '<label class="mcqOptions"><input type="checkbox" class="clickOptions" onchange="submitAnswer()" name="'.$question["questionId"].'" value="'.htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset")).'"> '.htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset")).'</label>';
			}
			
			echo '<br>';
		}
		echo '<hr>';
		echo '<br>';
	}
?>
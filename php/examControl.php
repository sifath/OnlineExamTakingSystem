<?php
	$examId = $_GET["examId"];

	$examDetail = selectExamInfo($examId);
	$questionSet = selectAllQuestionOf($examId);

	echo '<h3 id="examTitle">'.$examDetail["examName"].'</h3>';
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
			echo '<label class="mcqOptions"><input type="checkbox" onchange="submitAnswer()" name="'.$question["questionId"].'" value="'.$op["mcqOption"].'"> '.htmlspecialchars($op["mcqOption"],ENT_QUOTES,ini_get("default_charset")).'</label>';
			echo '<br>';
		}
		echo '<hr>';
		echo '<br>';
	}
?>
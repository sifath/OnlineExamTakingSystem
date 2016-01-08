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
		$question = selectQuestionDetail($questionSet[$index]["questionId"]);
		echo '<div class="question">'.$index.') '.$question["question"].'</div>';
		echo '<br>';
		$options = selectAllOptionsOf($questionSet[$index]["questionId"]);
		foreach ($options as $op) {
			echo '<label class="mcqOptions"><input type="checkbox" name="'.$question["questionId"].'" value="'.$op["mcqOption"].'"> '.$op["mcqOption"].'</label>';
			echo '<br>';
		}
		echo '<hr>';
		echo '<br>';
	}
?>

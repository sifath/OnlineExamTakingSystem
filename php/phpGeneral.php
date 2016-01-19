<?php
  //session_start();
  //require 'DBConnection.php';


	function getAcquiredMarks($examId,$examineeId)
	{
		$marks = 0;
		$questionSet = selectAllQuestionOf($examId);

		foreach ($questionSet as $question) 
		{
			$correctAnswers = selectAllCorrectOptionsOf($question["questionId"]);
			$examineesAnswer = selectExamineesAnswer($examineeId,$examId,$question["questionId"]);

			if($examineesAnswer)
			{
				$correctCount = 0;
				if(count($examineesAnswer ) == count($correctAnswers))
				{
					foreach ($examineesAnswer as $answer) 
					{
						foreach ($correctAnswers as $ca) 
						{
							if($answer["answer"] == $ca["mcqOption"])
							{
								$correctCount++;
							}
						}
					}
				}


				if($correctCount == count($correctAnswers))
				{
					$marks++;
				}

			}

		}
			
		return $marks;
	}
?>
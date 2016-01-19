<table id ="examList" class="table table-hover table-responsive">

          <tr>
            <th>Exam Name</th>
            <th>Exam Id</th>
            <th>Start Time</th>
            <th>Duration</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
          </tr>
  			<?php 
  			$exams = selectAllExamOfExaminer($_SESSION["currentUser"]);
        if($exams)
        {
  			foreach (array_reverse($exams) as $e) 
        {
  			
  			?>
  				<tr>
  				<td><?php echo $e["examName"];?></td>
  				<td><?php echo $e["examId"];?></td>
  				<td><?php echo $e["startTime"];?></td>
  				<td><?php echo $e["duration"];?></td>
  				<td><a href="createQuestion.php?examId=<?php echo $e["examId"]?>">Add Question</a></td>
  				<td><a href="#">Edit Exam Setting</a></td>
          <td><a href="allResult.php?examId=<?php echo $e["examId"];?>">Results</a></td>
  				</tr>

  				<?php 
  					}
          }
  				?>
</table>
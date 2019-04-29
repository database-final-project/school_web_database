<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Grade</title>
    <link rel="stylesheet" href="style-updateGrade.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>
      <div class="middle">
        <div class="menu">
          <li class="item" id='student'>
		  <?php
			session_start();

			@ $db = new mysqli('localhost', 'root', '12345', 'k_12_school');

			if (mysqli_connect_errno()) {
			echo 'Error: Could not connect to database.  Please try again later.';
			exit;
			}
	
			$teacher_id = $_SESSION["teacher_id"];
	
			if (!get_magic_quotes_gpc()){
				$teacher_id = addslashes($teacher_id);
			}

			$query_course = "SELECT course_name, course_id
					FROM course 
					WHERE teacher_id = " .$teacher_id;

			$result_course = $db->query($query_course);
			$num_results_course = $result_course->num_rows;
			
			for ($j=0; $j < $num_results_course; $j++)  {
			
			$row_course = $result_course-> fetch_assoc();			
		  
            echo '<a href="#student" class="btn"><i class="fas fa-book-open"></i> '. $row_course["course_name"]. ' </a>';
			
			$query_students = "SELECT first_name, last_name, s.student_id
							FROM student s JOIN enrolls_in ei ON s.student_id = ei.student_id
											JOIN course c ON ei.course_id = c.course_id
							WHERE teacher_id = "  .$teacher_id. " AND c.course_id = ". $row_course["course_id"];
			
			$result_students = $db->query($query_students);
			$num_results_students = $result_students->num_rows;
			
			if ($num_results_students > 0) {
              echo '<form class="smenu" method= "post">';
			  
			  for ($i=0; $i < $num_results_students; $i++)  {
				$row_students = $result_students->fetch_assoc();
                echo '<a href="#"> ' .$row_students["first_name"]. ' ' .$row_students["last_name"]. ' <input type="text" name="grade' .$i. '" placeholder =" Letter Grade" value=""></a>';
			  }
                echo '<p><input type="submit" value="Submit Grades"></a></p>
              </form>';
			} else {
				echo "0 results";
			}
			
			if ( isset($_POST["grade0"]))     {
				
				$query_students = "SELECT first_name, last_name, s.student_id
							FROM student s JOIN enrolls_in ei ON s.student_id = ei.student_id
											JOIN course c ON ei.course_id = c.course_id
							WHERE teacher_id = "  .$teacher_id. " AND c.course_id = ". $row_course["course_id"];
							
				$result_students = $db->query($query_students);
				$num_results_students = $result_students->num_rows;
				
				for ($i=0; $i < $num_results_students; $i++)  {
					$row_students = $result_students->fetch_assoc();
					$student_grade = $_POST["grade".$i];
					
					if (!get_magic_quotes_gpc()){
						$student_grade = addslashes($student_grade);
					}
					
					$query_grade = "UPDATE enrolls_in	
									SET grade = '$student_grade' 
									WHERE student_id = " .$row_students["student_id"]. " AND course_id = ". $row_course["course_id"]."
									LIMIT 1000";
									
					if (!$db->query($query_grade) === TRUE) {
						echo "Error updating record: " . $db->error;
				    }					
					
				}
			}
			
			}
	
		  ?>
          </li>

        </div>
      </div>

  </body>
</html>

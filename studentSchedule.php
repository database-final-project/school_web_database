<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Student Grades </title>
    <link rel="stylesheet" href="style-studentSchedule.css">
  </head>
  <body>
  <div class="box">
      <table class = "studentSchedule">
        <tr>
          <th> Class Name </th>
          <th> Class Time </th>
        </tr>

    <?php
	session_start();

    @ $db = new mysqli('localhost', 'root', '12345', 'k_12_school');

    if (mysqli_connect_errno()) {
       echo 'Error: Could not connect to database.  Please try again later.';
       exit;
    }

	$student_id = $_SESSION["student_id"];

	if (!get_magic_quotes_gpc()){
		$student_id = addslashes($student_id);
	  }

    $query = "SELECT course_name, course_schedule
              FROM course c
              JOIN enrolls_in ei ON c.course_id = ei.course_id
              JOIN student s ON ei.student_id = s.student_id
              WHERE s.student_id = " .$student_id;

    $result = $db->query($query);
    $num_results = $result->num_rows;

    if ($num_results > 0) {

	  while ($row = $result-> fetch_assoc() ) {
        echo "<tr><td>". $row["course_name"]. "</td><td>". $row["course_schedule"]. "</td></tr>";
        }

      echo "</table>";
    }
     else {
      echo "0 results";
    }

    $db->close();
    ?>
</div>
  </body>
</html>

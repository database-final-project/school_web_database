<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Student Grades </title>
    <link rel="stylesheet" href="style-studentGrades.css">
  </head>
  <body>
  <div class = "box">
      <table class="studentGrades" style = "padding:10px;">
        <tr>
          <th> Student Class </th>
          <th> Letter Grade </th>
        </tr>
      </table>

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

    $query = "SELECT course_name, grade
           FROM course c
           join enrolls_in ei on c.course_id = ei.course_id
           join student s on ei.student_id = s.student_id
           where s.student_id = " .$student_id;

    $result = $db->query($query);
    $num_results = $result->num_rows;

    if ($num_results > 0) {
	  echo "<table class = 'studentGrades'>";

	  while ($row = $result-> fetch_assoc() ) {
        echo "<tr><td>". $row["course_name"]. "</td><td>". $row["grade"]. "</td></tr>";
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

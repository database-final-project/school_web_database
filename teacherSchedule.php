<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Student Grades </title>
    <link rel="stylesheet" href="style-teacherSchedule.css">
  </head>
  <body>
  <div class="box">

      <table class = "teacherSchedule">
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

	$teacher_id = $_SESSION["teacher_id"];

	if (!get_magic_quotes_gpc()){
		$teacher_id = addslashes($teacher_id);
	  }

    $query = "SELECT course_name, course_schedule
              FROM course
              WHERE teacher_id = " .$teacher_id;

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

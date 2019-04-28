<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Student Grades </title>
    <link rel="stylesheet" href="style-studentGrades.css">
  </head>
  <body>

      <table>
        <tr>
          <th> Student Class </th>
          <th> Letter Grade </th>
        </tr>
      </table>

    <?php


    @ $db = new mysqli('localhost', 'root', 'gigigino10!', 'k_12_school');

    if (mysqli_connect_errno()) {
       echo 'Error: Could not connect to database.  Please try again later.';
       exit;
    }

    $query = "SELECT course_name  as 'Course Name', grade as 'Letter Grade'
           FROM course c
           join enrolls_in ei on c.course_id = ei.course_id
           join student s on ei.student_id = s.student_id
           where s.student_id = '101'
           ";

    $result = $db->query($query);

    $num_results = $result->num_rows;

    if ($num_results > 0) {
      while ($row = $result-> fetch_assoc() ) {
        echo "<tr><td>". $row["course_name"]. "</td><td>". $row["grade"]. "</td></tr>";
        }
      echo "</table>";
    }
     else {
      echo "0 results";
    }

    $conn-> close();
    ?>


  </body>
</html>

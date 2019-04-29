<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Student Grades </title>
    <link rel="stylesheet" href="style-cafeteriaMenu.css">
  </head>
  <body>
  <div class="box">
      <table class = "cafeteriaMenu">
        <tr>
          <th> Day of the Week </th>
          <th> Breakfast </th>
          <th> Lunch </th>
        </tr>
      

    <?php
	session_start();

    @ $db = new mysqli('localhost', 'root', '12345', 'k_12_school');

    if (mysqli_connect_errno()) {
       echo 'Error: Could not connect to database.  Please try again later.';
       exit;
    }

    $query_mb = "SELECT food_name
                  from food_served
                  where food_type = 'breakfast' and day_name = 'Monday' ";

    $query_ml = "SELECT food_name
                 from food_served
                 where food_type = 'lunch' and day_name = 'Monday' ";

    $query_tb = "SELECT food_name
                  from food_served
                  where food_type = 'breakfast' and day_name = 'Tuesday' ";

    $query_tl = "SELECT food_name
                  from food_served
                  where food_type = 'lunch' and day_name = 'Tuesday' ";

    $query_wb = "SELECT food_name
                  from food_served
                  where food_type = 'breakfast' and day_name = 'Wednesday' ";

    $query_wl = "SELECT food_name
                from food_served
                where food_type = 'lunch' and day_name = 'Wednesday' ";

    $query_thb = "SELECT food_name
                  from food_served
                  where food_type = 'breakfast' and day_name ='Thursday' ";

    $query_thl = "SELECT food_name
                  from food_served
                  where food_type = 'lunch' and day_name = 'Thursday' ";

    $query_fb = "SELECT food_name
                  from food_served
                  where food_type = 'breakfast' and day_name ='Friday'  ";

    $query_fl = "SELECT food_name
                from food_served
                where food_type = 'lunch' and day_name = 'Friday' ";

    $result_mb = $db->query($query_mb);
    $result_ml= $db->query($query_ml);
    $result_tb = $db->query($query_tb);
    $result_tl = $db->query($query_tl);
    $result_wb = $db->query($query_wb);
    $result_wl = $db->query($query_wl);
    $result_thb = $db->query($query_thb);
    $result_thl = $db->query($query_thl);
    $result_fb = $db->query($query_fb);
    $result_fl = $db->query($query_fl);

    $row_mb = $result_mb->fetch_assoc();
    $row_ml = $result_ml->fetch_assoc();
    $row_tb = $result_tb->fetch_assoc();
    $row_tl = $result_tl->fetch_assoc();
    $row_wb = $result_wb->fetch_assoc();
    $row_wl = $result_wl->fetch_assoc();
    $row_thb = $result_thb->fetch_assoc();
    $row_thl = $result_thl->fetch_assoc();
    $row_fb = $result_fb->fetch_assoc();
    $row_fl = $result_fl->fetch_assoc();

	 

    echo "<tr><td> Monday </td><td>". $row_mb["food_name"]. "</td><td>". $row_ml["food_name"]. "</td></tr>";
    echo "<tr><td> Tuesday </td><td>". $row_tb["food_name"]. "</td><td>". $row_tl["food_name"]. "</td></tr>";
    echo "<tr><td> Wednesday </td><td>". $row_wb["food_name"]. "</td><td>". $row_wl["food_name"]. "</td></tr>";
    echo "<tr><td> Thursday </td><td>". $row_thb["food_name"]. "</td><td>". $row_thl["food_name"]. "</td></tr>";
    echo "<tr><td> Friday </td><td>". $row_fb["food_name"]. "</td><td>". $row_fl["food_name"]. "</td></tr>";

    echo "</table>";

    $db->close();
    ?>
</div>
  </body>
</html>

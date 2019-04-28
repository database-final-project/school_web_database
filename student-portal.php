<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> student-Portal </title>
    <link rel="stylesheet" href="style-student-portal.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>

    <div class="studentProfile">
      <div class="profileImg"> </div>
	  <?php
	    session_start();
	  
		if (isset($_SESSION["student_id"]) ) {
			echo "<h1> " .$_SESSION ["first_name"]. " " .$_SESSION["last_name"]. " </h1>
			      <h1>" .$_SESSION["student_id"]. "</h1>";
		}      
	  ?>
    </div>

      <div class="middle">
        <div class="menu">
          <li class="item" id='student'>
            <a href="#student" class="btn"><i class="fas fa-book-open"></i> Student Class </a>
            <div class="smenu">
              <a href="#"> Class Schedule</a>
              <a href="#"> Class Attendance </a>
              <a href="studentGrades.php" target="_blank"> Class Grade </a>
            </div>
          </li>

          <li class="item" id = 'mealplan'>
            <a href="#mealplan" class="btn"><i class="fas fa-apple-alt"></i> Meal Plan</a>
            <div class="smenu">
              <a href="#">View Current Meal Plan</a>
              <a href="#">New Meal Plan</a>
            </div>
          </li>

          <li class="item">
            <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>


        </div>
      </div>
  </body>
</html>

<!DOCTYPE html>
<?php
  session_start();
  
  @ $db = new mysqli('localhost', 'root', '12345', 'k_12_school');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  if ( isset($_POST["account"]) && isset($_POST["pw"])    ) {
	  
	  $username=$_POST["account"];
	  $password=$_POST["pw"];
	  
	  if (!get_magic_quotes_gpc()){
		$username = addslashes($username);
		$password = addslashes($password);
	  }
	  
	  $s_query = "SELECT * FROM student WHERE student_id = ".$username." AND s_password = ".$password;
	  $t_query = "SELECT * FROM teacher WHERE teacher_id = ".$username." AND t_password = ".$password;
	  
	  $s_result = $db->query($s_query);
	  $s_num_results = $s_result->num_rows;
	  $t_result = $db->query($t_query);
	  $t_num_results = $t_result->num_rows;
	
      if ($s_num_results == 1) {
		$s_row = $s_result->fetch_assoc();
        $_SESSION["student_id"] = $_POST["account"];
		$_SESSION["first_name"] = $s_row['first_name'];
		$_SESSION["last_name"] = $s_row['last_name'];
        $_SESSION["success"] = "Logged in.";		
        header('Location: student-portal.php' ) ;
        return;
      } else if ($t_num_results == 1) {
		$t_row = $t_result->fetch_assoc();
        $_SESSION["teacher_id"] = $_POST["account"];
		$_SESSION["first_name"] = $t_row['first_name'];
		$_SESSION["last_name"] = $t_row['last_name'];
        $_SESSION["success"] = "Logged in.";		
        header('Location: teacher-portal.php' ) ;
        return;
	  } else {
        $_SESSION["error"] = "Incorrect username and/or password.";
        header( 'Location: login.php') ;
        return;
      }
  }
  
  $db->close();
 ?>
<html lang="en" dir="ltr">
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="style-login.css">
<title>Portal Login</title>
</head>

<body>


<form class="box" method="post">
    <h1>Portal - Login</h1>
    <p><input type="text" name="account"  placeholder="Username" value=""></p>
    <p><input type="password" name="pw"  placeholder="Password" value=""></p>
	
	<?php
 if (isset($_SESSION["error"]) ) {
    echo ('<p style = "color:red">' .$_SESSION ["error"]. "</p>\n" );
    unset ($_SESSION["error"]);
 }
 if (isset($_SESSION["success"]) ) {
    echo ('<p style = "color:green">' .$_SESSION ["success"]. "</p>\n" );
    unset ($_SESSION["success"]);
 }

 ?>

    <p><input type="submit" value="Log In">
    </p>
</form>

</body>

</html>

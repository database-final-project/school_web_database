<!DOCTYPE html>
<?php
  session_start();
  if ( isset($_POST["account"]) && isset($_POST["pw"])    ) {
      unset($_SESSION["account"]);
      if ($_POST["pw"] == 'umsi') {
        $_SESSION["account"] = $_POST["account"];
        $_SESSION["success"] = "Logged in.";
        header('Location: student-portal.php' ) ;
        return;
      } else {
        $_SESSION["error"] = "Incorrect password.";
        header( 'Location: login.php') ;
        return;
      }
  }
 ?>
<html lang="en" dir="ltr">
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="style-login.css">
<title>Portal Login</title>
</head>

<body>
<?phps
 if (isset($_SESSION["error"]) ) {
    echo ('<p style = "color:red">' .$_SESSION ["error"]. "</p>\n" );
    unset ($_SESSION["error"]);
 }
 if (isset($_SESSION["success"]) ) {
    echo ('<p style = "color:green">' .$_SESSION ["success"]. "</p>\n" );
    unset ($_SESSION["success"]);
 }

 ?>

<form class="box" action="student-portal.php" method="post">
    <h1>Portal - Login</h1>
    <p><input type="text" name="account"  placeholder="Username" value=""></p>
    <p><input type="text" name="pw"  placeholder="Password" value=""></p>

    <p><input type="submit" value="Log In">
    <a href="student-portal.php"> </a></p>
</form>

</body>

</html>

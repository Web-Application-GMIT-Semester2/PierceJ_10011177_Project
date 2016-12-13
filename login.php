<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //connect to the database - hint: require
  require ('templates/mysqli_connect.php'); // Connect to the db.
  $user=$_POST['username'];
  $passw=$_POST['password'];
//perform validation ensuring all form fields contain values
if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
    $q = "SELECT user_id FROM users WHERE (username='$user' AND password=SHA1('$passw') )";
    $r = @mysqli_query($dbc, $q);

    $num = @mysqli_num_rows($r);
    if ($num == 1) { // Match was made.
      mysqli_close($dbc);
      $_SESSION['username'] = $user;
      header('Location: home.php');
      exit();
    } else { // Invalid username/password combination.
      header('Location: retry.php');
    }
  } else {
    header('Location: retry.php');
  }
}
?>

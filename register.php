<?php # register.php
// This script performs an INSERT query to add a record to the users table.
session_start();
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //connect to the database - hint: require
		require ('templates/mysqli_connect.php'); // Connect to the db.
	//perform validation ensuring all form fields contain values
	if ((!empty($_POST['first_name'])) && (!empty($_POST['last_name'])) && (!empty($_POST['username'])) && (!empty($_POST['pwd'])) && (!empty($_POST['confPWD']))) {
      if (isset($_POST['agree'])) {
        if ($_POST['pwd'] === $_POST['confPWD']) {
          $fn=$_POST['first_name'];
          $ln=$_POST['last_name'];
          $un=$_POST['username'];
          $pass1=$_POST['pwd'];
          $q = "INSERT INTO users (firstname, lastname, username, password)
          VALUES ('$fn', '$ln', '$un', SHA1('$pass1'))";
          $r = @mysqli_query ($dbc, $q); // Run the query. Note: $dbc is set in the mysqli_connect.php script.
        } else {
          $r=false;
          $q = "Passwords do not match";
        }
      }else{
        $r=false;
        $q = "Please Agree to our terms";
      }
		} else {
			$q = "Missing Info";
			$r=false;
		}
	//Note that password should match confirm password.

	//build your insert query and run it to add the details captured on the form to the users table:
	//For example:


	//Note the password is wrapped in a SHA1 function. This encrypts the password value which will be written to the database.
	//check the query ran ok
	//For example:
	if ($r) {
		header('Location: registered.php');

	} else { // If it did not run OK.
		$_SESSION['error1'] = 'You could not be registered due to a system error. We apologize for any inconvenience.';

		// Debugging message:
		$_SESSION['error2'] = mysqli_error($dbc) . 'Query: ' . $q;
		header('Location: error.php');
	}

	// Close the database connection - mysqli_close().
	mysqli_close($dbc);

	exit();
	// Include the footer and quit the script - exit();



}
?>

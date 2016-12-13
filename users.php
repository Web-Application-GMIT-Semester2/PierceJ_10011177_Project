<?php
	include "templates/overallHeader.php";
	include "templates/navBar.php";

	require ('templates/mysqli_connect.php'); // Connect to the db.
	$loggedUser = $_SESSION['username'];
	// Make the query:
	$q = "SELECT users.username, orderNo, details, details3, details2 FROM users, orders WHERE orders.username=users.username AND users.username='$loggedUser'";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	// Count the number of returned rows:
	$num = mysqli_num_rows($r);

	if ($num > 0) { // If it ran OK, display the records.
		echo "<h2 style='text-align:center'>Welcome, " . $loggedUser ."</h2>\n";
		echo "<h5 style='text-align:center'>Number of Orders on record = $num </h5>\n";
		// Fetch and print all the records:
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$orderNo = $row['orderNo'];
			$details1 = $row['details'];
			$details2 = $row['details2'];
			$details3 = $row['details3'];
			echo "<p style='text-align:center'><b>Order No.</b> =  " . $orderNo ."</p>\n";
			if (($details1 === "NULL") && ($details2 === "NULL")){
				echo "<p style='text-align:center'>Details = $details3</p>\n";
			} else if (($details2 === "NULL") && ($details3 === "NULL")) {
				echo "<p style='text-align:center'>Details = $details1</p>\n";
			} else if (($details1 === "NULL") && ($details3 === "NULL")) {
				echo "<p style='text-align:center'>Details = $details2</p>\n";
			} else if ($details1 === "NULL") {
				echo "<p style='text-align:center'>Details = $details2, $details3</p>\n";
			} else if ($details2 === "NULL") {
				echo "<p style='text-align:center'>Details = $details1, $details3</p>\n";
			} else if ($details3 === "NULL") {
				echo "<p style='text-align:center'>Details = $details1, $details2</p>\n";
			} else {
				echo "<p style='text-align:center'>Details = $details1, $details2, $details3</p>\n";
			}
		// 	if ($row['username'] === $loggedUser) {
		// 		echo '<p>' . $row['firstname'] . '</p>';
		// 	}else { // If no records were returned.
		//
		// 		echo '<h2 class="error">There are currently no orders for '.$row['firstname'] . " " . $row['lastname'] .'</p>';
		//
		// 	}
		//
		// mysqli_free_result ($r); // Free up the resources.

		}
	} else {
		echo '<br><h2 style="text-align:center"> No orders for ' . $loggedUser . '</h2>';
	}

	mysqli_close($dbc); // Close the database connection.
?>
		<!-- Three -->
			<section id="three">
				<div class="inner">
					<article>
						<div class="content">

						</div>
					</article>
				</div>
			</section>
<?PHP
include "templates/footer.php";
include "templates/overallFooter.php";
?>

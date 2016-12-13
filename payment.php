<?php
include "templates/overallHeader.php";
include "templates/navBar.php";
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//connect to the database - hint: require
		require ('templates/mysqli_connect.php'); // Connect to the db.
	//perform validation ensuring orderNo contain values
	$un = $_SESSION['username'];
	$on = $_POST['orderNo'];
	$i1 = $_POST['itemName1'];
	$i2 = $_POST['itemName2'];
	$i3 = $_POST['itemName3'];
	$to = $_POST['total'];
	if (!empty($_POST['orderNo'])) {
		$q = "INSERT INTO orders (username, orderNo, details, details2, details3, GrandTotal)
								VALUES ('$un', '$on', '$i1', '$i2', '$i3' ,'$to')";
		header('Location: home.php');
	} else {
		$_SESSION['error1'] = "Order could Not be processed";
		$_SESSION['error2'] = mysqli_error($dbc) . 'Query: ' . $q;
		header('Location: error.php');
	}
	$r = @mysqli_query ($dbc, $q); // Run the query. Note: $dbc is set in the mysqli_connect.php script.
	// Close the database connection - mysqli_close().
	mysqli_close($dbc);

	//exit();
	// Include the footer and quit the script - exit();

}

?>

<!-- Three -->
<section id="three">
	<div class="inner">
	<article>
	<div>
		<h4 style='text-align: center;'>Order Details for <i name="username">'<?php echo $_SESSION['username']; ?>'</i></h4>
		<p id="payment" style='text-align: center;'>
		</article>
		<article>
			<div style="text-align:center">
				<p>Enter credit card number in field below</p>
				<i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true" style="color: #f2a3a5"></i><br>
					<input id="cc_number" value="5105105105105100"></input><br><br> <!-- value has a valid text credit card number -->
					<input type="submit" class="confirm" value="Validate Credit Card">
			</div>
		</article>
		<article>
			<div style="text-align:center">
				<h4 class="ccSuccess" hidden="true">Success! Order Placed! Returning to homepage</h4><br>
				<h4 class="ccSuccess" id="timeout"></h4>
				<p class="ccSuccess" hidden="true" >Please hold onto your order number as there is a strong possibility you will never see the item(s)</p>
				<audio id="audio" class="ccSuccess" type="audio/mpeg" src="mp3/success.mp3"></audio>
				<form hidden id="ccSuccess" method="POST" action="payment.php">
					<input hidden type="text" name="orderNo" id="orderNo"/>
					<input hidden type="text" name="itemName1" id="itemName1"/>
					<input hidden type="text" name="itemName2" id="itemName2"/>
					<input hidden type="text" name="itemName3" id="itemName3"/>
					<input hidden type="text" name="total" id="total"/>
					<input type="submit" class="confirm" name="orders" id="orders" value="Return To Home"></input>
				</form>
			</div>
		</article>
	</div>
	</section>
	<?PHP
	include "templates/footer.php";
	include "templates/overallFooter.php";
	?>

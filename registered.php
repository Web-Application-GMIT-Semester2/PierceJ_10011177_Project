<?php
include "templates/overallHeader.php";
include "templates/loginBar.php";
?>
<article>
	<form action="login.php" method="post">
		<h3 id="message">Congrats. You are now registered. Please log in below</h3>
		<input class="registered" type="text" name="username" placeholder="Username">
		<input class="registered" type="password" name="password" placeholder="Password"><br>
		<input class="registered2" type=submit name="pwd" placeholder="Password" value="Login">
	</form>
</article>
</div>
</section>
<?PHP
include "templates/footer.php";
include "templates/overallFooter.php";
?>

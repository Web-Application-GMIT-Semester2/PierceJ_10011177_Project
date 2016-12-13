<?php
include "templates/overallHeader.php";
include "templates/retryBar.php";
?>
<article>
	<form action="login.php" method="post">
		<h3 id="message">Username and Password do not match those on record. Please Try Again!</h3>
		<input class="retry" type="text" name="username" placeholder="Username">
		<input class="retry" type="password" name="password" placeholder="Password"><br>
		<input class="retry2" type=submit name="pwd" placeholder="Password" value="Login">
		<a href="index.php#three"><input class="reg" type=button name="pwd" placeholder="Password" value="Register">
	</form>
</article>
</div>
</section>
<?PHP
include "templates/footer.php";
include "templates/overallFooter.php";
?>

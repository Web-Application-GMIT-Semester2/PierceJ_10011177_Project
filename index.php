<?php
	include "templates/overallHeader.php";
	include "templates/loginBar.php";
?>


		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Razorburn: <span>Buy great value razors<br />
					from Razorburn Solutions</span></h1>
					<ul class="actions">
						<li><a href="#three" class="button alt">Get Started</a></li>
					</ul>
				</div>
			</section>

		<!-- Three -->
			<section id="three">
				<div class="inner">
					<article>
						<div class="content">
							<span class="icon fa-shopping-cart"></span>
							<header>
								<h3>Buy from Our Shop</h3>
							</header>
							<p>Sign Up/Login to purchase great value items from our online store.</p>
						</div>
					</article>
					<article>
						<form action="register.php" method="post" class="cd-form">
			        <p class="fieldset">
			          <input id="signup-username" type="text" name="username" placeholder="Username">
			        </p>

			        <p class="field half">
			          <input id="fName" name="first_name" type="text" placeholder="First Name">
			        </p>

			        <p class="field half">
			          <input id="lName" name="last_name" type="text" placeholder="Last Name">
			        </p>

			        <p class="fieldset">
			          <input id="signup-password" name="pwd" type="password"  placeholder="Password">
			        </p>

			        <p class="fieldset">
			          <input id="signup-password" name="confPWD" type="password"  placeholder="Confirm Password">
			        </p>

			        <p class="fieldset">
			          <input type="checkbox" name="agree" id="accept-terms">
			          <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
			        </p>

			        <p class="fieldset">
			          <input class="full-width has-padding" type="submit" value="Create account">
			        </p>
			      </form>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-percent"></span>
							<header>
								<h3>Amazing Discounts</h3>
							</header>
							<p>Sign Up/Login to recieve great discounts from our online store.</p>
						</div>
					</article>
				</div>
			</section>
			<?PHP
			include "templates/footer.php";
			include "templates/overallFooter.php";
			?>

<?php
	include "templates/overallHeader.php";
	include "templates/navBar.php";
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
							<img src="images/1.jpg" height="150" width="150"><br>
							<p>Edwin Jagger DE89</p>
							<p value=29.95>€29.95</p>
							<button id="EJ" class="btn">Add To Cart</button>
						</div>
					</article>
					<article>
						<div class="content">
							<img src="images/2.jpg" height="150" width="150"><br>
							<p>Wilkinson Sword Classic</p>
							<p value=4.75>€4.75</p>
							<button id="WS"  class="btn">Add To Cart</button>
						</div>
					</article>
					<article>
						<div class="content">
							<img class="image" src="images/3.jpg" height="150" width="150"><br>
							<p class="name">Merkur 34c</p>
							<p class="price" value=35.95>€35.95</p>
							<button id="MK" class="btn">Add To Cart</button>
						</div>
					</article>
				</div>
			</section>
			<?PHP
			include "templates/footer.php";
			include "templates/overallFooter.php";
			?>

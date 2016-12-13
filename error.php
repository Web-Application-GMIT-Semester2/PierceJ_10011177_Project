<?php
include "templates/overallHeader.php";
include "templates/errorBar.php";
session_start();
?>
<article>
	<br>
	<p style="text-align:center"><i style="color: #f2a3a5" class="fa fa-exclamation-circle fa-3x" aria-hidden="true"></i></p>
	<h3 style="text-align:center">System Error</h3>
		<h4 style="text-align:center">Error Message: <?php echo $_SESSION['error1'];?></h4>
		<p style="text-align:center">Error Detail: <?php echo $_SESSION['error2'];?></p>
</article>
</div>
</section>
<?PHP
include "templates/footer.php";
include "templates/overallFooter.php";
?>

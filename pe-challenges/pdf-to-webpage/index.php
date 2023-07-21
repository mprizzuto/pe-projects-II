<?php include "functions.php"; ?>
<?php include "./components/header.php"; ?>
<main class="site-main">
	<article class="homepage-article">
		<h2 aria-hidden="true">the agenda</h2>
		<section class="hours-roles">
			<inner-column>
				<!-- <h2>hours and roles</h2> -->

				<div>
					<?php include "./modules/hours.php"; ?>
				</div>

				<div>
					<?php include "./modules/roles.php"; ?>
				</div>
				
			</inner-column>
		</section>
	</article>
</main>
<?php include "./components/footer.php"; ?>
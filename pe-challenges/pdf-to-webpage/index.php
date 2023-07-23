<?php include "functions.php"; ?>
<?php include "./components/header.php"; ?>
<main class="site-main">
	<article class="homepage-article">
		<h2 aria-hidden="true">the agenda</h2>
		<section class="hours-roles">
			<inner-column>
				<h2>hours and roles</h2>
				<div class="hours-roles">
					<div class="hours">
						<?php include "./modules/hours.php"; ?>
					</div>

					<div class="roles">
						<?php include "./modules/roles.php"; ?>
					</div>
				</div>	
				
				
			</inner-column>
		</section>

		<section class="hot-seat">
			<inner-column>
				<h2>Standup questions</h2>
				<?php include "./modules/questions.php"; ?>
			</inner-column>
		</section>
	</article>
</main>
<?php include "./components/footer.php"; ?>
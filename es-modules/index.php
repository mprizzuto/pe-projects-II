<?php require_once "./modules/header.php" ;?>
<main class="site-main">
	<section class="welcome">
		<inner-column>
			
			<?php
				switch (getPage()) {
					case null:
						case "":
						include "./components/pages/home.php";
						break;

						case "pseudocode":
							include "./components/pages/pseudocode.php";
							break;
					default:
						include "./components/pages/404.php";
						break;
				}
				?>
				<?php formatInput(getPage())?>
		</inner-column>
	</section>
</main>

<?php require_once "./modules/footer.php" ;?>
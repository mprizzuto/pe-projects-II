				
				</inner-column>
			</section>
		</main>
		
		<?php

		if ( $_GET["page"] ?? null === "edit" && $_SERVER["REQUEST_METHOD"] === "POST" ) {
			editPost();
		}
		?>
		
		<footer>
			<inner-column>
				<h2>footer</h2>
			</inner-column>
		</footer>
		<script src="./public/scripts/script.js"></script>
	</body>
</html>
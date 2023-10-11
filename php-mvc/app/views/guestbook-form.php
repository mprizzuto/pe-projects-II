<section>
	<inner-column>
		<h2>sign the guestbook</h2>

   <p>username rules</p>

	 <ul class="username-rules">
        <li>userName can only contain letters or numbers. no spaces allowed</li>
      </ul>

		<form id="guestbook-form" method="POST">
			<fieldset>
				<label for="guest-name">name</label>
				<input id="guest-name" type="text" name="guest-name" required>
				<span class="user-message"></span>
			</fieldset>
			
			<fieldset>
				<label for="guest-comment">comment</label>
				<textarea id="guest-comment" name="guest-comment" rows="5" cols="34" required></textarea>
			</fieldset>

			<button type="submit" value="submit">submit</button>
		</form>
	</inner-column>
</section>

<?php 

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {

  ["guest-name" => $name, "guest-comment" => $comment] = $_POST;

  writeToGuestBook($name, $comment);

}

?>

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
				<input id="guest-name" type="text" name="guest-name" value="<?php echo getCurrentPage() === "edit" ? getPostById()[0] ?? null : "" ?>" required>
				<span class="user-message"></span>
			</fieldset>
			
			<fieldset>
				<label for="guest-comment">comment</label>
				<textarea id="guest-comment" name="guest-comment" rows="5" cols="34" required>
					<?php echo getCurrentPage() === "edit" ? getPostById()[1] ?? null : "" ?>
				</textarea>
				<span class="user-message"></span>
			</fieldset>

			<button type="submit" value="submit">submit</button>
		</form>
	</inner-column>
</section>

<?php 

if ( $_SERVER["REQUEST_METHOD"] === "POST" && getCurrentPage() === "guestbook" ) {
  ["guest-name" => $name, "guest-comment" => $comment] = $_POST;

	writeToGuestBook($name, $comment);

	array_push( $_SESSION["user_data"], ["guest_name" => sanitizeUserNameAndComment(truncateLongString($_POST["guest-name"], 10)), "session_id" => session_id()] );
}


if (  getCurrentPage() === "edit" && canUserEdit()) {
  editPost();
}

if (canUserEdit() === false) {
	echo "POST EXPIRED";
}

// formatInput(canUserEdit());

?>

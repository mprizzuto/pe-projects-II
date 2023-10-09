<section>
	<inner-column>
		<h2>sign the guestbook</h2>

    <!-- <p>we have the same username rules as google!</p>

    <blockquote>
      <ul class="username-rules">
        <li>Usernames can contain letters (a-z), numbers (0-9), and periods (.).</li>
        <li>Usernames cannot contain an ampersand (&), equals sign (=), underscore (_), apostrophe ('), dash (-), plus sign (+), comma (,), brackets (<,>), or more than one period (.)</li>
      </ul>
    </blockquote> -->

		<form method="POST">
			<fieldset>
				<label for="guest-name">name</label>
				<input id="guest-name" type="" name="guest-name" required>
			</fieldset>
			
			<fieldset>
				<label for="guest-comment">comment</label>
				<input id="guest-comment" type="" name="guest-comment" required>
			</fieldset>

			<button type="submit" value="submit">submit</button>
		</form>
	</inner-column>
</section>

<?php 

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
  //   echo "FORM POStED \n\n";

  ["guest-name" => $name, "guest-comment" => $comment] = $_POST;

  writeToGuestBook(trim($name), trim($comment) );

}

?>

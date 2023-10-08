<section>
	<inner-column>
		<h2>home</h2>

		<form method="POST">
			<fieldset>
				<label for="guest-name">name</label>
				<input id="guest-name" type="" name="guest-name">
			</fieldset>
			
			<fieldset>
				<label for="guest-comment">comment</label>
				<input id="guest-comment" type="" name="guest-comment">
			</fieldset>

			<button type="submit" value="submit">submit</button>
		</form>
	</inner-column>
</section>

<?php 

// if form is submitted, write data to dabase. only write to database if id doesnt alrready exist

if ( count(getGuestbookData() ?? [] ) > 0 ) {
  // formatInput( getGuestbookData() );
  templateGuestBookData();
}
else {
  echo "no entries added";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  echo "FORM POStED \n\n";

  ["guest-name" => $name, "guest-comment" => $comment] = $_POST;

  // echo $comment;
  if ( strlen(trim($name)) === 0 || 
    strlen(trim($comment) === 0 ) ) {
    echo "empty valuues";
  }
}
?>

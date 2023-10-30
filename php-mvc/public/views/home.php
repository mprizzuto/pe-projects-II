<h2>guestbook comments</h2>

<p>to leave a comment, go to the <a href="?page=guestbook">guestbook</a>.

<?php if (countUsers() === 0): ?> 
  <span>no users yet!</span>
<?php endif; ?>

<?php if (countUsers() === 1): ?> 
  <span>theres one user. keep them company by leaving a comment</span>
<?php endif; ?>

<?php if (countUsers() > 1): ?> 
  <span>there are <?=countUsers()?> users</span>
<?php endif; ?>

</p>

<?php 
if ( count( getGuestbookData() ) > 0 ) {
	templateGuestBookData();
}
else if ( count( getGuestbookData() ) === 0 && 
  isset($_SESSION["user_data"]) ) {
  session_destroy();
}

?>
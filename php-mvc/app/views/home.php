<h2>guestbook comments</h2>

<p>to leave a comment, go to the <a href="?page=guestbook">guestbook</a></p>



<?php 
if ( count( getGuestbookData() ) > 0 ) {
	templateGuestBookData();
}
else {
  echo "no entries currently";
}
?>
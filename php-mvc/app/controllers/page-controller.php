<h2>controller</h2>
<?php
switch ( getCurrentPage() ) {
	case "":
  case "home":
		include "./public/views/home.php";
		break;
	
  case "goals":
      include "./public/views/goals.php";
      break;

  case "guestbook":
    include "./public/views/guestbook-form.php";
    break;

  case "contact":
    include "./public/views/contact.php";
    break;

  case "delete":
    include "./public/views/delete.php";
    break;  

    // case "edit":
    // include "./views/guestbook-edit.php";
    // break;
          
	default:
		include "./public/views/404.php";
}


<?php
switch ( getCurrentPage() ) {
	case "":
  case "home":
		include "./views/home.php";
		break;
	
  case "goals":
      include "./views/goals.php";
      break;

  case "guestbook":
    include "./views/guestbook-form.php";
    break;

  case "contact":
    include "./views/contact.php";
    break;

  case "delete":
    include "./views/delete.php";
    break;  

    // case "edit":
    // include "./views/guestbook-edit.php";
    // break;
          
	default:
		include "./views/404.php";
}


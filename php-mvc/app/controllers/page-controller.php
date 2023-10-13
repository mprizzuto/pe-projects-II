<?php
switch ( getCurrentPage() ) {
	case "":
  case "home":
  // echo "IT WOKS";
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
        
	default:
		include "./views/404.php";
}
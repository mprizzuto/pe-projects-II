<?php

switch ( getCurrentPage() ) {
	case "":
  case "home":
		include "../app/views/home.php";
		break;
	
  case "goals":
      include "../app/views/goals.php";
      break;

  case "guestbook":
    include "../app/views/guestbook-form.php";
    break;

  case "contact":
    include "../app/views/contact.php";
    break; 
        
	default:
		include "../app/views/404.php";
}
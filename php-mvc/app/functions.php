<?php
function formatInput($input) {
	echo "<pre>";
		var_dump($input);
	echo "</pre>";
}


function navLinksArray() {
  $pathToLinks = "../app/models/nav-links.json";
  
  $fileJSON = file_get_contents($pathToLinks);

  $linksAsArray = json_decode($fileJSON, true);
  
  return $linksAsArray;
}


function generateLinks($linksArr) {
  foreach ($linksArr as $key) {
    foreach ($key as $subKey => $subValue) {
      echo " ";
      echo <<< HEREDOC
      <a href="$subValue">$subKey</a>
      HEREDOC;
    }
  }
} 

function getCurrentPage() {
  return $_GET["page"] ?? null;
}

function getGuestbookData() {
  $guestBook = file_get_contents("../app/models/guestbook.json");

  return json_decode($guestBook, true) ?? [];
}

function writeToGuestBook($userName, $userComment, ) {
  $guestBook = file_get_contents("../app/models/guestbook.json"); // should this be its own function?

  $guestBookArray = json_decode($guestBook, true) ?? [];

  array_unshift( $guestBookArray, ["id" => generateGuestId(), "user_name" => sanitizeUserNameAndComment($userName), "user_comment" => sanitizeUserNameAndComment($userComment)] );
  $dataStr = json_encode($guestBookArray);
  
  file_put_contents("../app/models/guestbook.json", $dataStr);
  
  // formatInput($guestBookArray);
}

function templateGuestBookData() {
  echo "<ul>";
  foreach (getGuestbookData() ?? [] as $key => $value) {
     // formatInput($value["userName"]);
     $userName= $value["user_name"] ?? null;
     $userComment= $value["user_comment"] ?? null;
     $dateMDY = getDateMDY();
     //TODO: SANITIZE data below
     echo <<< GUESTCARD
     <li>
      <guest-card> 
        <ul class="user-info">
          <li>
            <span class='user-name'>{$userName}</span> {$dateMDY}
          </li>
        
          <li class="client-time"> am/pm</li>
        </ul>

        <p>$userComment</p>

        <!-- TODO: only show delete edit links if post is <30 minutes old and user id and session id match?-->

      </guest-card>
    </li>
  GUESTCARD;
  }
  echo "</ul>"; 
}

function getDateMDY() {
  date_default_timezone_set("US/Eastern");

  return date("F j, Y g:i A");
}

function generateGuestId() {
  return uniqid();
}

function validUserName($str) {
  if ( preg_match("/[^a-zA-Z_0-9.]/", $str) ) {
     return false;
  }
  else {
    return true;
  }
}

function sanitizeUserNameAndComment($userName) {
  return preg_replace("/[^a-zA-Z_0-9.]\s?/", "", $userName);
}



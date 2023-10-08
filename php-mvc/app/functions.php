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

  return json_decode($guestBook, true);
}

function writeToGuestBook($userName, $userComment, ) {
  $guestBook = file_get_contents("../app/models/guestbook.json"); // should this be its own function?

  $guestBookArray = json_decode($guestBook, true);
  $guestBookArray[] = ["id" => generateGuestId(), "user_name" => $userName, "user_comment" => $userComment];
  $dataStr = json_encode($guestBookArray);
  
  file_put_contents("../app/models/guestbook.json", $dataStr);
  
  // formatInput($guestBookArray);
}

function templateGuestBookData() {
  echo "<ul>";
  foreach (getGuestbookData() as $key => $value) {
     // formatInput($value["userName"]);
     $userName= $value["user_name"] ?? null;
     $userComment= $value["user_comment"] ?? null;
     $dateMDY = getDateMDY();

     echo <<< GUESTCARD
     <li>
      <guest-card> 
          <span class="user-info">
               <div>
               <span class='user-name'>{$userName}</span> {$dateMDY}
               </div>
          
               <span id="client-time"> am/pm</span>
          </span>

          <p>$userComment</p>

          <!-- TODO: only show delete edit links if post is <30 minutes old and user id and session id match? -->

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





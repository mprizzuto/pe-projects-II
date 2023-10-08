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

function templateGuestBookData() {
  echo "<ul>";
  foreach (getGuestbookData() as $key => $value) {
     // formatInput($value["userName"]);
     $userName= $value["userName"];
     $userComment= $value["comment"];
     $dateMDY = getDateMDY();
     echo <<< GUESTCARD
     <li>
      <guest-card> 
          <span class="user-info">
               <span>{$dateMDY}</span>
          
               <span id="client-time"> am/pm</span>
          </span>

          <p>$userComment</p>

          <!-- TODO: only show delete edit links if post is <30 minutes old -->

      </guest-card>
    </li>
  GUESTCARD;
     
    // foreach ($value as $subKey => $subValue) {

    // }
 }
echo "</ul>"; 
}

function getDateMDY() {
   return date("F j, Y");
 }





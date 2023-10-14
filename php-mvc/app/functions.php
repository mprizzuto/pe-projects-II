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

  // session_start();
// "post_time" => $getDateMDY()
  array_unshift( $guestBookArray, [
    "id" => generateGuestId(), 
    "user_name" => sanitizeUserNameAndComment(truncateLongString($userName, 10)), 
    "user_comment" => sanitizeUserNameAndComment( truncateLongString($userComment, 30) ), 
    "session_id" => session_create_id(),
    "post_time" => getDateMDY()
  ]);

  $dataStr = json_encode($guestBookArray);
  
  file_put_contents("../app/models/guestbook.json", $dataStr);
}

function templateGuestBookData() {
  echo "<ul>";
  foreach (getGuestbookData() ?? [] as $key => $value) {
     // formatInput($value["userName"]);
     $userName = $value["user_name"] ?? null;
     $userComment = $value["user_comment"] ?? null;
     $postTime = $value["post_time"] ?? null;

     // maybe just use a regEx to check for no presence of letters here? 
     //and maybe the HTML should be in a function?
     if ( $userName === "" || $userComment === "" ) {
       echo <<< GUESTCARD
         <li>
          <guest-card> 
            <ul class="user-info">
              <li>
                <span class='user-name'>empty</span> {$postTime}
              </li>
            
              <li class="client-time"> am/pm</li>
            </ul>

            <p>empty</p>

            <!-- TODO: only show delete edit links if post is <30 minutes old and user id and session id match?-->

          </guest-card>
        </li>
      GUESTCARD;
     }
     else {
      $canEdit = canUserEdit();
      $linksTemplate = $canEdit === true ? "<a href='#'>edit</a>  <a href='#'>delete</a>" : "";
        //TODO: SANITIZE data below
         echo <<< GUESTCARD
         <li>
          <guest-card> 
            <ul class="user-info">
              <li>
                <span class='user-name'>{$userName}</span> {$postTime}
              </li>
            
              <li class="client-time"> am/pm</li>
            </ul>

            <p>$userComment</p>
            <p>$linksTemplate</p>
            <!-- TODO: only show delete edit links if post is <30 minutes old and user id and session id match?-->

          </guest-card>
        </li>
      GUESTCARD;
     }
     
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

// replace specific form field names with more generic "string" ?
function truncateLongString($str, $length) { 
  return substr($str, 0, $length);
}

function countUsers() {
  return count( getGuestbookData() );
}

function isFileEmpty($file) {
  $currentFile  = file_get_contents($file);

  if ( strlen(trim($currentFile)) === 0 ) {
    // if this is true the 404.php should be included... on the page of the function call
    return true;
  }
}

function canUserEdit() {
  if ( ( time() - $_SESSION["start"] ) > (60 * 30) ) {
    // unset($_SESSION['example']);
    return false;
  }
  return true;
}


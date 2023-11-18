<?php
function formatInput($input) {
	echo "<pre>";
		var_dump($input);
	echo "</pre>";
}


function navLinksArray() {
  $pathToLinks = "./app/models/nav-links.json";
  
  $fileJSON = file_get_contents($pathToLinks);

  $linksAsArray = json_decode($fileJSON, true);
  
  return $linksAsArray;
}



function generateLinks($linksArr) {
  foreach ($linksArr as $key) {
    foreach ($key as $subKey => $subValue) {
      echo " ";
      echo <<< NAVLINKS
      <a href="$subValue">$subKey</a>
      NAVLINKS;
    }
  }
}



function getCurrentPage() {
  return $_GET["page"] ?? null;
}

function getCurrentId() {
  return $_GET["id"] ?? null;
}


function getGuestbookData() {
  $guestBook = file_get_contents("./app/models/guestbook.json");

  return json_decode($guestBook, true) ?? [];
}



function writeToGuestBook($userName, $userComment) {
  $guestBook = file_get_contents("./app/models/guestbook.json"); // should this be its own function?

  $guestBookArray = json_decode($guestBook, true) ?? [];

  // $sanitizeComment = preg_replace("/[^a-zA-Z_0-9.]/", "", $userComment);

   array_unshift( $guestBookArray, [generateGuestId() => [
    "user_name" => sanitizeUserNameAndComment( truncateLongString($userName, 10) ), 
    "user_comment" => sanitizeUserNameAndComment( truncateLongString($userComment, 30) ), 
    // "user_comment" => truncateLongString($sanitizeComment, 30), 
    "session_id" => session_id(),
    "post_time" => time()
   ] ] );
  $dataStr = json_encode($guestBookArray, JSON_PRETTY_PRINT);
  
  file_put_contents("./app/models/guestbook.json", $dataStr);
}



function templateGuestBookData() {
  echo "<ul>";
  foreach (getGuestbookData() ?? [] as $key => $value) {
     
    foreach ($value as $subKey => $subValue) {
      $userName = htmlspecialchars($subValue["user_name"] ?? null, ENT_QUOTES, "UTF-8");
      $userComment = htmlspecialchars($subValue["user_comment"] ?? null, ENT_QUOTES, "UTF-8");
      $postTime = $subValue["post_time"] ?? null;
      $postid = $subKey ?? null;
      $postTimeFormatted = getDateMDY($subValue["post_time"]);
      $timeElapsed = (time() - $postTime >= 180) ? true: false;
      
      $doesSessionDataMatch = $subValue["session_id"] === ($_COOKIE["PHPSESSID"] ?? null);
      
      $linksTemplate = $timeElapsed === false && $doesSessionDataMatch ? "<a href='?page=edit&id=$postid'>edit</a>  <a href='?page=delete&id=$postid'>delete</a>" : ""; 

      if ( $userName === "" || $userComment === "" ) {
         echo <<< GUESTCARD
           <li>
            <guest-card> 
              <ul class="user-info">
                <li>
                  <span class='user-name'>empty</span> {$postTimeFormatted}
                </li>
              
                <li class="client-time"> am/pm</li>
              </ul>

              <p>empty</p>
              <p>$linksTemplate</p>

            </guest-card>
          </li>
         GUESTCARD;
      }
      else {
       echo <<< GUESTCARD
        <li>
          <guest-card> 
            <ul class="user-info">
              <li>
                <span class='user-name'>{$userName}</span> {$postTimeFormatted}
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
  }
  echo "</ul>";
}



function getDateMDY($time) {
  date_default_timezone_set("US/Eastern");

  return date("F j, Y g:i A", $time);
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
  return preg_replace("/[^a-zA-Z_0-9.]\s?/", " ", $userName);
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


function getPostById() {
  // TODO: if post isnt found, output "POST NOT FOUND"
  $guestBookData = getGuestbookData();
  foreach ($guestBookData as $key => $value) {
    foreach ($value as $subKey => $subValue) {
      // echo $subKey;
      if ($subKey === getCurrentId()) {
        // echo $subKey;
        // formatInput($subValue["user_name"]);
        $name = $subValue["user_name"];
        $comment = $subValue["user_comment"];

        return [$name, $comment];
      }
    }
  }
}


function deletePost() {
  $postsDbFile =  "./app/models/guestbook.json";
  $postDbString = file_get_contents($postsDbFile);
  $postDbJSON = json_decode($postDbString, true);
  $idAsGetParam = $_GET["id"] ?? null;
  $isPostDeleted = null;
  // formatInput($postDbJSON);
  foreach ($postDbJSON as $arrIndex => $arrValue) {
    foreach ($arrValue as $subKey => $subValue) {
      if ( $subKey === $idAsGetParam ) { //TODO: add check for elapsed time. output error if editing time exceeds time allowed
        unset($postDbJSON[$arrIndex]);
        $postDbString = json_encode($postDbJSON, JSON_PRETTY_PRINT);
        file_put_contents($postsDbFile, $postDbString);

        $isPostDeleted += true;
      }
      else {
        $isPostDeleted += false;
      }
    }
     
  }
  return $isPostDeleted;
}


function editPost() {
  $guestBookData = getGuestbookData();
  $guestBookPath = "./app/models/guestbook.json";

  foreach ($guestBookData as $key => &$value) {
    foreach ($value as $subKey => &$subValue) {
      // echo $subKey;
      if ($subKey === getCurrentId()) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          // echo $subKey;
          // formatInput($subValue["user_name"]);
          $subValue["user_name"] = $_POST["guest-name"] ?? null;
          $subValue["user_comment"] = $_POST["guest-comment"] ?? null;

          $dataStr = json_encode($guestBookData, JSON_PRETTY_PRINT);

          file_put_contents($guestBookPath, $dataStr);
        }
      }
    }
  }
}


function canUserEdit() {
  $isEditable = null;

  foreach (getGuestbookData() as $key) {
    foreach ($key as $subKey => $subValue) {
      if ( getCurrentId() === $subKey ) {
        if ( time() - $subValue["post_time"] >= 180 ) {
          $isEditable = false;
        }

        if ( time() - $subValue["post_time"] <= 180 ) {
          // return true;
          $isEditable = true;
        }
      }
    }
  }
  return $isEditable;
}





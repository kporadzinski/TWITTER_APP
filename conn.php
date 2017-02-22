<?php
$db = 'twitter_app';
if (!$db) {
  $conn = new Mysqli('localhost','root','');
}  else {
  $conn = new Mysqli('localhost','root','', $db);

}

if($conn->connect_error) {
  die ("Missing connection. Error:".$conn->connect_error);
}
//echo ("Connection done");





?>

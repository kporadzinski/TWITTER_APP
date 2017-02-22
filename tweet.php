<html>

<link rel ="stylesheet" type="text/css" href = "mystyle.css">
<script src='js2.js'></script>
<script src='js.js'></script>

<script>

function ale() {

    return alert (a);
    }

 function err() {
   return false ;
 }
var a = 'thanks for your comment!' ;
</script>

<?php

require 'conn.php' ;


if (isset($_GET['id'])) {

    $id3 = $_GET['id'];

} else {

    $id3 = $_POST['id'] ;
    $comment = $_POST['text'] ;

    $sql = "INSERT INTO comments(comment_id, comment_text, comment_author, twit_comment,
    com_time) VALUES ('','$comment','1','$id3','') " ;//here comes code to cookies and sessione to get id

    $result = $conn->query($sql);

    if ($result) { echo 'ok your comment has been added' ; } else { echo $conn->error;};
}



$sql = "SELECT `twid_ID`, `twit_text`, `twit_author_id` FROM `twitts` WHERE twid_ID=$id3";
$sql2= "SELECT * FROM `comments` WHERE twit_comment='$id3' ORDER BY comment_id DESC ";

$result = $conn->query($sql); //getting content of tweet
$result2 = $conn->query($sql2); //getting comments of tweet




foreach ($result as $key => $value) {
   foreach ($value as $a=>$b) {

      if ($a === 'twit_text') {
       $txt = $b;
      }
   }

}

echo '
<p2> YOUR MESSAGE : </p2>
<div class="tweet"> <br><br>'

.$txt.'</div><br>

<form action="tweet.php" method="POST" onsubmit="return false">
<input type="text" id="pole" name="text"> KOMENTARZ </input><br>
<input type="hidden" name="id" value="'.$id3.'"></input> <br>
<input type="submit" value="SEND"> </input>
</form><br>



<a href="main.php">WRÓĆ</a>' ;

foreach ($result2 as $key => $value) {
   foreach ($value as $a=>$b) {

      if ($a === 'comment_text') {
       $txtc = $b;
       echo '<div class="tweet"> <br><br>'

       .$txtc.'</div><br>';
      }
   }

}






?>

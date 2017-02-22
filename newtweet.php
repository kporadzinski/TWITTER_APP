<?php

 $db = 'twitter_app';

 $tweet = $_GET['tweet'];
 require 'conn.php' ;

 $aID = '1';
 $query = "INSERT INTO `twitts`(`twid_ID`, `twit_text`, `twit_author_id`) VALUES ('','$tweet','$aID')";
 $result = $conn->query($query) ;
  var_dump ($result);


echo '<a href="main.php"> CZYTAJ WIADOMOŚCI <a>' ;



 $conn->close();
 $conn = null;


 ?>

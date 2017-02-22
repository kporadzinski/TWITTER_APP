<html>
<link rel ="stylesheet" type="text/css" href = "mystyle.css">
<script src='js2.js'></script>

<div style="text-align: center">
<?php
session_start();
 if (isset($_SESSION['user'])) {


    echo"<a href='NewTweet.html'  class='opa'> NOWA WIADOMOSC </a><br>";

    echo ($_SESSION['user']) ;
    require 'conn.php';


    $user = '1'; //youser will kame from sesseion bush camo glow

    if (isset ($_POST['delate'])) {
      $del = $_POST["delID"] ;
      $sqll="DELETE FROM twitts WHERE twid_ID ="." '$del' " ;
      $result = $conn->query($sqll) ;
      if ($result) { echo 'skaskowano';} else {var_dump($conn->error);};
    }


    // $sql = "SELECT twit_text,twid_ID FROM twitts WHERE twit_author_id = '$user' ";
    $sql = "SELECT twit_text,twid_ID FROM twitts WHERE 1 ORDER BY twid_ID DESC ";
    $result = $conn->query($sql);


    foreach ($result as $a=>$b) {

        $id = $b['twid_ID'];
        $tweettext = substr($b ["twit_text"],0,10);

        echo
        '<a href = "tweet.php?id='.$id.'" ><div class="main">'. $tweettext.'</div><a>
        <form action="main.php" method = "post"><pre>
        <input type="hidden" name="delate" value="yes please">
        <input type="hidden" name="delID" value="'.$id.'">
        <input type ="submit" value ="DELATE">
        </pre></form>';
        echo '<br>';

    }
} else {
  echo '<a href="login.php"> you must log on  </a>' ;
  echo 'your post table user is'.$_SESSION['user'].'<br>';
}

?>
</div>
</body>
</html>

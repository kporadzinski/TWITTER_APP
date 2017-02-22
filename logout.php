<?php
session_start();

echo "

  <form action='logout.php' method='POST'>
  <input type='hidden' name='logout' value = '1' />
  <input type='submit' value = 'LOGOUT' />
  </form> ";

if (isset($_POST['logout'])) {



  $_SESSION['user'] = NULL ;
  echo 'you have been logout'.'<a href=main.php> GOTO </a>' ;

}



?>

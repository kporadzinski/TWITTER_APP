<html>

<form action="login.php" method="post">
  <input type = "text" name = "email" > EMAIL </input><br>
  <input type = "text" name = "pass" > PASSWORD </input><br>
  <input type = "submit"  > LOG IN </input>
</form>
</html>


<?php

session_start();
$db = 'twitter_app';
require 'conn.php';

if (isset($_POST['email'])) {
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $query = "SELECT * FROM users WHERE email = '$email' " ;

      $result = $conn->query($query);
       if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
          $db_pas = ($row['password']);
          $db_user=($row['user_id']);
        }
        if ($pass === $db_pas ) {
          $_SESSION['user']=$db_user;

          echo ('youre log in') ;
          echo ( '<a href ="main.php"> GOTO </a>');
        }
         else  {
           echo 'wrong password or email doenst exist'  ;
           //tu nastawiamy sesje
        }
      }


else  {
       
       echo 'wrong password or email doenst exist'  ;
    }


}

?>

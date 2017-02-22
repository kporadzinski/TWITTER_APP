<?php
$db = 'twitter_app';
require 'conn.php';

$email = $_POST['email'];
$password = $_POST['password'];

// $query = 'SELECT FROM USERS WHERE usre email = $email'
//
// $result = $conn -> query ($query) ;
// $result .techrow number if not 0 then echo
//
// "email zajęty"

// else

$query = "SELECT * FROM `users` WHERE `email` = '$email' " ;
$result = $conn->query($query);

if ($result->num_rows) {
  echo 'This email is taken, take another one or'.'<a href = login.html> Now you can login! </a>';
}

else {
  $sql = "INSERT INTO `users`(`descr`, `user_id`, `email`, `password`) VALUES ('user','','$email','$password')";
  $result = $conn->query($sql);
  echo 'Your user name '.$email.'  has been created. Dont forget your passord!:D';
  echo '<a href = login.html> Now you can login! </a>' ;
}



 ?>

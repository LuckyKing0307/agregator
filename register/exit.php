<?php 
unset($_COOKIE['user_id']);
unset($_COOKIE['user']);
setcookie('id', '',-1,'/');
setcookie('login', '',-1,'/');
header('Location: login.php');
 ?>
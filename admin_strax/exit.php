<?php 
	unset($_COOKIE['role']);
	unset($_COOKIE['admin']);
	setcookie('role', '',-1,'','/');
	setcookie('admin', '',-1,'','/');
	print_r($_COOKIE);
	header('Location: ../admin/index.php/');
 ?>
<?php 

require('../bd.php');
if (isset($_POST['btn'])) {
	if (isset($_POST['password'])) {
		$role = $_POST['role'];
		$password = $_POST['password'];
		$qu = "UPDATE `user` SET `role`='$role',`password`='$password' WHERE id=".$_POST['id'];
		$data = mysqli_query($bd,$qu);
	}else{
		$role = $_POST['role'];
		$qu = "UPDATE `user` SET `role`='$role' WHERE id=".$_POST['id'];
		$data = mysqli_query($bd,$qu);
		header('Location: control.php');
	}

}

?>
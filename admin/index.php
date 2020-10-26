<?php 
	require('../bd.php');
	if (isset($_POST['btn'])) {
		$login= mysqli_real_escape_string($bd,trim($_POST['login']));
		$password= mysqli_real_escape_string($bd,trim($_POST['pass']));
		if (!empty($login) && !empty($password)) {
			$query = "SELECT * FROM `user` WHERE login = '$login' AND password = '$password'";
			$data = mysqli_query($bd,$query);
			if (mysqli_num_rows($data)==1) {
				$row = mysqli_fetch_assoc($data);
				if ($row['role']==1||$row['role']==2) {
					setcookie('role',$row['role'],time()+(60*60*24*30),'/');
					setcookie('admin',$row['login'],time()+(60*60*24*30),'/');
	                header('Location: km.php');
				}
				else{
					echo "Вы не админ";
				};
			}
			else{
				echo "Проверь свой пороло и логин";
			}
		}
		else{
			echo "Заполните все поля правильно!!!";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="text" name="login" placeholder="login">
		<input type="password" name="pass" placeholder="password">
		<input type="submit" name='btn' value="Войти">
	</form>
</body>
</html>
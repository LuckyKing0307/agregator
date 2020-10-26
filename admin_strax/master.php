<?php 
	require('../bd.php');
    $query = "SELECT * FROM `master_key` WHERE id=1";
    $data = mysqli_query($bd,$query);
    $row = mysqli_fetch_assoc($data);
    if (isset($_POST['btn'])) {
	$kof = $_POST['key'];
    $ubt = "UPDATE master_key SET `master_key` = '$kof' WHERE id = 1";
    $data_ubt = mysqli_query($bd,$ubt);
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	
<style>
 	*{
 		margin: 0;
 		padding: 0;
 		box-sizing: border-box;
 	}
 	body{
 		width: 90%;
 		margin: 0 auto;
 		display: flex;
 		justify-content: space-between;
 	}
 	li{
 		list-style: none;
 	}
 	a{
		text-decoration: none;
		color: #000;
 	}
 	a:hover{
 		color:red;
 	}
 	.list{
		width: 30%;
		border: 1px solid black;
		padding:10px;

 	}
 	.form{
 		width: 69%;
 		text-align: center;
 	}
 	form{
 		width: 100%;
 		display: flex;
 		justify-content: center;
 		-ms-align-items: center;
 		align-items: center;
 	}
</style>
	<div class="list">
		<?php include('../admin_strax/module/menu.php'); ?>
	</div>
	<div class="form">
		<div class="head">
			<h1>Master key Old: <?php echo $row['master_key']; ?></h1>
		</div>
		<form action="master.php" method="POST">
			<input type="number" name="key" minlength="4" maxlength="8" >
			<input type="submit" name="btn">
		</form>
	</div>
</body>
</html>
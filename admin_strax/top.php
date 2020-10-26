<?php 
require('../bd.php');
$qwery = "SELECT * FROM `strax`";
$data = mysqli_query($bd,$qwery);
if (isset($_POST['to_top'])) {
	$top = $_POST['top'];
	$ubt = "UPDATE `strax` SET `top`=0";
	$data_ubt =mysqli_query($bd,$ubt);
	$ubt1 = "UPDATE `strax` SET `top`='1' WHERE id=".$top;
	$data_ubt1 =mysqli_query($bd,$ubt1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body class="container">
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
 	.settings{
 		padding: 20px;
 		width: 68%;
		border: 1px solid black;
 	}

 	.list{
		width: 30%;
		border: 1px solid black;
		padding:10px;

 	}
 	.head{
 		font-size: 26px;
 	}
</style>
	
	<div class="list">
		<?php include('../admin_strax/module/menu.php'); ?>
	</div>
	<form action="top.php" method="post" class="settings">
		<h1>Выберите Рекомендуемою страховую</h1>
		<?php while ($cat = mysqli_fetch_assoc($data)) { 
			if ($cat['top']==1) { ?>
				<label for="k<?php echo $cat['id']?>"><?php echo $cat['name']; ?><input id="k<?php echo $cat['id']?>" type="radio" name="top" checked value="<?php echo $cat['id'] ?>" ></label><br>
		<?php }else{ ?>
				<label for="k<?php echo $cat['id']?>"><?php echo $cat['name']; ?><input id="k<?php echo $cat['id']?>" type="radio" name="top" value="<?php echo $cat['id'] ?>" ></label><br>
		<?php }} ?>
		<input type="submit" name="to_top" value="Изменить">
	</form>
</body>
</html>
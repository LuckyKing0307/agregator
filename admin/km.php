<?php 
	require('../bd.php');
    $query = "SELECT * FROM `kmkoef`";
    $data = mysqli_query($bd,$query);
    if (isset($_POST['btn'])) {

		$kof = $_POST['koef'];
		$id = $_POST['id'];
    $ubt = "UPDATE kmkoef SET KmKoef = '$kof' WHERE id = '$id'";
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
 	.head{
 		font-size: 26px;
 	}
	.table{
		width: 68%;
t	}
	tbody{
		border-radius: 10px;
	}

	th{
		border: 1px solid red !important;
		margin: 0 !important;
	}
	td{
		color: #fff;
		border: 1px solid black !important;
		text-align: center !important;
		padding: 10px !important;
	}
	.qw>td{
		background-color: lightgreen !important;
	}
	.qw1>td{
		background-color: #F23C34 !important;
	}
</style>
	<div class="list">
		<?php include('../admin_strax/module/menu.php'); ?>
	</div>

	<?php if (isset($_GET['sity'])){ 

	    $query1 = "SELECT * FROM `kmkoef` WHERE id=".$_GET['sity'];
	    $data1 = mysqli_query($bd,$query1);
	    $row1 = mysqli_fetch_assoc($data1);
	    echo json_encode($row1);
	?>
		<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="POST">
			<label for="">Город<input type="text" name="test" value="<?php echo $row1['KmName'] ?>" disabled></label>
			<label for="">Коэфицент<input type="text" name="koef" required value="<?php echo $row1['KmKoef'] ?>"></label>
			<input type="text" name="id" hidden value="<?php echo $row1['id'] ?>" >
			<input type="submit" name="btn">
		</form>
	<?php }else{ ?>
		<table class="table">
			<tbody>
				<tr>
					<th>id</th>
					<th>Мощность</th>
					<th>Коэфицент Мощности</th>
					<th>Изменить</th>
				</tr>
		        <?php while ($cat = mysqli_fetch_assoc($data)) { ?>
			      	<tr class="qw">
						<td><?php echo $cat['id']; ?></td>
						<td><?php echo $cat['KmName']; ?></td>
						<td><?php echo $cat['KmKoef']; ?></td>
						<td><a href="km.php?sity=<?php echo $cat['id'];?>">изменить</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
</body>
</html>
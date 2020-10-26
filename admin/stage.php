<?php 
	require('../bd.php');
    $query = "SELECT * FROM `stage`";
    $data = mysqli_query($bd,$query);
    if (isset($_POST['btn'])) {

		$id = $_POST['id'];
		$y1 = $_POST['y1'];
		$y2 = $_POST['y2'];
		$y3 = $_POST['y3'];
		$y4 = $_POST['y4'];
		$y5 = $_POST['y5'];
		$y6 = $_POST['y6'];
		$y7 = $_POST['y7'];
		$y8 = $_POST['y8'];
    $ubt = "UPDATE `stage` SET `0 лет`='$y1',`1 год`='$y2',`2 года`='$y3',`3-4 года`='$y4',`5-6 лет`='$y5',`7-9 лет`='$y6',`10-14 лет`='$y7',`Более 14 лет`='$y8' WHERE id = '$id'";
    $data_ubt = mysqli_query($bd,$ubt);
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body><style>
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

	<?php if (isset($_GET['stage'])){ 

	    $query1 = "SELECT * FROM `stage` WHERE id=".$_GET['stage'];
	    $data1 = mysqli_query($bd,$query1);
	    $row1 = mysqli_fetch_assoc($data1);
	?>
		<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="POST" style="display: flex;flex-direction: column;">
			<label for="">Город<input type="text" name="test" value="<?php echo $row1['year'] ?> лет" disabled></label>
			<label for="">Коэфицент 0 лет <input type="text" name="y1" required value="<?php echo $row1['0 лет'] ?>"></label>
			<label for="">Коэфицент 1 год <input type="text" name="y2" required value="<?php echo $row1['1 год'] ?>"></label>
			<label for="">Коэфицент 2 года <input type="text" name="y3" required value="<?php echo $row1['2 года']?>"></label>
			<label for="">Коэфицент 3-4 года <input type="text" name="y4" required value="<?php echo $row1['3-4 года'] ?>"></label>
			<label for="">Коэфицент 5-6 лет <input type="text" name="y5" required value="<?php echo $row1['5-6 лет'] ?>"></label>
			<label for="">Коэфицент 7-9 лет <input type="text" name="y6" required value="<?php echo $row1['7-9 лет'] ?>"></label>
			<label for="">Коэфицент 10-14 лет <input type="text" name="y7" required value="<?php echo $row1['10-14 лет'] ?>"></label>
			<label for="">Коэфицент более 14 лет <input type="text" name="y8" required value="<?php echo $row1['Более 14 лет'] ?>"></label>
			<input type="text" name="id" hidden value="<?php echo $row1['id'] ?>" >
			<input type="submit" name="btn">
		</form>
	<?php }else{ ?>
		<table class="table">
			<tbody>
				<tr>
					<th>id</th>
					<th>Стаж</th>
					<th>0 лет</th>
					<th>1 год</th>
					<th>2 года</th>
					<th>3-4 года</th>
					<th>5-6 лет</th>
					<th>7-9 лет</th>
					<th>10-14 лет</th>
					<th>Более 14 лет</th>
					<th>Изменить</th>
				</tr>
		        <?php while ($cat = mysqli_fetch_assoc($data)) { ?>
			      	<tr class="qw">
						<td><?php echo $cat['id']; ?></td>
						<td><?php echo $cat['year']; ?> лет</td>
						<td><?php echo $cat['0 лет']; ?></td>
						<td><?php echo $cat['1 год']; ?></td>
						<td><?php echo $cat['2 года']; ?></td>
						<td><?php echo $cat['3-4 года']; ?></td>
						<td><?php echo $cat['5-6 лет']; ?></td>
						<td><?php echo $cat['7-9 лет']; ?></td>
						<td><?php echo $cat['10-14 лет']; ?></td>
						<td><?php echo $cat['Более 14 лет']; ?></td>
						<td><a href="stage.php?stage=<?php echo $cat['id'];?>">изменить</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
</body>
</html>
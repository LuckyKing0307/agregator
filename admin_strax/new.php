<?php 
require('../bd.php');
if (isset($_POST['new'])) {

	$km=',';
	if (isset($_POST['km'])) {
		for ($i=0; $i < count($_POST['km']); $i++) { 
			$km.=$_POST['km'][$i].',';
		}
	}
	$name = $_POST['name'];
	$mult = $_POST['mult'];
	$kom = $_POST['kom'];
	$sity = ','.$_POST['sity'].',';
	$bt[$_POST['sity']] = $_POST['bt'];
	$js = json_encode($bt);
	if ($kom==0) {
		$rkom=$_POST['rkom']/100+1;
		$qwery = "INSERT INTO `strax`(`name`,`reyt`, `sities`, `sity_tb`, `km`, `koef_bt`, `koef_bt_summ`, `bezlimit`,`stage`) VALUES ('$name','5','$sity','$js','$km','$rkom','0','$mult',',11,12,13,14,15,16,17,18,21,22,23,24,25,26,27,28,31,32,33,34,35,36,37,38,41,42,43,44,45,46,47,48,51,52,53,54,55,56,57,58,61,62,63,64,65,66,67,68,71,72,73,74,75,76,77,78,')";
		$data1 = mysqli_query($bd,$qwery);
	}
	else{
		$rkom=$_POST['rkom'];
		$qwery = "INSERT INTO `strax`(`name`, `sities`, `sity_tb`, `km`, `koef_bt`, `koef_bt_summ`, `bezlimit`,`km`,`stage`) VALUES ('$name','$sity','$js','$km','1','$rkom','$mult','$km',',11,12,13,14,15,16,17,18,21,22,23,24,25,26,27,28,31,32,33,34,35,36,37,38,41,42,43,44,45,46,47,48,51,52,53,54,55,56,57,58,61,62,63,64,65,66,67,68,71,72,73,74,75,76,77,78,')";
		$data1 = mysqli_query($bd,$qwery);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body class="container"> <style>
 	*{
 		margin: 0;
 		padding: 0;
 		box-sizing: border-box;
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
 	.container{
 		width: 90%;
 		display: flex;
 		justify-content: space-between;
 		margin: 0 auto;
 	}
 	.list{
		width: 30%;
		border: 1px solid black;
		padding:10px;

 	}
 	.head{
 		font-size: 26px;
 	}
 	.settings{
 		padding: 20px;
 		width: 68%;
		border: 1px solid black;
 	}
 	.nothing{
 		display: block;
 		width: 100%;
 		height: 100%;
 		display: flex;
 		-ms-align-items: center;
 		align-items: center;
 		justify-content: center;
 	}
 	.name{
 		display: flex;
 		justify-content: space-between;
 	}
 	.items{
 		display: flex;
 		-ms-align-items:flex-end;
 		align-items: flex-end;
 	}
 	.name_p{
 		width: 150px;
 		border: 1px solid black;
 		height: 35px;
		overflow: hidden;
		display: flex;
		-ms-align-items: center;
		align-items: center;
		padding-left: 10px;
		margin-top: 10px;
		margin-right: 10px;
 	}
 	.input_sity{
 		height: 35px;
		margin-top: 10px;
 	}
 	.limit{
 		margin-top: 50px;
 		margin-bottom: 10px;
 	}
 </style>
	<div class="list">
		<?php include('../admin_strax/module/menu.php'); ?>
	</div>
	<div class="settings">	
	<form action="new.php" method="POST">
		<label for="">Название<br><input type="text" name="name"></label><br><br>
		<label for="">Будет ли мультидрайв<br>
			<input type="radio" name="mult" value="0" checked>Да<br>
			<input type="radio" name="mult" value="1">Нет
		</label><br><br>
		<label for="">Выберите 1 город: <br>	
			<select name="sity" id="">
				<?php 
					$query = "SELECT * FROM `sity`";
					$data = mysqli_query($bd,$query);
					while ($cat = mysqli_fetch_assoc($data)) { ?>
						<option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
					<?php }	?>
			</select><br><br>
			Базовый тарих для этого города<br>
			<input type="text" name="bt"><br><br>

			Коммисия сервиса<br>
			<input type="radio" name="kom" value="0" checked>В процентах<br>
			<input type="radio" name="kom" value="1">Фикс стоимость<br>
			<input type="text" name="rkom"><br><br>
			<div class="km">
				<?php 
					$qw = "SELECT * FROM `kmkoef`";
					$d = mysqli_query($bd,$qw);
					while ($cat = mysqli_fetch_assoc($d)) {
					 ?>
						<input type="checkbox" name="km[]" value="<?php echo $cat['id']?>" checked><?php echo $cat['KmName']; ?><br>

						<?php }							
				?>
			</div>
		</label>
		<!-- <label for="">Обслуживание людей от 16-21 лет<br>
			<input type="radio" name="1" value="0">Да<br>
			<input type="radio" name="1" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 22-24 лет<br>
			<input type="radio" name="2" value="0">Да<br>
			<input type="radio" name="2" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 25-29 лет<br>
			<input type="radio" name="3" value="0">Да<br>
			<input type="radio" name="3" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 30-34 лет<br>
			<input type="radio" name="4" value="0">Да<br>
			<input type="radio" name="4" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 35-39 лет<br>
			<input type="radio" name="5" value="0">Да<br>
			<input type="radio" name="5" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 40-49 лет<br>
			<input type="radio" name="6" value="0">Да<br>
			<input type="radio" name="6" value="1">Нет
		</label><br><br>
		<label for="">Обслуживание людей от 50 и старше<br>
			<input type="radio" name="7" value="0">Да<br>
			<input type="radio" name="7" value="1">Нет
		</label><br><br> -->
		<input type="submit" name="new">
	</div>
</form>
</body>
</html>
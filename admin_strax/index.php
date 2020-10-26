<?php 
require('../bd.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <style>
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
   table { 
    width: 100%; /* Ширина таблицы */
    border: 4px double black; /* Рамка вокруг таблицы */
    border-collapse: collapse; /* Отображать только одинарные линии */
   }
   th { 
    text-align: left; /* Выравнивание по левому краю */
    background: #ccc; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
 </style>
 <body>
 	<div class="container">
 		<div class="list">
 			<?php include('module/menu.php'); ?>
 		</div>
 		<div class="settings">
 			<?php if (isset($_GET['id'])) {
	 			$qwery_strax = 'SELECT * FROM strax WHERE id='.$_GET['id'];
	 			$data_strax = mysqli_query($bd,$qwery_strax);
	 			$row = mysqli_fetch_assoc($data_strax);
	 			$js = json_decode($row['sity_tb'],true);
	 			
	 		?>
				
				<div class="name">
					<h2><?php echo $row['name'] ?></h2>
				</div>
				<form action="edit.php" action="GET">
					<?php if ($row['pause']==0) { ?>
						<input type="checkbox" name="pause">Пауза
					<?php }else{ ?>
						<input type="checkbox" name="pause" checked>Пауза
					<?php } ?>
				<?php 
					$test_data_ar = explode(',', $row['sities']);
					for ($i=0; $i <count($test_data_ar) ; $i++) { 
						if ($test_data_ar[$i]=="") {
						}else{
							$query1 = "SELECT * FROM `sity` WHERE id=".$test_data_ar[$i];
						    $data1 = mysqli_query($bd,$query1);
						    $row1 = mysqli_fetch_assoc($data1);?>
					<div class="items">
						<p class="name_p"><?php echo $row1['name'] ?></p>
						<div class=""><input type="text" class="input_sity" name="index[<?php echo $row1['id'] ?>]" value="<?php echo $js[$test_data_ar[$i]]?>"></div>
						<input type="text" hidden name="id" value="<?php echo $_GET['id'] ?>">р
					</div>
				<?php		}
					}
		 		?>
					<input type="submit" name="add" value="Настрока"><br><br>
						<h3>Рейтинг</h3>
					<div class="rep">
						<?php for ($i=1; $i <=5 ; $i++) { 
							if ($i==$row['reyt']) { ?>
							<label for=""><?php echo $i ?><input type="radio" name="rep" value="<?php echo $i ?>" checked></label>
							<?php }else{ ?>	
							<label for=""><?php echo $i ?><input type="radio" name="rep" value="<?php echo $i ?>"></label>
							<?php }} ?>
					</div>
					<div class="limit">
						<h3>Страховане мультидрайва</h3>
						<?php if ($row['bezlimit']==1) {
							?>
							<input type="radio" name="limit" value="1" checked="checked">Да<br>
							<input type="radio" name="limit" value="0">Нет<br>
						<?php }else{ ?>
							<input type="radio" name="limit" value="1">Да<br>
							<input type="radio" name="limit" value="0" checked="checked">Нет<br>
						<?php } ?>							
					</div>
					<div class="km">
						<h3>Настройка коэфицента мощности</h3>
						<?php 
							$qw = "SELECT * FROM `kmkoef`";
							$d = mysqli_query($bd,$qw);
							$km = explode(',', $row['km']);
							$k=1;
							while ($cat = mysqli_fetch_assoc($d)) {
								if (array_search($cat['id'], $km)) { ?>
								<input type="checkbox" name="km[]" value="<?php echo $cat['id']?>" checked><?php echo $cat['KmName']; ?><br>
								<?php }else{ ?>
								<input type="checkbox" name="km[]" value="<?php echo $cat['id']?>" ><?php echo $cat['KmName']; ?><br>
	
								<?php }							
							}
						?>
					</div>

					<div class="km">
						<br>
						<h3>Настройка коэфицента Возраст/Стаж</h3>
						<br>
						<table class="table">
							<tbody>
								<tr>
									<th>Годов</th>
									<th>0 лет</th>
									<th>1 год</th>
									<th>2 года</th>
									<th>3-4 года</th>
									<th>5-6 лет</th>
									<th>7-9 лет</th>
									<th>10-14 лет</th>
									<th>Более 14 лет</th>
								</tr>
								<?php
								$st = explode(',', $row['stage']);
								$s=1;
								$ik=0;
								for ($i=1; $i <=7; $i++) {
									$qw1 = "SELECT * FROM `stage` WHERE id=".$i;
									$d1 = mysqli_query($bd,$qw1);
									$row1 = mysqli_fetch_assoc($d1);
								?>
									<tr>
										<td><?php echo $row1['year']; ?> лет</td>

									<?php for ($k=1; $k <= 8; $k++) {
										$ik = $i.''.$k;
										if (array_search($ik, $st)) { ?>
										<td><input type="checkbox" name="stage[]" value="<?php echo ($i.''.$k)?>" checked></td>
									<?php }else{ ?>
									<td><input type="checkbox" name="stage[]" value="<?php echo ($i.''.$k)?>" ></td>
								<?php }} ?>
									</tr>
							<?php } ?>
						
							</tbody>
							
						</table><br>
					</div>
					<div class="koef">
						<h3>Коммисия серфиса</h3>
						<?php if ($row['koef_bt']>1) { ?>
						<input type="radio" name="kom" value="0" checked>В процентах<br>
						<input type="radio" name="kom" value="1">Фикс стоимость<br>
						<label for=""><input type="text" name="koef" required value="<?php echo ($row['koef_bt']-1)*100?>"></label>
						<?php }else{ ?>
						<input type="radio" name="kom" value="0">В процентах<br>
						<input type="radio" name="kom" value="1" checked>Фикс стоимость<br>
						<label for=""><input type="text" name="koef" required value="<?php echo $row['koef_bt_summ']?>"></label>
						<?php } ?>
					</div>
					<div class="koef">
						<h3>Коефицент мощности</h3>
					</div>
		 		<input type="submit" value="Изменить" name="change">
		 		</form>

 			<?php }else{
 				print_r($_COOKIE);
 			?>
 			<div class="nothing">
 				
				<h1 >Выберите Редактируемую Страхавую</h1>

 			</div>
 			<?php } ?>
 		</div>
 	</div>
 </body>
 </html>
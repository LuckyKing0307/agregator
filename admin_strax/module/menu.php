<?php ?>
<ul>
	<?php 
	$link = 	 "http://localhost/osago/";
  // $link = "http://goldpreis.ru/"
		if ($_COOKIE['admin']) {
		}
		else{
			print_r($_COOKIE);
				header('Location: http://localhost/osago/admin/index.php/');
		}
	 ?>			<li class="head"><a href="<?php echo $link ?>admin_strax/exit.php">Выход</a></li>
				<li class="head">Страховая</li>
	 			<?php 
	 				$qwery = 'SELECT * FROM strax';
	 				$data_menu = mysqli_query($bd,$qwery);
	 				while ($cat = mysqli_fetch_assoc($data_menu)) {
	 			?>
	 				<li><a href="<?php echo $link ?>admin_strax/index.php?id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
	 			<?php } ?><br>
					<li class="head">Основная часть страховых</li>
	 				<li><a href="<?php echo $link ?>admin_strax/new.php">Добавить новую страховую</a></li>
	 				<li><a href="<?php echo $link ?>admin_strax/top.php">Изменить рекомендуемою страховую</a></li><br>
					<li class="head">Калькулятор</li>
	 				<li><a href="<?php echo $link ?>admin/km.php">Мощности</a></li>
	 				<li><a href="<?php echo $link ?>admin/sity.php">Регионов</a></li>
	 				<li><a href="<?php echo $link ?>admin/stage.php">Стажа/Возраст</a></li>
	 				<?php if ($_COOKIE['role']==1){ ?>
						<li class="head">Управление ролями</li>
		 				<li><a href="<?php echo $link ?>admin_strax/control.php">Роли</a></li>
						<li class="head">Мастер ключ</li>
		 				<li><a href="<?php echo $link ?>admin_strax/master.php">Ключ</a></li>
						<li class="head">Настройка даты регистрации</li>
		 				<li><a href="<?php echo $link ?>admin_strax/reg.php">Роли</a></li>
	 				<?php } ?>

</ul>
<?php ?>

<?php 	
	$info = json_decode($_GET['info'],true);
?>
<?php require('../bd.php'); 
	$search_agent = "SELECT * FROM `strax`  WHERE id=".$_GET['id'];
	$data1 = mysqli_query($bd,$search_agent);
	$row = mysqli_fetch_assoc($data1);
?>

<?php require('../module/header.php'); ?>
	<section class="head_title" style="margin-top: 40px;">
			<div class=" container">
				<div class="row">
				<div class=" header_wrapper">
					<p class="header_link"><span><a href="user.php" class="breads">Назад к оформлению/</a></span><span onclick="back()" class="breads">Список СК</span>	</p>
				</div>
				<div class="col-md-4 strax_info">
					<div class="strax_title">
						<div class="h3 strax_name"><?php echo $row['name'] ?></div>
						<div class="reyr">
									<?php for ($i=1; $i <=5; $i++) { 
										if ($i<=$row['reyt']) { ?>
											<img src="../img/active_star.svg" alt="" class="star">
										<?php }else{ ?>

											<img src="../img/disabled_star.svg" alt="" class="star">
										<?php }
									} ?>
								</div>
					</div>
					<div class="price">
						<div class="p_price"><?php echo $_GET['price'] ?> ₽</div>
					</div>
				</div>	
				<div class="col-md-1 end_line">
					<div class="end_line_line"></div>
				</div>	
				<div class="col-md-7 user_info">
					<div class="informatiom">
						<p>КБМ: 1</p>
						<p><?php echo $info['surname'].' '.$info['name'].' '.$info['fathername'] ?></p>
					</div>
				</div>		
			</div>
		</div>
	</section>
        <div class="container warrning">
        	<img src="../img/warning.svg" alt="">
        	<p class="warr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor</p>
        </div>
	<form action="">
		<div class="container">
			<div class="head_form">Данные страхователя</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
                    <label for="" class="fio  with_label main">ФИО собственника<input type="text" class="calc_select " placeholder="Фамилия" value="<?php echo $info['surname']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" class="calc_select " placeholder="Имя" value="<?php echo $info['name']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" class="calc_select " placeholder="Очество" value="<?php echo $info['fathername']?>"></label>
                    <label for="" class="fio  with_label main">Дата рождения:<input type="date" class="calc_select " value="<?php echo $info['birthday']; ?>"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Серия паспорта:<input type="text" class="calc_select " style="height: 40px" value="<?php echo	$info['passport'] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" class="calc_select " value="<?php echo $info['passport_date'] ?>"></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" class="calc_select " value="<?php echo $info['passport_place']; ?>"></label>
                  </div>
                </div>
        </div>
		<div class="container">
			<div class="head_form">Данные Собственника</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
                    <label for="" class="fio  with_label main">ФИО собственника<input type="text" class="calc_select " placeholder="Фамилия" value="<?php echo $info['user_surname']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" class="calc_select " placeholder="Имя" value="<?php echo $info['user_name']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" class="calc_select " placeholder="Очество" value="<?php echo $info['user_fathername']?>"></label>
                    <label for="" class="fio  with_label main">Дата рождения:<input type="date" class="calc_select " value="<?php echo $info['user_birthday']; ?>"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Серия паспорта:<input type="text" class="calc_select " style="height: 40px" value="<?php echo	$info['user_passport'] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" class="calc_select " value="<?php echo $info['user_passport_date'] ?>"></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" class="calc_select " value="<?php echo $info['user_passport_place']; ?>"></label>
                  </div>
                </div>
        </div>
		<div class="container">
			<div class="head_form">Автомобиль</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
                    <label for="" class="fio  with_label main">Номер<input type="text" class="calc_select " placeholder="Номер авто" value="<?php echo $info['number']?>"></label>
                    <label  class="fio  with_label main">&nbsp
	                    <select name="sts_type" id="" class="calc_select">
		                    <?php
								if (isset($car['sts_type'])&&$car['sts_type']!=='') {
			                        $sts_row = "SELECT * FROM sts WHERE id=".$info['sts_type'];
			                        $sts_data_row = mysqli_query($bd,$sts_row);
			                        $sts_row = mysqli_fetch_assoc($sts_data_row);
                                
		                    ?>
		                    <option value="<?php echo $sts_row['id']?>"><?php echo $sts_row['name'] ?></option>
		                    <?php } ?>
		                    <?php 
                                if (isset($car['sts_type'])&&$car['sts_type']!=='') {
                                    $sts = "SELECT * FROM sts WHERE id!=".$car['sts_type'];
                                }else{
                                    $sts = "SELECT * FROM sts";
                                }
		                        $sts_data = mysqli_query($bd,$sts);

		                        while ($cat = mysqli_fetch_assoc($sts_data)) { ?>
		                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
		                        <?php } ?>
		                </select>
          			</label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" class="calc_select " placeholder="Очество"  value="<?php echo $info['ctc']; ?>"></label>
                    <label for="" class="fio  with_label main">Дата выдачи:<input type="date" class="calc_select "></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">&nbsp
		                <select name="vin_type" id="" class="calc_select">
		                    <?php
		                    	if (isset($car['vin_type'])&&$car['vin_type']!=='') {
		                        $vin_row = "SELECT * FROM vin WHERE id=".$info['vin_type'];
		                        $vin_data_row = mysqli_query($bd,$vin_row);
		                        $vin_row = mysqli_fetch_assoc($vin_data_row);
		                        echo "string";
	                            
		                    ?>
		                    <option value="<?php echo $vin_row['id']?>"><?php echo $vin_row['name'] ?></option>
		                    <?php } ?>

		                    <?php 
			                     if (isset($car['vin_type'])&&$car['vin_type']!=='') {
	                                $vin = "SELECT * FROM vin WHERE id!=".$car['vin_type'];
	                            }else{
	                                $vin = "SELECT * FROM vin";
		                       	
	                            }
		                        $vin_data = mysqli_query($bd,$vin);
		                        while ($cat = mysqli_fetch_assoc($vin_data)) { ?>
		                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
		                        <?php } ?>
		                </select>
		            </label>
                    <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " value="<?php echo $info['vin'] ?>"></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" class="calc_select " value="<?php echo $info['user_passport_place']; ?>"></label>
                  </div>
                </div>
        </div>
        <div class="container">
        <?php 
        	for ($i=0; $i < 7; $i++) { 
        		if ($info['uname'][$i]!==''&&isset($info['default'])) {
        			if ($info['uname'][$i]==$info['uname'][0]) {?>

	                <div class="chebox">
	                	<h3 class="chebox_title">Водители</h3>
	                	<div class="checker">
		                  <span class="list">Без ограничений</span>
		                    <label for="lim" class="checkbox is_active">
		                      <input type="checkbox" id="lim" hidden>
		                    </label>
		                  <span class="mult">Список водителей</span>
		                </div>
	            	</div>
        			
        			<?php }?>

                <div class="calc_avto sec2_calc_avto sec_calc_6 row m-auto ">
                  <div class="hr">
                    <hr>
                  </div>
                  <input type="text" class="calc_select fio" placeholder="Имя" value="<?php echo $info['uname'][$i] ?>">
                  <input type="text" class="calc_select fio" placeholder="Фамилия" value="<?php echo $info['usurname'][$i] ?>">
                  <input type="text" class="calc_select fio" placeholder="Очество" value="<?php echo $info['ufathername'][$i] ?>">
                  <div class="calc_avto calc_avto6 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" class="calc_select " value="<?php echo $info['data'][$i] ?>"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ:<input type="text" class="calc_select " value="<?php echo $info['uvu'][$i] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" class="calc_select " value="<?php echo $info['stage'][$i] ?>"></label>
                  </div>
                </div>
        <?php }}
  
        ?>
        </div>
        <div class="container"><div class="head_form">Контакты</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
	                <input type="text" class="calc_select fio" placeholder="Почта" value="<?php echo $info['email']?>">
                    <input type="text" class="calc_select fio" placeholder="Номер" value="<?php echo $info['phone']?>">
	                <input type="text" class="calc_select fio" placeholder="Код Подтверждения">
        	</div>
        </div>
        <div class="container"  style="margin-top: 40px;">
        	
        <div class="form_next" style="justify-content: flex-start;">
                    <div class="form_btn back_btn" data-list="2" onclick="back()" style="margin-right: 20px;">Назад</div>
                    <div class="form_btn" data-list="2">Далее ></div>
                </div>
        </div>
	</form>
	<script src="../js/main.js" defer></script>
        <?php require('../module/footer.php'); ?>

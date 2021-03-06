<?php 
	require('bd.php');
	// print_r($_POST);
	$_POST = json_decode($_POST['info'],true);
	$nbday = DateTime::createFromFormat('Y-m-d', $_POST['bday'])->format('d.m.Y');
	$dpass = DateTime::createFromFormat('Y-m-d', $_POST['dpass'])->format('d.m.Y');
	$strax_dpass = DateTime::createFromFormat('Y-m-d', $_POST['strax_dpass'])->format('d.m.Y');
	$strax_bday = DateTime::createFromFormat('Y-m-d', $_POST['strax_bday'])->format('d.m.Y');
	$info = json_decode($_POST['info_res'],true);
	$myDateTime = DateTime::createFromFormat('Y-m-d', $info['reg_date']);
	$newDateString = $myDateTime->format('d.m.Y');
	$old = $myDateTime->modify('-1 day')->modify('+1 year');
	$oldDateString = $old->format('d.m.Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="UTF-8">
<title>Document</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/media1.css">
<body class="body">
<header class="header_menu">
  <div class="nav">
          <div class="container container-my">
            <div class="row">
              <a onclick="back(4)" class="col-md-2 menu_logo">
                <img src="https://goldpreis.ru/img/logo.svg" class="logo" alt="">
              </a>
              <div class="col-md-2 head_btns">
                  <?php if (isset($_COOKIE['login'])) { ?>
                    <img src="https://goldpreis.ru/img/human.svg" alt="">
                  <?php }else{ ?>
                    <img src="https://goldpreis.ru/img/menu.svg" alt="" onclick="Menu()">
                  <?php } ?>
              </div>
              <ul class="nav col-md-4 dn">
                <li class="nav-item">
                  <a class="nav-link nav-link-item" href="https://goldpreis.ru/index.php">Осаго</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-item" href="#">В3Р</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-item" href="#">Каско</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-item" href="#">Дмс</a>
                </li>
              </ul>
                <?php 
                  if (isset($_COOKIE['login'])) {?>
              <div class="offset-md-3 col-md-3 dn" style="display: flex;justify-content: center;">
                  <button class="head-btn menu dn"><a href="https://goldpreis.ru/register/login.php"><?php echo $_COOKIE['login'] ?></a></button>
                <?php } else{ ?>     
              <div class="offset-md-3 col-md-3 justify-content-between menu_wrap dn">
                  <button class="head-btn menu "><a href="register/">Войти</a></button>
                  <button class="head-btn menu "><a href="register/">Регистрация</a></button>
              </div>
                <?php } ?>
            </div>
          </div>
        </div>
</header>
<style>
	.with_label{
		width: 100%;
		color: #333333;
	}
	.with_label>input{
		margin-top: 10px;
		height: 30px;
	}
	.form_next{
		display: flex;
		justify-content: center;
	}
	.accordion,.card,.card-header{
		padding: 0;
	}
	.accordion>.card.detail{
		border-top-right-radius: 20px;
		border-top-left-radius: 20px;
	}
	.photo_pay{
		width: 90%;
	}
	@media(max-width: 600px){
		.reyr{
			padding: 0;
		}
		.price_form{
			color: #4078CD;
			font-size: 26px;
		}
		.hiden{
			font-size: 18px;
			color: #B7B7B7;
		}
		.accordion>.card.detail{
			border-radius: 26px;
		}
		.submit{
			color: #4078CD !important;
			background:none;
			border: 2px solid #4078CD;
			display: flex;
			justify-content: center !important ;
		}
	}
</style>

					
	<section class="head_title">
			<div class=" container">
				<div class="row">
				<div class=" header_wrapper">
					<p class="header_link"><span class="breads" onclick="back(4)">Главная/</span><span class="breads" onclick="back(3)">Список СК/</span><span class="breads" onclick="back(2)">Оформление/</span><span class="breads" onclick="back(1)">Проверка/</span><span class="breads">Оплата</span></p>
				</div>	
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="accordion  m-auto col-md-12" id="accordionExample">
		            <div class="card detail">
		              <div class="card-header" id="headingOne">
		                <div class="mb-0 card_m blue_price">

							<p class="price_item">Страховка <span><?php echo $_POST['agent']; ?></span></p>
							<div class="reyr">
								<?php for ($i=1; $i <=5; $i++) { ?>
										<img src="img/active_star.svg" alt="" class="star">

									<?php
								} ?>
							</div>
							<p class="price_item"><span class="hiden">Покрытие: </span>400 000 ₽</p>
							<p class="price_item price_form"><span class="hiden">Стоимость: </span><?php echo $_POST['price_agent']; ?></p>
							<button class=" btn collapsed submit" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Детали</button>
		                </div>
		              </div>

		              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		           
                <div class="card-body row form_info">
					<div class="offset-md-1 col-md-11 h1">Страховой полис</div>
					<div class="offset-md-1 col-md-5">
						<div class="info_block">
							<p class="info_title">Период страхования</p>
							<p class="info_text">С <?php echo $newDateString; ?> по <?php echo $oldDateString; ?></p>
						</div>
						<div class="info_block">
							<p class="info_title">Собственник</p>
							<p class="info_text"><?php echo $_POST['name'].' '.$_POST['surname'].' '.$_POST['fathername']; ?></p>
							<p class="info_text">Дата рождения: <?php echo $nbday?></p>
							<p class="info_text">Паспорт: <?php echo $_POST['pass']?>, выдан <?php echo $dpass ?></p>
						</div>
						<div class="info_block">
							<p class="info_title">Автомобиль</p>
							<p class="info_text"><?php echo $info['car']; ?> <?php echo $info['carmodel']; ?></p>
							<p class="info_text">VIN: <?php echo $_POST['vin_num'] ?></p>
							<p class="info_text"><?php echo $_POST['number'] ?>, СТС: <?php echo $_POST['sts_num'] ?></p>
							<p class="info_text">Диагностическая карта: <?php echo $_POST['dig_cart'] ?></p>
						</div>
						<div class="info_block">
							<p class="info_title">Допущенные к управлению</p>
							<?php if (isset($info['uname'])): ?>
							<p class="info_text">Список водителей</p>
							<?php else: ?>
							<p class="info_text">Без ограничений</p>
							<?php endif ?>
						</div>
					</div>
					<div class="offset-md-1 col-md-5">
						<div class="h1"></div>
						<div class="info_block">
							<p class="info_title">Страхователь</p>
							<p class="info_text"><?php echo $_POST['strax_name'].' '.$_POST['strax_surname'].' '.$_POST['strax_fathername']; ?></p>
							<p class="info_text">Дата рождения: <?php echo $strax_bday; ?></p>
							<p class="info_text">Паспорт: <?php echo $_POST['strax_pass']?>, выдан <?php echo $strax_dpass; ?></p>
							<p class="info_text">Адрес регистрации: <?php echo $_POST['strax_apass'] ?></p>
						</div>
						<div class="info_block">
							<p class="info_title">Контактные данные</p>
							<p class="info_text"><?php echo $_POST['email']; ?></p>
							<p class="info_text"><?php echo $_POST['phone']; ?></p>
						</div>
				</div>
                </div>
		              </div>
		            </div>
		        </div>
			</div>
			<div class="row payment_method">
				<div class="col-md-8 pay_block">
					<!-- <div class="block">
						<div class="methods">
							<p class="methods_item">Банковская Карта</p>
							<p class="methods_item">Яндекс.деньги</p>
							<p class="methods_item">PayPal</p>
							<p class="methods_item">WebMoney</p>
							<p class="methods_item">Qiwi</p>
							<p class="methods_item">Элекснет</p>
						</div>
						<form action="" class="payment_form">
							<div class="form_block form_block1">
                    			<label for="" class="fio  with_label">Номер карты<input type="text" name="name" required class="calc_select s"></label>
                    			<label for="" class="fio  with_label">Дата и чтото еше<input type="text" name="name" required class="calc_select s"></label>
                    			<label for="" class="fio  with_label">ФИО собственника<input type="text" name="name" required class="calc_select s"></label>
							</div>
							<div class="form_block form_block2">
                    			<label for="" class="fio  with_label">Номер карты<input type="text" name="name" required class="calc_select s"></label>
                    			<label for="" class="fio  with_label">Дата и чтото еше<input type="text" name="name" required class="calc_select s"></label>
                    			<label for="" class="fio  with_label">ФИО собственника<input type="text" name="name" required class="calc_select s"></label>
							</div>
						</form>

		        
					</div>
					<div class="container"  style="margin-top: 40px;">
			        <div class="form_next">
	                    <div class="form_btn back_btn" data-list="2" onclick="back()" style="margin-right: 20px;">Назад</div>
	                    <button class="form_btn" data-list="2">Далее ></button>
	                </div>
		        </div> -->
		        <img src="img/payment.png" alt="" class="photo_pay">
				</div>
			</div>
		</div>
	</section>
	<script>
		function back(time){
			window.history.go(-time);
			console.log(-time)
		}
	</script>
<?php require('module/footer.php'); ?>
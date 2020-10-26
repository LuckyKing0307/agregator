	<?php 	
	$info = json_decode($_GET['info'],true);
?>
<?php require('bd.php'); 
	$search_agent = "SELECT * FROM `strax`  WHERE id=".$_GET['id'];
	$data1 = mysqli_query($bd,$search_agent);
	$row = mysqli_fetch_assoc($data1);
	$sity = $info['sity'];
	$car_type = $info['car_type'];
    $query_sity = "SELECT * FROM `sity` WHERE id=".$sity;
    $data_sity = mysqli_query($bd,$query_sity);
    $row_sity = mysqli_fetch_assoc($data_sity)
?>

<?php require('module/header.php'); ?>
<style>
	.w80{
		width: 100%;
	}	
	.pricep{
		width: 20px;
		height: 48px;
		border-radius: 16px;
		border: none;
		padding: 10px;
	}
	.calc_select{
		margin-top: 5px;
	}
	.head_form1{
		display: flex;
		justify-content: flex-start;
		-ms-align-items: center;
		align-items: center;
	}
	.strah_user{
		margin-left: 100px;
		display: flex;
		-ms-align-items: center;
		align-items: center;
		font-size: 14px;
		font-weight: 400;
		-moz-user-select: none;
		-khtml-user-select: none;
		user-select: none; 
	}
	.strah_user:hover{
		cursor: pointer;
	}
	.strah_user>input{
		margin-right: 10px;
		width: 16px;
		height: 16px;
	}
	.checker_number{
		margin-top: 5px;
		width: 40px;
		display: flex;
		justify-content: center;
		-ms-align-items: center;
		align-items: center;
	}
	.checker_number>img{
		width: 100%;
	}
	.head_title{
		margin-top: 50px;
	}
	.detail{
		margin-top: 40px;
		border: 1px solid black;
		background-color: #fff;
	}
	.kbm{
		font-size: 22px;
		font-weight:700;
	}
	@media(max-width:650px){
		.chebox{
			flex-direction: column;
		}
		.head_form{
			align-items: flex-start;
			width: 100%;
		}
		.strah_user{
			width: 100%;
			margin-left: 0;
			font-size: 12px;
		}
		.detail{
			padding: 15px!important;
		}
		.reyr{
			padding: 0;
		}
		.calc_avto{
			width: 100%;
		}
		.fio{
			width: 100% !important;
		}
	}
</style>
	<section class="head_title">
			<div class=" container">
				<div class="row">
				<div class=" header_wrapper">
					<p class="header_link"><span><a href="index.php" class="breads">Назад к оформлению/</a></span><span onclick="back()" class="breads">Список СК</span></p>
				</div>
				<div class="col-md-12">
					<div class="warrning">
			        	<img src="img/warning.svg" alt="">
			        	<p class="warr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor</p>
			        </div>
				</div>	
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
					<div class="detail" style="padding:25px;">
						<div class="detail_item">
						<div class="h3 strax_name"><?php echo $row['name'] ?></div>
						</div>
						<hr>
						<div class="detail_item">
							<div class="reyr">
								<?php for ($i=1; $i <=5; $i++) { 
									if ($i<=$row['reyt']) { ?>
										<img src="img/active_star.svg" alt="" class="star">
									<?php }else{ ?>

										<img src="img/disabled_star.svg" alt="" class="star">
									<?php }
								} ?>
							</div>
						</div>
						<hr>
						<div class="detail_item">
							<div class="p_price">
								<?php echo (number_format($_GET['price'],2, ',', ' ').' p.');?>
							</div>
						</div>
							<?php if ($info['surname']!=''): ?>
							<hr>
							<div class="detail_item">
								<div class="informatiom">
									<p class="kbm">КБМ: 1</p>
									<p class="detail_text"><?php echo strtoupper($info['surname'].' '. mb_substr($info['name'],0,1,'UTF-8').'.'.mb_substr($info['fathername'],0,1,'UTF-8').'.') ?></p>
								</div>
							</div>
							<?php endif ?>
						<!-- <hr>
						<div class="detail_item">
							<div class="p_price">
								<p class="kbm">Автомобиль</p>
								<p class="detail_text"><?php echo $info['car'].' '.$info['carmodel'];?></p>
							</div>
						</div> -->
					</div>
			</div>
			<div class="col-md-9">
		<form action="payment.php" method="POST">
		<div class="container">
			<div class="head_form head_form1">Данные Собственника
				<label for="strah_user" class="strah_user"><input type="checkbox" id="strah_user"> ЯВЛЯЕТСЯ СТРАХОВАТЕЛЕМ</label>
			</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
                    <label for="" class="fio  with_label main">ФИО собственника<input type="text" name="name" required class="calc_select s" placeholder="Фамилия" value="<?php echo $info['surname']?>" ></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="surname" class="calc_select n" placeholder="Имя" value="<?php echo $info['name']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="fathername" class="calc_select f" placeholder="Очество" value="<?php echo $info['fathername']?>"></label>
                    <label for="" class="fio  with_label main">Дата рождения:<input type="date" required name="bday" class="calc_select b" value="<?php echo $info['birthday']; ?>"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Серия паспорта:<input type="text" required name="pass" class="calc_select sp"  value="<?php echo	$info['passport'] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" required name="dpass" class="calc_select dp" value="<?php echo $info['passport_date']?>"></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" required name="apass" class="calc_select ap" value="<?php echo $row_sity['name']?>"></label>
                  </div>
                </div>
        </div>
		<div class="container">
			<div class="head_form">Данные страхователя</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
			<?php if (isset($info['user_surname'])){ ?>
                    <label for="" class="fio  with_label main">ФИО собственника<input type="text" required name="strax_name" class="calc_select s1" placeholder="Фамилия" value="<?php echo $info['user_surname']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="strax_surname" class="calc_select n1" placeholder="Имя" value="<?php echo $info['user_name']?>"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="strax_fathername" class="calc_select f1" placeholder="Очество" value="<?php echo $info['user_fathername']?>"></label>
                    <label for="" class="fio  with_label main">Дата рождения:<input type="date" required name="strax_bday" class="calc_select b1" value="<?php echo $info['user_birthday']; ?>"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Серия паспорта:<input type="text" required name="strax_pass" class="calc_select sp1"  value="<?php echo	$info['user_passport'] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" name="strax_dpass" class="calc_select dp1" ></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" required name="strax_apass" class="calc_select ap1"></label>
                  </div>
			<?php }else{?>
                    <label for="" class="fio  with_label main">ФИО собственника<input type="text" required name="strax_name" class="calc_select s1" placeholder="Фамилия" ></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="strax_surname" class="calc_select n1" placeholder="Имя"></label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" required name="strax_fathername" class="calc_select f1" placeholder="Очество"></label>
                    <label for="" class="fio  with_label main">Дата рождения:<input type="date" required name="strax_bday" class="calc_select b1"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Серия паспорта:<input type="text" required name="strax_pass" class="calc_select sp1" ></label>
                    <label for="" class="fio with_label">Дата выдачи паспорта:<input type="date" required name="strax_dpass" class="calc_select dp1" ></label>
                    <label for="" class="fio with_label">Адрес регистрации<input type="text" required name="strax_apass" class="calc_select ap1"></label>
                  </div>
			<?php } ?>
           </div>
        </div>
		<div class="container">
			<div class="head_form">Автомобиль</div>
			<div class="calc_avto sec2_calc_avto row m-auto">

                    <label for="" class="fio  with_label ">Марка<input type="text" name="mark" class="calc_select " placeholder="Номер авто" value="<?php echo $info['car']?>" disabled></label>
                    <label for="" class="fio  with_label ">Модель<input type="text" name="model" class="calc_select " placeholder="Номер авто" value="<?php echo $info['carmodel']?>" disabled></label>
                    <label for="" class="fio  with_label ">Год выпуска:<input type="text" name="year" class="calc_select " value="2020" disabled></label>
                  
                    <label for="" class="fio  with_label main">Номер<input type="text" required name="number" class="calc_select " placeholder="Номер авто" value="<?php echo $info['number']?>"></label>
                    
                    <label  class="fio  with_label main">&nbsp
	                    <select name="sts_type" id="" class="calc_select" name="sts">
		                    <?php 
		                        $sts = "SELECT * FROM sts";
		                        $sts_data = mysqli_query($bd,$sts);
		                        while ($cat = mysqli_fetch_assoc($sts_data)) { ?>
		                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
		                        <?php } ?>
		                </select>
          			</label>
	                <label for="" class="fio  with_label main">&nbsp<input type="text" name="sts_num" class="calc_select "></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio  with_label main">Дата выдачи:<input type="date" class="calc_select "></label>
                    <label for="" class="fio with_label main">&nbsp
		                <select name="vin_type" id="" class="calc_select" name="vin">
		                    
		                    <?php 
		                        $vin = "SELECT * FROM vin ";
		                        $vin_data = mysqli_query($bd,$vin);
		                        while ($cat = mysqli_fetch_assoc($vin_data)) { ?>
		                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
		                        <?php } ?>
		                </select>
		            </label>
                    <label for="" class="fio with_label main">&nbsp<input type="text" name="vin_num" class="calc_select "></label>
                    <label for="" class="fio with_label main">Диагностическая карта<input type="text" class="calc_select "></label>
                  </div>
                  <div class="calc_avto n_1" style="justify-content: flex-start; ">
                    <label for="" class="fio with_label">Цель использования<input type="text" class="calc_select " placeholder="личная" disabled></label>
                    <label for="" class="fio " style="display: flex; align-items: center;
                    justify-content: space-between; width: 100px; margin-left: 30px;">Прицеп<input type="checkbox" class="pricep" placeholder="личная" disabled></label>
				  </div>
                </div>
        </div>
        <div class="container">
        	<?php if (isset($info['uname'])&&count($info['uname'])>0) { ?>
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
        <?php for ($i=0; $i < count($info['uname']); $i++) {?>

	                
        			

                <div class="calc_avto sec2_calc_avto sec_calc_6 row m-auto ">
                  <div class="hr">
                    <hr>
                  </div>
                  <input type="text" class="calc_select fio" name="uname[]" placeholder="Имя" value="<?php echo $info['uname'][$i] ?>">
                  <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия" value="<?php echo $info['usurname'][$i] ?>">
                  <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество" value="<?php echo $info['ufathername'][$i] ?>">
                  <div class="calc_avto calc_avto6 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="ubday[]" class="calc_select " value="<?php echo $info['data'][$i] ?>"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ:<input type="text" name="useriya[]" class="calc_select " value="<?php echo $info['uvu'][$i] ?>"></label>
                    <label for="" class="fio with_label">Дата выдачи ВУ:<input type="date" name="udseriya[]" class="calc_select " value="<?php echo $info['stage'][$i] ?>"></label>
                  </div>
                </div>
        <?php }}?>
        </div>
        <div class="container"><div class="head_form">Контакты</div>
			<div class="calc_avto sec2_calc_avto row m-auto">
	                <input type="text" class="calc_select fio" placeholder="Почта" name="email" style="width: 28%;">
                    <input type="text" class="calc_select fio phone" placeholder="Номер" name="number" style="width: 28%;">
                    <div class="checker_number" data-check="send" onclick="Mass()">
                    	<img src="img/check_number.svg" alt="">
                    </div>
	                <input type="text" class="calc_select fio checker1" placeholder="Код Подтверждения" style="width: 28%;">
                    <div class="checker_number cansel" data-check="send" onclick="Check(this)">
                    	<img src="img/success_blue.svg" alt="">
                    </div>
        	</div>
        </div>
        <div class="container"  style="margin-top: 40px;">
        	
        <div class="form_next" style="justify-content: flex-start;">
                    <div class="form_btn back_btn" data-list="2" onclick="back()" style="margin-right: 20px;">Назад</div>
                    <button class="form_btn" data-list="2">Далее ></button>
                </div>
        </div>
	</form>
			</div>
		</div>
	</div>
	<script>

		document.querySelector('.strah_user').addEventListener('click',()=>{
		const strah_user = document.querySelector('#strah_user');
		let n = document.querySelector('.n').value;
		let s = document.querySelector('.s').value;
		let f = document.querySelector('.f').value;
		let b = document.querySelector('.b').value;
		let n1 = document.querySelector('.n1');
		let s1 = document.querySelector('.s1');
		let f1 = document.querySelector('.f1');
		let b1 = document.querySelector('.b1');
		let sp = document.querySelector('.sp').value;
		let ap = document.querySelector('.ap').value;
		let dp = document.querySelector('.dp').value;
		let sp1 = document.querySelector('.sp1');
		let ap1 = document.querySelector('.ap1');
		let dp1 = document.querySelector('.dp1');
			if (strah_user.checked) {
				n1.value = n;
				s1.value = s;
				f1.value = f;
				b1.value = b;
				sp1.value = sp;
				ap1.value = ap;
				dp1.value = dp;
			}else{
				n1.value = '';
				s1.value = '';
				f1.value = '';
				b1.value = '';
				sp1.value = '';
				ap1.value = '';
				dp1.value = '';
			}
		});

		let code;
		phone = document.querySelector('.phone');
		function Mass(item){	
			phone.setAttribute('disabled', 'disabled');	
			let phone_num = phone.value.replace('+','');
			const xhttp =  new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState==4 && this.status==200) {
					if (JSON.parse(this.responseText)['status']=='OK') {
						code = JSON.parse(this.responseText)['code'];
						console.log(code)
					}else{

					}
				}else{
				}
			}
			xhttp.open('GET', 'req/register_phone.php?ph='+phone_num, true);
			xhttp.send();

		}
		function Check(item){
			console.log(code);
			const checker1 = document.querySelector('.checker1');
			if (checker1.value==code) {
				checker1.setAttribute('disabled', 'disabled');
				item.innerHTML = '<img src="img/success_check.svg" class="checker_img" alt="">';
			}else{
				item.innerHTML = '<img src="img/cancel.svg" class="checker_img" alt="">';
			}
		}
	</script>
<?php require('module/footer.php'); ?>

<?php 
	require('../bd.php');
	if (isset($_POST['reg'])) {
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$phone = $_POST['phone'];
		$search = "SELECT * FROM `user` WHERE login = '$login'";
		$data_search = mysqli_query($bd,$search);
		if (isset($_POST['agent'])) {
			$a = 1;
		}else{
			$a = 0;
		}
		$car = '{"car_number":"","car":"","carmodel":"","year":"","car_type":"","vin":"","ctc":"","vin_type":"1","sts_type":"1"}';
		$user = '{"surname":null,"name":null,"fathername":null,"passport":null,"passport_date":null,"passport_place":null,"vu":null,"date_vu":null,"register":null,"check_img":0,"agent_check":'.$a.',"default":0}';

		if (mysqli_num_rows($data_search)) {
			echo "ТАКОЙ АККАУН ЕСТЬ";
		}else{
			$query = "INSERT INTO `user`(`login`, `password`, `role`, `phone`,`car`) VALUES ('$login','$pass','4','$phone','$car')";
			$data = mysqli_query($bd,$query);
			setcookie('login',$login,time()+(60*60*24*30),'/');
            header('Location: ../index.php');
		};
	}
?>
<?php require('../module/header.php'); ?>
	<style>
		.calc_avto{
			flex-direction: column;
		}
		.with_label {
			width: 100%;
		}
		.fio{
			margin-top: 0;
			position: relative;
		}
		.calc_select{
			height: 48px;
		}
		.product_list{
			margin-top: 0;
		}
		.w50{
			width: 50%;	
		}
		.buttons{
			width: 100%;
		}
		.rect,.text{
			width: 90%;
			margin: 0 auto;
		}
		.rect>img{
			width: 100%;
		}
		.text{
			font-weight: 300;
			font-size: 18px;
			line-height: 32px;
			/* or 178% */


			color: #B7B7B7;
		}
		.forget{
			margin-top: 20px;
			width: 100%;
			display: flex;
			justify-content: space-between;
		}
		.code{
			display: none;
			position: absolute;
			bottom: -50%;
			z-index: 10;
			justify-content: center;
			align-items: center;
			width: 50%;
			height: 30px;
			border-radius: 20px;
			background: #FFFFFF;
			box-shadow: 0px 0px 24px rgba(5, 53, 81, 0.11);
			border-radius: 24px;
			font-size: 12px;
			line-height: 16px;
			color: #4078CD;
		}
		.code1{
			top: -25%;
		}
		.code1>img{
			margin-right: 10px;
		}
		.code:hover{
			cursor: pointer;
		}
		.none{
			display: none;
		}
		@media(max-width:600px){
			form{
				width: 90%;
				margin: 0 auto;
			}
			.agent_button{
				height: 48px;
				padding: 0 10px 0 0;
			}
			.checker1{
				padding-right: 0 !important;
			}
			.forget{
				flex-direction: column;
				justify-content: center;
			}
			.forget_text{
				text-align: center;
			}
			.strax_list{
				margin-top: 40px;
			}
		}
	</style>
	<section class="head_title">
			<div class=" container">
				<div class="row">
				<div class=" header_wrapper">
					<div class="h1 header_h1">Регистрация</div>
				</div>

				<div class=" header_wrapper">
					<p class=" header_link" onclick="back()"><span class="breads">Назад к оформлению</span></p>
				</div>
			</div>
		</div>
	</section>
	<section class="product_list">
		<div class="container">
			<div class="row">
				<div class="col-md-4 detail_wrapper">
					
				<form action="index.php" method="post">
	                <div class="calc_avto sec2_calc_avto row m-auto owner">
	                    <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " name="login" placeholder="Email"></label>
	                  <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " name="pass" placeholder="Пороль"></label>
	                  <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " name="pass" placeholder="Повторите пороль"></label>
	                  <div class="calc_avto n_1">
	                    <label for="" class="fio with_label ">&nbsp<span class="code code1"><img src="../img/galc.png" class="checker_img" alt="">Код отправлен</span><input type="text" name="phone" class="calc_select w50 phone" placeholder="Телефон" autocomplete="off">
	                    	<span class="code code2" onclick="Mass(this)">Отправть код</span></label>
	                    
		                <label for="agent" class="fio with_label">&nbsp<span class=""  style="display: flex;"><input type="text" class="checker1 calc_select" name="agent_key" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" placeholder="Код"><button class="agent_button" onclick="Check(this)" type="button">Подтвердить</button></span></label>


	                    <label for="agent" class="fio with_label" style="margin-top: 20px;"><span class="aic"  onclick="Agent()" style="margin-top: -10px;"><span class="check jcc aic" ><img src="../img/galc.png" class="checker_img checker_img1 none" alt=""></span><span>Я агент</span></span></label>
	                    <input type="checkbox" id="agent" name="agent" hidden>
	                  </div>
	                  <div class="clear">
	                    <div class="clear_btn_1 red clear_all" data-clear="1">
	                      <img src="img/clear.svg" alt="">
	                    </div>
	                  </div>
	                </div>
	                <input type="submit" name="reg" class="form_btn buttons" disabled>
	                <div class="forget">
	                	<p class="forget_text">Уже зарегестрированы? <a href="" class="">Войти</a></p>
	                	<a href="" class="forget_text">Забыли пароль</a>
	                </div>
				</form>
				</div>
				<div class="col-md-8 strax_list">
					<div class="rect">
							<img src="../img/Regist.png" alt="">
					</div>
					<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		let code;
		phone = document.querySelector('.phone');
		phone.addEventListener('keyup',(e)=>{
			if (e.target.value.length>=10) {
				document.querySelector('.code2').style.display = 'flex';
			}else{
				document.querySelector('.code2').style.display = 'none';
			}
		})
		function Agent(){
			let checker_img = document.querySelector('.checker_img1');
			checker_img.classList.toggle('none');
		}
		function Mass(item){		
			item.style.display = 'none';
			const code1 = document.querySelector('.code1');
			code1.style.display = 'flex';
			let phone_num = phone.value.replace('+','');
			setTimeout(function() {
				code1.style.display = 'none';
			}, 1000);
			const xhttp =  new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState==4 && this.status==200) {
					if (JSON.parse(this.responseText)['status']=='OK') {
						code = JSON.parse(this.responseText)['code'];
					}else{

					}
				}else{
				}
			}
			xhttp.open('GET', '../req/register_phone.php?ph='+phone_num, true);
			xhttp.send();

		}
		function Check(item){
			console.log(code);
			const checker1 = document.querySelector('.checker1');
			if (checker1.value==code) {
				document.querySelector('.buttons').removeAttribute('disabled');
				item.innerHTML = '<img src="../img/galc.png" class="checker_img" alt="">';
				item.style.background = '#FFF';
				item.style.borderBottom  = '1px solid #4078CD';
				item.style.borderBottomRightRadius  = '0';
				checker1.style.background = '#FFF';
				checker1.style.borderBottom  = '1px solid #4078CD';
				checker1.style.borderBottomLeftRadius  = '0';

			}else{
				document.querySelector('.buttons').setAttribute('disabled','disabled');
				item.innerHTML = '<img src="../img/error.svg" class="checker_img" alt="">';
				item.style.background = '#FFF7F7';
				item.style.borderBottom  = '1px solid #FF0000';
				item.style.borderBottomRightRadius  = '0';
				checker1.style.background = '#FFF7F7';
				checker1.style.borderBottom  = '1px solid #FF0000';
				checker1.style.borderBottomLeftRadius  = '0';
			}
		}
	</script>
		<!-- <h1>Регистрация</h1>
		<input type="text" name="login" placeholder="Логин" required>
		<input type="password" name="pass" placeholder="Пароль" required>
		<input type="text" name="phone" placeholder="Телефон" required>
		<input type="submit" name="reg" value="Зарегистрироваться"> -->
<?php require('../module/footer.php'); ?>

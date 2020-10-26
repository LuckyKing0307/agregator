<?php 
	require('bd.php');
	require('module/header.php');
?>
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
					<p class="header_link"><span><a href="index.php" class="breads">Назад к оформлению/</a></span><span onclick="back()" class="breads">Список СК</span></p>
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

							<p class="price_item">Страховка <span>Имя чьето</span></p>
							<div class="reyr">
								<?php for ($i=1; $i <=5; $i++) { ?>
										<img src="img/active_star.svg" alt="" class="star">

									<?php
								} ?>
							</div>
							<p class="price_item"><span class="hiden">Покрытие: </span>400 000 ₽</p>
							<p class="price_item price_form"><span class="hiden">Стоимость: </span>25 000 ₽</p>
							<button class=" btn collapsed submit" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Детали</button>
		                </div>
		              </div>

		              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		                <div class="card-body row form_info">
							<div class="offset-md-1 col-md-11 h1">Страховой полис</div>
							<div class="offset-md-1 col-md-5">
								<div class="info_block">
									<p class="info_title">Период страхования</p>
									<p class="info_text">С 10.02.2020 по 09.02.2020</p>
								</div>
								<div class="info_block">
									<p class="info_title">Собственник</p>
									<p class="info_text">Иванов Петр Сидорович</p>
									<p class="info_text">Дата рождения: 10.10.1990</p>
									<p class="info_text">Паспорт: 5435 646565, выдан 24.07.2010</p>
								</div>
								<div class="info_block">
									<p class="info_title">Автомобиль</p>
									<p class="info_text">KIA Optima, 2020 г. 184 л.с.</p>
									<p class="info_text">VIN: WP0ZZZ97ZJL160252</p>
									<p class="info_text">А 111 АА 111, СТС: 9913888514</p>
									<p class="info_text">Диагностическая карта: 123456789012345678901</p>
								</div>
								<div class="info_block">
									<p class="info_title">Допущенные к управлению</p>
									<p class="info_text">Без ограничений</p>
								</div>
							</div>
							<div class="offset-md-1 col-md-5">
								<div class="h1"></div>
								<div class="info_block">
									<p class="info_title">Страхователь</p>
									<p class="info_text">Иванов Петр Сидорович</p>
									<p class="info_text">Дата рождения: 10.10.1990</p>
									<p class="info_text">Паспорт: 5435 646565, выдан 24.07.2010</p>
									<p class="info_text">Адрес регистрации: Свердловская обл, г Верхняя Пышка, ул Бажова, д 2, кв. 65</p>
								</div>
								<div class="info_block">
									<p class="info_title">Контактные данные</p>
									<p class="info_text">usermail@mail.com</p>
									<p class="info_text">+7 (666) 777-77-77</p>
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
<?php require('module/footer.php'); ?>
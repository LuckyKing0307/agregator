<?php require('../module/header.php'); 
require('../bd.php');
    $query = "SELECT * FROM `sity`";
    $data = mysqli_query($bd,$query);
    $query1 = "SELECT * FROM `kmkoef`";
    $data1 = mysqli_query($bd,$query1);
    $query2 = "SELECT * FROM `stage`";
    $data2 = mysqli_query($bd,$query2);
?>
<style>
	@media (max-width: 600px){
		.calc_avto {
		    width: 100%;
		}
}
</style>
<section class="head_title">
            <div class=" container">
                <div class="row">
                <div class=" header_wrapper">
					<p class=" header_link" onclick="back()">< Назад</p>
                </div>
            </div>
        </div>
</section>
<section class="form_agent">
	<div class="container">
		<form action="../result.php" method="post">
			<div class="row" style="justify-content: space-between;">
                <div class="col-md-6 number_inp">
                  <input class="col-md-5 count_input count_input1 number_inp_n" name="number" type="text" placeholder="A 666 AA" >
                  <!-- <div class="rus number_inp_rus">
                  <input class="count_input rus_inp number_inp_rus" type="text"  placeholder="666" >
                  <div class="rus_flag number_inp_rus" >
                    <div class="center_flag">
                      <p class="rus_text">RUS</p>
                      <img class="rus_img" src="../img/russia.svg" alt="">
                    </div>
                  </div>
                  </div> -->
                </div>
				<div class="col-md-2 clear_inp">
					<img src="../img/rest.svg" alt="">
					<p class="rest_text">Очистить поля</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 cars">
					<div class="car_types">
						<p class="car_types_text"><span class="check jcc aic"><img src="../img/galc.png" width="14" class="checker_img" alt=""></span>Цель использования - Личная</p>
					</div>
					<div class="car_types">
						<p class="car_types_text"><span class="check jcc aic"><img src="../img/galc.png" width="14" alt=""></span>Авто категории В без прицепа</p>
					</div>
				</div>	
			</div>
			<div class="row" style="margin-top: 32px;">
				<div class="col-md-5">
					<div class="car_selects">
						<select name="car" class="select_car w70" id="">
							<option value="Каптива">Каптива</option>
						</select>
						<select name="year" class="select_car w20" id="">
							<option value="2020">2020г</option>
						</select>
					</div>
					<div class="car_selects">
						<select name="carmodel" class="select_car w70" id="">
							<option value="xs">xs</option>
						</select>
						<select name="car_type" class="select_car w20" id="">
							<?php while ($cat = mysqli_fetch_assoc($data1)) {
			                  ?>
								<option value="<?php echo $cat['id'] ?>"><?php echo $cat['KmName']; ?></option>
			                 <?php
		                    } ?>
						</select>
					</div>
					<div class="car_selects"></div>
				</div>	
				<div class="col-md-6 offset-md-1 user_sity">
					<select name="sity" class="sity_select w80" id="">
						<?php while ($cat = mysqli_fetch_assoc($data)) {
	                    ?>
							<option value="<?php echo $cat['id'] ?>"><?php echo $cat['name']; ?></option>
	                 	<?php
	                    } ?>
					</select>
					<label for="data" class="">Срок страхования от: <input type="date" id="date" required name="registred_date" class="calc_select date_car"><span id="date_dis"></span></label>
				</div>
			</div>
			<div class="row car_users">
				<div class="col-md-12 user_car_inform">
					<div class="user_car_head">
						Собственник
						<label for="me" class="lab  aic jcc" onclick="myFunction()">
								<span class="check aic jcc">
                                	<img src="../img/galc.png" class="check_img" alt="">
                                </span>Я Cтрахователь
                        </label>
                    </div>
                    <div class="calc_avto sec2_calc_avto row m-auto">
	                      <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="name" placeholder="Имя"></label>
		                  <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="surname" placeholder="Фамилия"></label>
		                  <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="fathername" placeholder="Очество"></label>
		                <div class="calc_avto n_1">
	                      <label for="" class="fio with_label"><input type="date" class="calc_select calc_select_white" name="birthday"></label>
	                      <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="passport" placeholder="Серия паспорта"></label>
	                      <label for="" class="fio with_label"><input type="date" class="calc_select calc_select_white" name="stage_date"></label>
                  		</div>
                	</div>
				</div>
				<div class="col-md-12 user_car_inform">
					<div class="user_car_head">
						Собственник
                    </div>
                    <div class="calc_avto sec2_calc_avto row m-auto">
	                      <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="user_name" placeholder="Имя"></label>
		                  <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="user_surname" placeholder="Фамилия"></label>
		                  <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="user_fathername" placeholder="Очество"></label>
		                <div class="calc_avto n_1">
	                      <label for="" class="fio with_label"><input type="date" class="calc_select calc_select_white" name="user_birthday"></label>
	                      <label for="" class="fio with_label"><input type="text" class="calc_select calc_select_white" name="user_passport" placeholder="Серия паспорта"></label>
	                      <label for="" class="fio with_label"><input type="date" class="calc_select calc_select_white" name="user_stage_date"></label>
                  		</div>
                	</div>
				</div>
               
			</div>	<div class="row">
               		<div class="col-md-12"> 
               			<div class="active_users"  style="display: block;">
			                <div class="calc_avto sec2_calc_avto sec_calc_1 row m-auto  active ">
			                  <div class="hr">
			                    <hr>
			                  </div>
			                  <input type="text" class="calc_select fio" name="uname[]" placeholder="Имя">
			                  <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
			                  <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
			                  <div class="calc_avto calc_avto1 w80">
			                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select "></label>
			                    <label for="" class="fio with_label">Серия ВУ:<input type="text" name="uvu[]" class="calc_select "></label>
			                    <label for="" class="fio with_label">Дата выдачи Ву:<input type="date" name="stage[]" class="calc_select "></label>
			                  </div>
			                  <div class="clear_0 clear_1">
			                    <!-- <div class="clear_btn_1  red" data-clear="1">
			                      <img src="img/min.svg" alt="" data-clear="1">
			                    </div> -->
			                    
			                    <div class="clear_btn_1 blue blue1" data-clear="1" style="display: flex;">
			                      <img src="../img/plus.svg" class="o blue"  alt="" data-clear="1">
			                    </div>
			                  </div>
			                  
			                </div>
							<?php for ($i=2; $i <=7 ; $i++) { ?>
			                <div class="calc_avto sec2_calc_avto sec_calc_<?php echo $i?> row m-auto blocked">
			                  <div class="hr">
			                    <hr>
			                  </div>
			                  <input type="text" class="calc_select fio" name="uname[]" placeholder="Имя">
			                  <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
			                  <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
			                  <div class="calc_avto calc_avto<?php echo $i?> w80">
			                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select "></label>
			                    <label for="" class="fio with_label">Серия Ву:<input type="text" class="calc_select "></label>
			                    <label for="" class="fio with_label">Дата выдачи ВУ:<input type="date" name="stage[]" class="calc_select "></label>
			                  </div>
			                  <div class="clear_0 clear_<?php echo $i?>">
			                    <div class="clear_btn_1 red red<?php echo $i?>" data-clear="<?php echo $i?>">
			                      <img src="../img/min.svg" class="o red red_img" alt="" data-clear="<?php echo $i?>">
			                    </div>
			                    <div class="clear_btn_1 blue blue<?php echo $i?>" data-clear="<?php echo $i?>">
			                      <img src="../img/plus.svg" class="o blue" alt="" data-clear="<?php echo $i?>">
			                    </div>
			                  </div>
			                </div>
							<?php } ?>
			            </div>
			        </div>
               	</div>
               	<input type="checkbox" name="default" checked hidden>
               	<input type="submit" class="btn1" style="margin-top: 20px;">
		</form>
	</div>
</section>
<script src="../js/user.js" defer></script>
<script src="../js/main.js" defer></script>
<?php require('../module/footer.php'); ?>
<script>
	const date = document.querySelector('#date');
	const date_dis = document.querySelector('#date_dis');
	date.addEventListener('change',(e)=>{
			let splite= date;
			splite=splite.value.split('-');
			splite[0]=parseInt(splite[0])+1;
			splite[1]=parseInt(splite[1]);
			splite[2]=parseInt(splite[2])-1;
			let new_date = "";
			for (let i = 0; i<splite.length;i++) {
				if (splite[i]>2000) {
					new_date+=splite[i];
				}
				else{
					if (splite[i]>=10) {

						new_date+="-"+splite[i]
					}
					else {
						
						new_date+="-0"+splite[i]
					}
				}
			}
			date_dis.innerText = 'до '+new_date;
			new_date="";
		})
</script>
<?php
	require('bd.php');
	
	$sity = $_POST['sity'];
	$car_type = $_POST['car_type'];
    $query = "SELECT * FROM `sity` WHERE id=".$sity;
    $data = mysqli_query($bd,$query);
    $row = mysqli_fetch_assoc($data);
	$km = "SELECT * FROM `kmkoef` WHERE id=".$car_type;
    $data_km = mysqli_query($bd,$km);
    $row_km = mysqli_fetch_assoc($data_km);
	$kp = 1;
	$ks = 1;
	$km = $row_km['KmKoef'];
	$kn = 1;
	$kpr= 1;
	$kvs = 1;
	$kt = $row['kof'];
	$kbm = 1;
	$text = '';
	$arr2 = array();
	$count_name = 0;
		$myDateTime = DateTime::createFromFormat('Y-m-d', $_POST['reg_date']);
		$newDateString = $myDateTime->format('d.m.Y');
	$old = $myDateTime->modify('-1 day')->modify('+1 year');
	$oldDateString = $old->format('d.m.Y');
	$reg_date =explode('.', $newDateString);
	if (isset($_POST['default'])) {
		$def=1;
		$name = $_POST['uname'];
		$year = 0;
		$arr = array();
		for ($i=0; $i <count($name) ; $i++) {
			if ($name[$i]!=="") {
			$count_name+=1;
			$d = getdate();
			$test_data_ar = explode('-', $_POST['data'][$i]);
			$test_data_st = $_POST['stage'][$i];
		    $stage = $d['year'] - $test_data_st;
		    $data = $d['year'] - $test_data_ar[0];

		    switch ($data) {
		    	case ($data>=16&&$data<=21):
		    		$year=1; 
		    		break;
		    	case ($data>=22&&$data<=24):
		    		$year=2; 
		    		break;
		    	case ($data>=25&&$data<=29):
		    		$year=3; 
		    		break;
		    	case ($data>=30&&$data<=34):
		    		$year=4; 
		    		break;
		    	case ($data>=35&&$data<=39):
		    		$year=5; 
		    		break;
		    	case ($data>=40&&$data<=49):
		    		$year=6; 
		    		break;
		    	case ($data<=50):
		    		$year=7; 
		    		break;
		    	default:
		    		$year=0;
		    		break;
		    }
		    switch ($stage) {
		    	case ($stage==0):
		    		$stag=1;
		    		$st = '0 лет';
		    		break;
		    	case ($stage==1):
		    		$stag=2;
		    		$st = '1 год';
		    		break;
		    	case ($stage==2):
		    		$stag=3;
		    		$st = '2 года';
		    		break;
		    	case ($stage>=3||$stage<=4):
		    		$stag=4;
		    		$st = '3-4 года';
		    		break;
		    	case ($stage>=5||$stage<=6):
		    		$stag=5;
		    		$st = '5-6 лет';
		    		break;
		    	case ($stage>=7||$stage<=9):
		    		$stag=6;
		    		$st = '7-9 лет';
		    		break;
		    	case ($stage>=10||$stage<=14):
		    		$stag=7;
		    		$st = '10-14 лет';
		    		break;
		    	case ($stage>14):
		    		$stag=8;
		    		$st = 'Более 14 лет';
		    		break;
		    	
		    	default:
		    		# code...
		    		break;
		    }

				array_push($arr2, $year.''.$stag);
				$lol = "SELECT * FROM `stage` WHERE id=".$year;
	    		$data3 = mysqli_query($bd,$lol);
	    		$row3 = mysqli_fetch_assoc($data3);
				array_push($arr, $row3[$st]);
			} 
		}
			$ko = max($arr);
		$text = 'КВС';

		$stnge = '';
		for ($i=0; $i < count($arr2); $i++) { 
			$stnge.= " AND stage LIKE '%,".$arr2[$i].",%' ";
		}
	    $search_agent = "SELECT * FROM `strax` WHERE `pause`='0' AND sities LIKE '%,$sity,%' AND km LIKE '%,$car_type,%' $stnge ORDER BY `top` DESC";

		$data1 = mysqli_query($bd,$search_agent);

	}
	else{
		$def=0;
	    $search_agent = "SELECT * FROM `strax`  WHERE `bezlimit`='1' AND `pause`='0' AND sities LIKE '%,$sity,%' AND km LIKE '%,$car_type,%' ORDER BY `top` DESC";
	    $data1 = mysqli_query($bd,$search_agent);
		$ko = 1.87;
		$text = 'КО';
	}
	// max($year);
	    $summ=$kt*$kbm*$kvs*$ko*$km*$ks*$kn*$kp*$kpr;
	// echo 'Общий коефицент без ТБ - '.$summ.'<br>';
	// echo 'КТ - '.$kt.'<br>';
	// echo 'КМ - '.$km.'<br>';
	// echo $text.' - '.$ko.'<br>';
	 require('module/header.php'); 

 ?>
 <style>
 	.head_title{
 		margin-top: 50px;
 	}
 </style>
	<section class="head_title">
			<div class=" container">
				<div class="row">
				<div class=" header_wrapper">
					<p class=" header_link" onclick="back()"><span class="breads">Назад к оформлению</span></p>
				</div>
			</div>
		</div>
	</section>
	<section class="product_list">
		<div class="container">
			<div class="row">
				<div class="col-md-3 detail_wrapper">
					<div class="accordion  m-auto" id="accordionExample">
			            <div class="card detail">
			              <div class="card-header" id="headingOne">
			                <h2 class="mb-0 card_m">
			                  <button class="btn btn-block text-left detail_title collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="padding:0;">
			                    Детали расчета
			                  <div class="item" style="width: 25px;">
			                    <img src="img/drop.svg" alt="">
			                  </div>
			                  </button>
			                </h2>
			              </div>

			              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
			                <div class="card-body">
										<div class="h4 detail_title"><span>Базовая ставка:</span><span>2471–5436</span></div>
										<div class="h4 detail_title"><span>КБМ:</span><span>1</span></div>
										<div class="h4 detail_title"><span>Мощность:</span><span><?php echo $km ?></span></div>
										<div class="h4 detail_title"><span>Срок страхования:</span><span>1</span></div>
										<div class="h4 detail_title"><span>Наличие прицепа:</span><span>1</span></div>
										<div class="h4 detail_title"><span>Регион:</span><span><?php echo $kt ?></span></div>
										<?php if ($count_name!==0): ?>
										<div class="h4 detail_title"><span>ЛДУ:</span><span>1</span></div>
										<div class="h4 detail_title"><span>Водители:</span><span><?php echo $count_name ?></span></div>
										<div class="h4 detail_title"><span>Возраст и стаж:</span><span><?php echo $ko ?></span></div>
										<?php else: ?>
										<div class="h4 detail_title"><span>ЛДУ:</span><span><?php echo $ko ?></span></div>
										<div class="h4 detail_title"><span>Возраст и стаж:</span><span>1</span></div>
										<?php endif ?>
										<div class="h4 detail_title"><span>Грубые нарушения:</span><span>1</span></div>
			                </div>
			              </div>
			            </div>
			        </div>
					<div class="detail" style="padding:25px;">
						<div class="detail_item">
							<?php if (isset($_POST['uname'])) { ?>
							<div class="h4 detail_title">Водители<span class="change_inform" onclick="back()"></span></div>
							<?php for ($i=0; $i <count($_POST['uname']) ; $i++) { ?>
								<p class="detail_text"><?php echo strtoupper ($_POST['usurname'][$i].' '. mb_substr($_POST['uname'][$i],0,1,'UTF-8').'.'.mb_substr($_POST['ufathername'][$i],0,1,'UTF-8').'.')?></p>
								<p class="detail_text">КБМ 1(класс 3)</p>
							<?php }}else{ ?>
							<div class="h4 detail_title">Собственник<span class="change_inform" onclick="back()"></span></div>
							<p class="detail_text"><?php echo strtoupper($_POST['surname'].' '. mb_substr($_POST['name'],0,1,'UTF-8').'.'.mb_substr($_POST['fathername'],0,1,'UTF-8').'.') ?></p>
							<p class="detail_text">КБМ 1(класс 3)</p>
							<?php } ?>
						</div>
						<div class="detail_item">
							<hr color="#B5B5B5">
							<div class="h4 detail_title">Автомобиль<span class="change_inform" onclick="back()"></span></div>
							<?php if (isset($_POST['year'])){ ?>
							<p class="detail_text"><?php echo $_POST['car'].' '.$_POST['carmodel'].' '. $row_km['KmKoef'].' '.$_POST['year'].' г.'?></p>
							<?php }else{ ?>
							<p class="detail_text"><?php echo $_POST['car'].' '.$_POST['carmodel']?></p>
							<?php } ?>
						</div>
						<div class="detail_item">
							<hr color="#B5B5B5">
							<div class="h4 detail_title">Условия<span class="change_inform" onclick="back()"></span></div>
							<p class="detail_text"><span><?php echo 'г. '.$row['name'] ?></span> <span><?php echo $newDateString.'-'.$oldDateString ?></span></p>
						</div>
					</div>
				</div>
				<div class="col-md-9 strax_list">
					<div class="strax">
					<div class="filtr">
						<div class="item_filtr" data-price="101513.422" data-reyt="1">
								<div class="name" >Компания</div>
								<div class="name" >Рейтинг <div class="convert"><span class="filt" data-name="reyt"></span><span class="filt down" data-name="reyt" data-reverse="reyt"></span></div></div>
								<div class="name"  data-name="price" data-reverse="price" style="justify-content: center; width: 150px;">Стоимость <div class="convert"><span class="filt" data-name="price"></span><span class="filt down" data-name="price" data-reverse="price"></span></div></div>
								<form action="end.php" action="GET" style="margin:0;" class="send">
									<input type="submit" value="Оформить" class="offer" hidden>
								</form>
							</div>
					</div>
					<?php while ($cat = mysqli_fetch_assoc($data1)) {
				 			$js = json_decode($cat['sity_tb'],true);
					 ?>
				            <?php if ($cat['top']==1){ ?>
				            	<div class="strax_item recomend" data-price="<?php echo ($all=$js[$sity]*$summ*$cat['koef_bt']+$cat['koef_bt_summ']); ?>" data-reyt="<?php echo $cat['reyt'] ?>">
				        	<?php }else{ ?>
				        		<div class="strax_item " data-price="<?php echo ($all=$js[$sity]*$summ*$cat['koef_bt']+$cat['koef_bt_summ']); ?>" data-reyt="<?php echo $cat['reyt'] ?>">
				            <?php } ?>

								<h4 class="name"><?php echo $cat['name']; ?>
									
									 <?php if ($cat['top']==1){ ?>
									 	<span class="hiden ads">Реклама</span>
						        	 <?php }else{ ?>
						             <?php } ?>
								</h4>

								<div class="reyr">
									<?php for ($i=1; $i <=5; $i++) { 
										if ($i<=$cat['reyt']) { ?>
											<img src="img/active_star.svg" alt="" class="star">
										<?php }else{ ?>

											<img src="img/disabled_star.svg" alt="" class="star">
										<?php }
									} ?>
								</div>
								<!-- <p class="stavka stavka_id" data-link="req/index.php" data-id="<?php  echo $cat['id'];?>"><span class="hiden">Покрытие: </span>400000р</p> -->
								<!-- <p class="stavka dn"><?php echo ($js[$sity]."р"); ?></p> -->
								<p class="stavka p<?php  echo $cat['id'];?>"><span class="hiden">Стоимость: </span> <?php echo (number_format($js[$sity]*$summ*$cat['koef_bt']+$cat['koef_bt_summ'],2, ',', ' ').' p.'); 

								?></p>

								<?php if(isset($_POST['agent_form'])){ ?>
								<form action="register/end.php" action="GET" style="margin:0;">
								<?php }else{ ?>
								<form action="end.php" action="GET" style="margin:0;" class="send">
								<?php } ?>
									<input type="text" name="id" hidden value="<?php  echo $cat['id'];?>">
									<input type="text" name="def" hidden value="<?php  echo $def;?>">
									<input type="text" name="sity" hidden value="<?php echo $js[$sity]?>">
									<input type="text" name="price" hidden value="<?php echo $all?>">
									<input type="text" hidden name="info" value='<?php echo json_encode($_POST) ?>'>
									<input type="submit" value="Оформить" class="offer">
								</form>
							</div>
				    <?php } ?>
				</div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/main.js" defer></script>
	<script>
	    let div = document.querySelector('.strax'),
	    	item_filtr = document.querySelector('.item_filtr');
		item_filtr.addEventListener('click',(e)=>{
	        let para = document.querySelectorAll('.strax_item');
	        console.log(e)
			if (e.target.dataset.name) {
				if (e.target.dataset.reverse) {
					let type = e.target.dataset.name;
					console.log(e.target.dataset.name);
				    let paraArr = [].slice.call(para).sort(function (a, b) {
				        return parseInt(a.dataset[type]) > parseInt(b.dataset[type]) ? 1 : -1;
				    });
				    paraArr.reverse().forEach(function (p) {
				        div.appendChild(p);
				    });
				}else{
					let type = e.target.dataset.name;
					console.log(e.target.dataset.name);
				    let paraArr = [].slice.call(para).sort(function (a, b) {
				        return parseInt(a.dataset[type]) > parseInt(b.dataset[type]) ? 1 : -1;
				    });
				    paraArr.forEach(function (p) {
				        div.appendChild(p);
				    });
				}
			}
		})
	</script>
<!-- 	<script>
		window.addEventListener('load',()=>{
			for (stavkas of stavka_id) {
			}
			function loadDoc(link,item) {
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	const json = JSON.parse(this.responseText);
			    	document.querySelector('.p2').innerText = json['prem'];
			    	console.log(this.responseText)
			    }
			  };
			  xhttp.open("GET", 'req/index.php', true);
			  xhttp.send();
			}
			loadDoc();
			    console.log(this.responseText);
		});
	</script> -->
	<?php require('module/footer.php'); ?>

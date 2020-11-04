<?php 
  require('bd.php');
    $query = "SELECT * FROM `sity`";
    $data = mysqli_query($bd,$query);
    $query1 = "SELECT * FROM `kmkoef`";
    $data1 = mysqli_query($bd,$query1);
    if (isset($_COOKIE['login'])) {
      if (isset($_COOKIE['id'])) {
      }else{
        $query2 = "SELECT * FROM `user` WHERE login = ".$_COOKIE['login'];
        $data2 = mysqli_query($bd,$query2);
        $row2 = mysqli_fetch_assoc($data2);
        setcookie('id',$row2['id'],time()+(60*60*24*30),'/');
      }

    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="fonts/MANDATOR.ttf"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main1.css">
    <link rel="stylesheet" href="css/media.css">
    <title>Goldpreis</title>
  </head>
  <body>
    <header class="header">
          <div class="nav">
            <div class="container container-my">
              <div class="row naw_wrapper">
                <a href="index.php" class="col-md-2 logo_wrapper">
                  <img src="img/logo.svg" class="logo" alt="">
                </a>
                <div class="col-md-2 head_btns ">
                    <?php if (isset($_COOKIE['login'])) { ?>
                      <a href="register/login.php"><img src="https://goldpreis.ru/img/human.svg" alt=""></a>
                    <?php }else{ ?>
                      <img src="https://goldpreis.ru/img/menu.svg" alt="" onclick="Menu()">
                    <?php } ?>
                </div>
                <ul class="nav col-md-4 dn">
                  <li class="nav-item">
                    <a class="nav-link nav-link-item" href="#">Осаго</a>
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
                <div class="offset-md-3 col-md-3 " style="display: flex;justify-content: center;">
                    <button class="head-btn menu dn"><a href="register/login.php"><?php echo $_COOKIE['login'] ?></a></button>
                  <?php } else{ ?>   
                <div class="offset-md-3 col-md-3 justify-content-between menu_wrap">
                    <button class="head-btn menu dn"><a href="register/">Войти</a></button>
                    <button class="head-btn menu dn"><a href="register/">Регистрация</a></button>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="offer">
            <div class="container container-my">
              <div class="row">
                <div class="col-md-7 m-auto text-center">
                  <p class="h1 title">Расчитайте лучшее предложение ОСАГО</p>
                </div> 
                <div class="col-md-6 m-auto text-center head_btn ">
                  <input class="col-md-7 count_input count_input1" type="text" placeholder="A 666 AA 666" required onkeyup="number()">
                 <!--  <div class="rus">
                  <input class="count_input rus_inp" type="text" placeholder="666" required onkeyup="number()">
                  <div class="rus_flag">
                    <div class="center_flag">
                      <p class="rus_text">RUS</p>
                      <img class="rus_img" src="img/russia.svg" alt="">
                    </div>
                  </div>
                  </div> -->
                  <button class="col-md-3 count count_btn text-center">Расчитать</button>
                </div>
              </div>
              <div class="container container-my">
                <div class="row">
                  <div class="col-md-3 m-auto text-center">
                    <div class="count_number count_btn" disabled="disabled">Еще не получили номер</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </header>
    <div class="" style="background:#fff; margin-bottom:-10px;z-index: 2;">
    <div class="calc_l container-my " style="display: none;">
          <div class="calc_wrapper">
          <nav class="nav">
            <ul class="navigation">
              <li class="navigation_li is_used i1" data-menu="1">Автомобиль<span><img src="img/arrow.svg" alt=""></span></li>
              <li class="navigation_li i2" data-menu="2">Водители<span><img src="img/arrow.svg" alt=""></span></li>
              <li class="navigation_li i3">Расчет</li>
            </ul>
          </nav>
            <form action="result.php" method="post">
              <div class="sec sec_1 is_used">
                <div class="calc_avto row m-auto">
                  <select name="" disabled="" class="col-md-3 calc_select">
                    <option value="Легковой (кат. В)">Легковой (кат. В)</option>
                  </select>
                  <select name="" disabled="" class="col-md-2 calc_select">
                    <option value="Личная">Личная</option>
                  </select>
                  <select name="car" class="col-md-2 calc_select">
                    <option value="KIA">KIA</option>
                  </select>
                  <select name="carmodel" class="col-md-2 calc_select">
                    <option value="Optima">Optima</option>
                  </select>
                  <select name="car_type" class="col-md-2 calc_select">
                      <?php while ($cat = mysqli_fetch_assoc($data1)) {
                                ?>
                      <option value="<?php echo $cat['id'] ?>"><?php echo $cat['KmName']; ?></option>
                             <?php
                                } ?>
                  </select>
                </div>
                <div class="disable">
                  <p class="thirty_one">Возможность выбора категории и распростронение мы добавим через: 31 день 34 минуты 40 секунд</p>
                </div>
                <div class="sity_wrap row">
                <!-- <input type="text" class="col-md-5 sity" value="Сывтывкар, Республика Коми"> -->
                <select name="sity" class="col-md-5 sity" id="" style="padding: 5px;">
                  <?php while ($cat = mysqli_fetch_assoc($data)) {
                            ?>
                  <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name']; ?></option>
                         <?php
                            } ?>
                </select>
                <label for="" class="col-md-2 disable" style="margin-top: -19px;">Период использования:<br><select name="" id="" class="calc_select sity one" disabled>
                  <option value="">1 год</option>
                </select></label>
                <div class="date">
                  <p class="srok head_btns">Срок страхования</p>
                  <label for="" class="dates">С:
                    <input type="date" class="calc_select" id="date"> По:
                    <input type="date" class="calc_select" id="date_dis" disabled>
                  </label>
                </div>
                <div class="form_next">
                  <div class="form_btn" data-list="1">Далее ></div>
                </div>
                </div>
              </div>
              <div class="sec sec_2">
                <div class="checker">
                  <span class="mult">Без ограничений</span>
                    <label for="lim" class="checkbox">
                      <input type="text" name="number" class="num" hidden>
                      <input type="checkbox" name="default" id="lim" hidden>
                    </label>
                  <span class="list">Список водителей</span>
                </div>
                <div class="calc_avto sec2_calc_avto row m-auto owner">
                    <label for="" class="fio with_label">ФИО собственника<input type="text" class="calc_select " name="name" placeholder="Фамилия"></label>
                  <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " name="surname" placeholder="Имя"></label>
                  <label for="" class="fio with_label">&nbsp<input type="text" class="calc_select " name="fathername" placeholder="Очество"></label>
                  <div class="calc_avto n_1">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="birthday" class="calc_select "></label>
                    <label for="" class="fio with_label">Серия и номер паспорта:<input type="text" name="passport" class="calc_select " style="height: 40px"></label>
                    <label for="" class="fio with_label">Дата выдачи<input type="date" name="passport_date" class="calc_select "></label>
                  </div>
                  <div class="clear">
                    <div class="clear_btn_1 red clear_all" data-clear="1">
                      <img src="img/clear.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="active_users">
                <div class="calc_avto sec2_calc_avto sec_calc_1 row m-auto blocked active ">
                  <div class="hr">
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n1" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="1"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage1" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_1">
                    <!-- <div class="clear_btn_1  red" data-clear="1">
                      <img src="img/min.svg" alt="" data-clear="1">
                    </div> -->
                    
                    <div class="clear_btn_1 blue blue1" data-clear="1">
                      <img src="img/plus.svg" class="o blue"  alt="" data-clear="1">
                    </div>
                  </div>
                  
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_2 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n2" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto2 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]"  class="calc_select data_birth" data-stage="2"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]"  class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage2" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_2">
                    <div class="clear_btn_1 red red2" data-clear="2">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="2">
                    </div>
                    <div class="clear_btn_1 blue blue2" data-clear="2">
                      <img src="img/plus.svg" class="o blue" alt="" data-clear="2">
                    </div>
                  </div>
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_3 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n3" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto3 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="3"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage3" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_3">
                    <div class="clear_btn_1 red red3" data-clear="3">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="3">
                    </div>
                    <div class="clear_btn_1 blue blue3" data-clear="3">
                      <img src="img/plus.svg" class="o blue" alt="" data-clear="3">
                    </div>
                  </div>
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_4 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n4" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto4 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="4"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage4" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_4">
                    <div class="clear_btn_1 red red4" data-clear="4">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="4">
                    </div>
                    <div class="clear_btn_1 blue blue4" data-clear="4">
                      <img src="img/plus.svg" class="o blue" alt="" data-clear="4">
                    </div>
                  </div>
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_5 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n5" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto5 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="5"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage5" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_5">
                    <div class="clear_btn_1 red red5" data-clear="5">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="5">
                    </div>
                    <div class="clear_btn_1 blue blue5" data-clear="5">
                      <img src="img/plus.svg" class="o blue" alt="" data-clear="5">
                    </div>
                  </div>
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_6 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n6" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio " name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto6 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="6"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage6" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_6">
                    <div class="clear_btn_1 red red6" data-clear="6">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="6">
                    </div>
                    <div class="clear_btn_1 blue blue6" data-clear="6">
                      <img src="img/plus.svg" class="o blue" alt="" data-clear="6">
                    </div>
                  </div>
                </div>
                <div class="calc_avto sec2_calc_avto sec_calc_7 row m-auto blocked">
                  <div class="hr">
                    <hr>
                  </div>
                  <div class="calc_avto calc_avto1 w80">
                    <input type="text" class="calc_select fio n7" name="uname[]" placeholder="Имя">
                    <input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия">
                    <input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество">
                  </div>
                  <div class="calc_avto calc_avto7 w80">
                    <label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="7"></label>
                    <label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select "></label>
                    <label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage7" style="padding: 5px;">
                        
                    </select></label>
                  </div>
                  <div class="clear_0 clear_7">
                    <div class="clear_btn_1 red red7" data-clear="7">
                      <img src="img/min.svg" class="o red red_img" alt="" data-clear="7">
                    </div>
                  </div>

                </div>

                  
                
                </div>
                
                <div class="form_next">
                    <div class="form_btn back_btn" data-list="2">Назад</div>
                    <input class="form_btn" type="submit" name="btn" value="Далее >">

                </div>
              </div>
              <div class="sec_3"></div>
            </form>
          </div>
    </div>
    </div>
    <section class="information">
      <div class="container container-my">
        <div class="row">
            <h2 class="col-md-8 m-auto text-center info_head">Как купить полис с кешбеком</h2>
        </div>
      </div>
      <div class="container container-my">
        <div class="row">
          <div class="col-md-4">
            <div class="inform_item m-auto">
              <p class="h3 inform_title">01</p>
              <p class="inform_text">Рассчитайте стоимость полиса введя номер авто или включив расширенный режим</p>
            </div>
            <div class="inform_item m-auto">
              <p class="h3 inform_title">02</p>
              <p class="inform_text">Сравните и выберите понравившуюся по условиям цене страховую компанию из списка</p>
            </div>
          </div>
          <div class="col-md-4 align-items-center info-img">
            <img src="img/card.svg" alt="">
          </div>
          <div class="col-md-4">
            <div class="inform_item m-auto">
              <p class="h3 inform_title">03</p>
              <p class="inform_text">Заполните данные для оформления ОСАГО и оплатите полис карточкой</p>
            </div>
            <div class="inform_item m-auto">
              <p class="h3 inform_title">04</p>
              <p class="inform_text">Получите ваш полис на e-mail и персональную скидку, на оплату до половины нового полиса</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cash_back">
      <div class="container container-my">
        <div class="row row_cash_wrapper">
          <div class="offset-md-1 col-md-4 cash_wrapper">
            <div class="line"></div>
            <div class="cash">
              <p class="h2 cash_title">20%</p>
              <p class="cash_text">Кешбек реальными деньгами</p>
              <button class="cash_btn">Получить кешбек</button>
            </div>
          </div>
          <div class="offset-md-1 col-md-5 cash_car">
            <img src="img/car.svg" class="img" alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="servise">
      <div class="container container-my">
        <div class="row ">
          <div class="col-md-4">
            <div class="servise_items servise_items1">
              <p class="servise_cont">Рекламная ссылка</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="servise_items servise_items2">
              <p class="servise_cont">Проверить КБМ водителя</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="servise_items servise_items2">
              <p class="servise_cont">Проверить штрафы ГИБДД</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 m-auto servise_question">
            <p class="h2 servise_question_title ">Частые вопросы</p>
          </div>
        </div>
        <div class="row">
          <div class="accordion col-md-8 m-auto" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0 card_m">
        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Какие документы понадобятся для оформления ОСАГО
        </button>
        <div class="item">
          <img src="img/row_btn.svg" alt="">
        </div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0 card_m">
        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Как происходит расчет ОСАГО
        </button>
        <div class="item">
          <img src="img/row_btn.svg" alt="">
        </div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

</div>
        </div>
      </div>
    </section>
    <section class="cash_back">
      <div class="container container-my">
        <div class="row row_cash_wrapper">
          <div class="offset-md-1 col-md-4 cash_wrapper">
            <div class="line"></div>
            <div class="cash">
              <p class="h2 cash_title">20%</p>
              <p class="cash_text">Кешбек реальными деньгами</p>
              <button class="cash_btn">Проверить КБМ водителя</button>
            </div>
          </div>
          <div class="offset-md-1 col-md-5 cash_car">
            <img src="img/car.svg" class="img" alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="end_offer">
      <div class="container container-my">
        
          <div class="offer">
            <div class="container container-my">
              <div class="row">
                <div class="col-md-7 m-auto text-center">
                  <p class="h1 title">Расчитайте лучшее предложение ОСАГО</p>
                </div>
                <div class="col-md-6 m-auto text-center head_btn ">
                  <input class="col-md-7 count_input count_input1" type="text" placeholder="A 666 AA 666" required onkeyup="number()">
                 <!--  <div class="rus">
                  <input class="count_input rus_inp" type="text" placeholder="666" required onkeyup="number()">
                  <div class="rus_flag">
                    <div class="center_flag">
                      <p class="rus_text">RUS</p>
                      <img class="rus_img" src="img/russia.svg" alt="">
                    </div>
                  </div>
                  </div> -->
                  <button class="col-md-3 count count_btn text-center">Расчитать</button>
                </div>
              </div>
              <div class="container container-my">
                <div class="row">
                  <div class="col-md-3 m-auto text-center">
                    <div href="" class="count_number count_btn " >Еще не получили номер</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <section class="collection">
      <div class="container container-my collection_items">
        <img src="img/5.svg" alt="">
        <img src="img/2.svg" alt="">
        <img src="img/3.svg" alt="">
        <img src="img/4.svg" alt="">
        <img src="img/7.svg" alt="">
        <img src="img/6.svg" alt="">
      </div>
    </section>
    <footer class="footer">
      <div class="container container-my">
        <div class="contacts">
          <img src="img/logo.svg" alt="">
          <div class="contact_items">
            <a href=""><img src="img/Vector.svg" alt=""></a>
            <a href=""><img src="img/Vector-1.svg" alt=""></a>
            <a href=""><img src="img/Vector-2.svg" alt=""></a>
            <a href=""><img src="img/Vector-3.svg" alt=""></a>
            <a href=""><img src="img/Vector-4.svg" alt=""></a>
          </div>
        </div>
        <div class="navigation">
          <ul class="footer_menu">
            <li><a href="">О проекте</a></li>
            <li><a href="">О компании</a></li>
            <li><a href="">Выгода</a></li>
            <li><a href="">Партнерам</a></li>
            <li><a href="">Для агентов</a></li>
            <li><a href="">Политика безопасности</a></li>
            <li><a href="">Условия  соглашения</a></li>
            <li><a href="">Контакты</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/main1.js"></script>
    <script>
       const data_birth = document.querySelectorAll('.data_birth');
       for (data_births of data_birth) {
         data_births.addEventListener('change',(e)=>{
            const date1 = new Date();
            let date = e.target.value.split('-');
            let dataset = e.target.dataset.stage;
            const data_stage = document.querySelector('.data_stage'+dataset);
            console.log(date[0])
            if (date[0]>1900) {
              console.log(date[0]);
              for (let i = parseInt(date[0])+16;i<=date1.getFullYear();i++) {
                data_stage.innerHTML +=`<option value="${i}">${i}</option>`
              }
            }
         });
       }
    </script>
  </body>
</html>
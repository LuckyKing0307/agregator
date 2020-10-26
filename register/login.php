<?php 
    require('../bd.php');
    $query_s = "SELECT * FROM `sity`";
    $data_s = mysqli_query($bd,$query_s);
    $query1 = "SELECT * FROM `kmkoef`";
    $data1 = mysqli_query($bd,$query1);
    $query2 = "SELECT * FROM `stage`";
    $data2 = mysqli_query($bd,$query2);
    if (isset($_POST['reg'])) {
        $login= mysqli_real_escape_string($bd,trim($_POST['login']));
        $password= mysqli_real_escape_string($bd,trim($_POST['pass']));
        if (!empty($login) && !empty($password)) {
            $query = "SELECT * FROM `user` WHERE login = '$login' AND password = '$password'";
            $data = mysqli_query($bd,$query);
            if (mysqli_num_rows($data)==1) {
                $row = mysqli_fetch_assoc($data);
                setcookie('id',$row['id'],time()+(60*60*24*30),'/');
                setcookie('login',$row['login'],time()+(60*60*24*30),'/');
                header('Location: login.php');
            }
            else{
                echo "BAD";
            }
        }
        else{
            echo "Заполните все поля правильно!!!";
        }
    }
 ?>

<?php 
    require('../bd.php');
    $query_s = "SELECT * FROM `sity`";
    $data_s = mysqli_query($bd,$query_s);
    $query1 = "SELECT * FROM `kmkoef`";
    $data1 = mysqli_query($bd,$query1);
    $query2 = "SELECT * FROM `stage`";
    $data2 = mysqli_query($bd,$query2);
    if (isset($_POST['reg'])) {
        $login= mysqli_real_escape_string($bd,trim($_POST['login']));
        $password= mysqli_real_escape_string($bd,trim($_POST['pass']));
        if (!empty($login) && !empty($password)) {
            $query = "SELECT * FROM `user` WHERE login = '$login' AND password = '$password'";
            $data = mysqli_query($bd,$query);
            if (mysqli_num_rows($data)==1) {
                $row = mysqli_fetch_assoc($data);
                setcookie('id',$row['id'],time()+(60*60*24*30),'/');
                setcookie('login',$row['login'],time()+(60*60*24*30),'/');
                header('Location: login.php');
            }
            else{
                echo "BAD";
            }
        }
        else{
            echo "Заполните все поля правильно!!!";
        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <style>
    body{
        padding: 30px;
    }
    .btn{
        width: 200px;
        height: 60px;
        color:#fff;
        font-size: 24px;
        border: none;
        margin: 0 auto;
        margin-top: 20px;
        background-color: #F97822;
    }
    .img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .calc_select{
        width: 100%;
        height: 40px;
    }
    .head_form{
        font-size: 26px !important;
    }
    .fio.with_label{
        color: #000 !important;
        font-weight: 700 !important;
    }
    </style>
    <?php  if (isset($_COOKIE['login'])) { 
            $query = "SELECT * FROM `user` WHERE id=".$_COOKIE['id'];
            $data = mysqli_query($bd,$query);
            $row = mysqli_fetch_assoc($data);
            $user = json_decode( $row['user'],true);
            $car = json_decode( $row['car'],true);
            $user_car = json_decode( $row['user_car'],true);
            $info = json_decode( $row['all_users'],true);
            
    ?>
<?php require('../module/header.php') ?>
    <section class="head_title" style="margin-top: 40px; margin-bottom: 60px;">
            <div class=" container">
                <div class="row">
                <div class=" header_wrapper">
                    <a href="../" class="link header_link">< Назад на главную</a>
                </div>
            </div>
        </div>
    </section>
    <section class="contents">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <nav class="nav">
                        <ul class="perehod dn">
                            <li class="perehod_link"><a href="user.php" class="links">Личный кабинет</a></li>
                            <li class="perehod_link"><a href="" class="links">Статистика</a></li>
                            <li class="perehod_link"><a href="" class="links">История</a></li>
                            <li class="perehod_link"><a href="login.php" class="links">Настройки</a></li>
                        </ul>
                        <ul class="profile_mob hiden">
                            <li><a href="user.php"><svg width="28" height="30" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.9999 0C9.85261 0 6.47852 3.48709 6.47852 7.77328C6.47852 12.0595 9.85261 15.5466 13.9999 15.5466C18.1472 15.5466 21.5213 12.0595 21.5213 7.77328C21.5213 3.48709 18.1472 0 13.9999 0ZM13.9999 12.4372C11.5118 12.4372 9.48707 10.3447 9.48707 7.77328C9.48707 5.20188 11.5118 3.10931 13.9999 3.10931C16.488 3.10931 18.5127 5.20188 18.5127 7.77328C18.5127 10.3447 16.488 12.4372 13.9999 12.4372ZM26.0341 29.5385C26.8649 29.5385 27.5383 28.865 27.5383 28.0342V27.9838C27.5383 21.9844 22.8134 17.1012 17.0084 17.1012H10.9913C5.18484 17.1012 0.461426 21.9844 0.461426 27.9838V28.0342C0.461426 28.865 1.13491 29.5385 1.9657 29.5385C2.79649 29.5385 3.46997 28.865 3.46997 28.0342V27.9838C3.46997 23.6976 6.84406 20.2105 10.9913 20.2105H17.0084C21.1557 20.2105 24.5298 23.6976 24.5298 27.9838V28.0342C24.5298 28.865 25.2033 29.5385 26.0341 29.5385Z" fill="#B7B7B7"/>
                            </svg></a></li>
                            <li><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.41497 18.0347C3.58014 18.0347 2.93782 18.7829 3.16413 19.5864C4.74209 25.1893 9.91222 29.3281 15.9998 29.3281C23.3332 29.3281 29.3332 23.3281 29.3332 15.9974C29.3332 8.66675 23.3332 2.66675 15.9998 2.66675C13.9299 2.66654 11.8883 3.14838 10.0368 4.0741C8.18541 4.99982 6.57499 6.34398 5.33317 8.00008V3.99837C5.33317 3.26294 4.73698 2.66675 4.00155 2.66675C3.26634 2.66675 2.67025 3.26259 2.66993 3.9978L2.6665 12.0001H10.6665C11.4029 12.0001 11.9998 11.4031 11.9998 10.6667C11.9998 9.93037 11.4029 9.33342 10.6665 9.33342H7.73317C9.59984 6.93341 12.6692 5.33341 16.0025 5.33341C21.8665 5.33341 26.6665 10.1334 26.6665 15.9974C26.6665 21.8614 21.8665 26.6641 15.9998 26.6641C11.22 26.6641 7.15144 23.4778 5.80868 19.1217C5.61689 18.4996 5.06602 18.0347 4.41497 18.0347Z" fill="#B7B7B7"/>
                            <path d="M16.0028 9.33329C15.2664 9.33327 14.6694 9.93023 14.6694 10.6666V16.4L18.1418 21.0639C18.5802 21.6527 19.4133 21.7737 20.0011 21.3339C20.5902 20.8932 20.7082 20.0574 20.2643 19.4707L17.3361 15.6013V10.6666" fill="#B7B7B7"/>
                            <ellipse cx="16.0252" cy="10.65" rx="1.325" ry="1.35" fill="#B7B7B7"/>
                            </svg></li>
                            <li><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.788 2.66675C26.7756 2.66675 27.5762 3.46733 27.5762 4.45489L27.5762 20.8786C27.5762 21.8662 26.7756 22.6667 25.788 22.6667C24.8005 22.6667 23.9999 21.8662 23.9999 20.8786L23.9999 4.45489C23.9999 3.46733 24.8005 2.66675 25.788 2.66675ZM15.6666 7.66675C16.5871 7.66675 17.3333 8.41297 17.3333 9.33347L17.3333 21C17.3333 21.9205 16.5871 22.6667 15.6666 22.6667C14.7461 22.6667 13.9999 21.9205 13.9999 21L13.9999 9.33347C13.9999 8.41297 14.7461 7.66675 15.6666 7.66675ZM5.66661 13.9167C6.58711 13.9167 7.33333 14.663 7.33333 15.5835L7.33333 21C7.33333 21.9205 6.58711 22.6667 5.66661 22.6667C4.7461 22.6667 3.99988 21.9205 3.99988 21L3.99988 15.5835C3.99988 14.663 4.7461 13.9167 5.66661 13.9167Z" fill="#B7B7B7"/>
                            <path d="M29.0002 26.6667L3.00016 26.6667C2.07969 26.6667 1.3335 27.4129 1.3335 28.3334C1.3335 29.2539 2.07969 30.0001 3.00016 30.0001L29.0002 30.0001C29.9206 30.0001 30.6668 29.2539 30.6668 28.3334C30.6668 27.4129 29.9206 26.6667 29.0002 26.6667Z" fill="#B7B7B7"/>
                            </svg></li>
                            <li><a href="login.php"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0002 9.23325C12.2306 9.23325 9.2335 12.2304 9.2335 15.9999C9.2335 19.7694 12.2306 22.7666 16.0002 22.7666C19.7697 22.7666 22.7668 19.7694 22.7668 15.9999C22.7668 12.2304 19.7697 9.23325 16.0002 9.23325ZM16.0002 20.6618C13.3887 20.6618 11.3383 18.6114 11.3383 15.9999C11.3383 13.3885 13.3887 11.338 16.0002 11.338C18.6116 11.338 20.6621 13.3885 20.6621 15.9999C20.6621 18.6114 18.6116 20.6618 16.0002 20.6618Z" fill="#B7B7B7" stroke="#B7B7B7" stroke-width="0.2"/>
                            <path d="M28.888 7.74741L28.8881 7.74743L28.8894 7.74472C29.2077 7.10827 29.1027 6.26131 28.5707 5.72929L26.1707 3.32929C25.6387 2.79727 24.7917 2.69233 24.1553 3.01056L24.1553 3.01052L24.1526 3.01195L21.5937 4.38979L20.1808 3.82462L19.2952 1.0694L19.2949 1.06838C19.0827 0.431759 18.4473 -0.1 17.7 -0.1H14.3C13.5548 -0.1 12.9132 0.43082 12.8022 1.17734L11.9233 3.91179C11.3556 4.01376 10.8742 4.20539 10.3976 4.48514L7.84741 3.11195L7.84743 3.11191L7.84472 3.11056C7.20827 2.79233 6.36131 2.89727 5.82929 3.42929L3.42929 5.82929C2.89727 6.36131 2.79233 7.20827 3.11056 7.84472L3.11055 7.84473L3.11128 7.84614L4.39017 10.3055C4.29526 10.5454 4.20049 10.806 4.10634 11.065L4.10602 11.0658C4.01173 11.3251 3.91804 11.5827 3.82451 11.8192L1.0694 12.7048L1.06838 12.7051C0.431759 12.9173 -0.1 13.5527 -0.1 14.3V17.7C-0.1 18.4497 0.43446 19.0846 1.17095 19.2957L3.92462 20.1808L4.48979 21.5937L3.11195 24.1526L3.11191 24.1526L3.11056 24.1553C2.79233 24.7917 2.89727 25.6387 3.42929 26.1707L5.82929 28.5707C6.36131 29.1027 7.20827 29.2077 7.84472 28.8894L7.84474 28.8895L7.84741 28.888L10.4063 27.5102L11.8186 28.0751L12.7045 30.9296L12.7045 30.9296L12.7051 30.9316C12.9173 31.5682 13.5527 32.1 14.3 32.1H17.7C18.4473 32.1 19.0827 31.5682 19.2949 30.9316L19.2955 30.9296L20.1814 28.0752L21.5937 27.5102L24.1526 28.888L24.1526 28.8881L24.1553 28.8894C24.7917 29.2077 25.6387 29.1027 26.1707 28.5707L28.5707 26.1707C29.1027 25.6387 29.2077 24.7917 28.8894 24.1553L28.8895 24.1553L28.888 24.1526L27.5102 21.5937L28.0752 20.1814L30.9296 19.2955L30.9296 19.2955L30.9316 19.2949C31.5682 19.0827 32.1 18.4473 32.1 17.7V14.3C32.1 13.5575 31.5727 12.8176 30.8291 12.6043L28.0754 11.7192L27.5102 10.3063L28.888 7.74741ZM26.3708 18.4044L26.3137 18.4218L26.3019 18.4804L26.204 18.9702L25.3108 21.0544L25.0143 21.5486L24.9848 21.5976L25.0122 21.6479L26.7764 24.8822L24.8822 26.7764L21.6479 25.0122L21.5976 24.9848L21.5486 25.0143L21.0504 25.3132C21.0501 25.3133 21.0498 25.3135 21.0495 25.3137C20.3573 25.7091 19.6663 26.0053 18.9764 26.2027L18.4804 26.3019L18.4218 26.3137L18.4044 26.3708L17.326 29.9H14.674L13.5956 26.3708L13.5782 26.3137L13.5196 26.3019L13.0298 26.204L10.9456 25.3108L10.4514 25.0143L10.4024 24.9848L10.3521 25.0122L7.1178 26.7764L5.22362 24.8822L6.98779 21.6479L7.0152 21.5976L6.98575 21.5486L6.68682 21.0504C6.68665 21.0501 6.68648 21.0498 6.68631 21.0495C6.29088 20.3573 5.99475 19.6663 5.79726 18.9764L5.69806 18.4804L5.68634 18.4218L5.62922 18.4044L2.1 17.326V14.6748L5.42822 13.6959L5.47481 13.6822L5.49285 13.6371L5.69285 13.1371L5.69371 13.1375L5.69701 13.1243C5.89438 12.3348 6.19039 11.6435 6.5863 10.9505L6.88575 10.4514L6.9144 10.4037L6.8889 10.3542L5.22233 7.1191L7.11708 5.22434L10.251 6.98716L10.3016 7.01565L10.3514 6.98575L10.8505 6.6863C11.5435 6.29039 12.2348 5.99438 13.0243 5.79701L13.0245 5.79791L13.0371 5.79285L13.5371 5.59285L13.5812 5.57523L13.5954 5.52998L14.6734 2.1H17.3266L18.4046 5.52998L18.4188 5.57523L18.4629 5.59285L18.9629 5.79285L18.9627 5.79333L18.9725 5.79615C19.6637 5.99364 20.356 6.29014 21.0495 6.68631C21.0498 6.68648 21.0501 6.68665 21.0504 6.68682L21.5486 6.98575L21.5976 7.0152L21.6479 6.98779L24.8822 5.22362L26.7764 7.1178L25.0122 10.3521L24.9848 10.4024L25.0143 10.4514L25.3132 10.9496C25.3133 10.9499 25.3135 10.9502 25.3137 10.9505C25.7091 11.6427 26.0053 12.3337 26.2027 13.0236L26.3019 13.5196L26.3137 13.5782L26.3708 13.5956L29.9 14.674V17.326L26.3708 18.4044Z" fill="#B7B7B7" stroke="#B7B7B7" stroke-width="0.2"/>
                            </svg></a></li>
                        </ul>
                    </nav>
                    <div class="banner dn" style="height: 50%;">Баннер</div>
                </div>
                <div class="col-md-10">
                    <form action="result.php" method="post"  enctype="multipart/form-data" class="user_information">
                        <div class="user_inputs row">
                                <!-- <div class=" row jcb">
                                    <div class="col-md-6 banner">
                                        БАННЕР
                                    </div>
                                    <div class="col-md-5 save">
                                        <input type="submit" class="save_inp" value="Сохранить изменения">
                                    </div>
                                </div> -->
                            <div class="col-md-8" style="display: flex;flex-direction: column;justify-content: center;">
                                <div class="user_inf row jcb" style="margin-right: -5px;">
                                    <label for="" class="fio  with_label "><input name="a_name" type="text" class="calc_select " placeholder="Имя" value="<?php echo  $row['name']; ?>" ></label>
                                    <label for="" class="fio  with_label "><input name="a_surname" type="text" class="calc_select " placeholder="Фамилия"  value="<?php echo  $row['surname']; ?>" ></label>
                                    <label for="" class="fio  with_label "><input type="text" class="calc_select " placeholder="Очество" name="a_fathername" value="<?php echo $row['fathername']; ?>"></label>
                                </div>
                                <div class="user_inf row jcb" style="margin-right: -5px;">
                                    <label for="" class="fio  with_label ">Email<input type="text" name="email" class="calc_select" placeholder="Имя" name="a_name" value="<?php echo $row['email']; ?>" ></label>
                                    <label for="" class="fio  with_label ">Телефон<input type="text" name="phone" class="calc_select" placeholder="Фамилия" name="a_surname" value="<?php echo  $row['phone']; ?>"></label>
                                    <label for="" class="fio  with_label ">&nbsp<input type="text" name="" class="calc_select" placeholder="Код подтверждения" name="a_fathername"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ava_img jcc">
                                    <?php if (isset($user['img'])) { ?>
                                        <img src="img/<?php echo $user['img'] ?>" alt="" name="img" class="user_img" class="img">
                                    <?php } ?>
                                   <label for="file" class="files"><span class="upload"><img src="../img/upload.svg" class="upload_img" alt="">Загрузить</span><input id="file" hidden type="file" name="img"></label>
                                </div>
                            </div>
                        </div>
                        <div class=" row jcb">
                            <label for="" class="fio with_label">Логин<input type="text" class="calc_select " value="<?php echo $row['login'] ?>"></label>
                            <label for="" class="fio with_label">Email<input type="text" class="calc_select " value="<?php echo $row['email'] ?>"></label>

                            <?php if ($user['agent_check']==1) { ?>
                            <label for="agent" class="fio with_label agent"><span class="aic"  onclick="Agent()" style="margin-top: -10px;"><span class="check jcc aic" ><img src="../img/galc.png" class="checker_img" alt=""></span><span>Я агент</span></span><input type="checkbox" checked hidden class="agent_check" id="agent" name="agent_check"><span class=""  style="display: flex;""><input type="text" class="checker1 calc_select" name="agent_key" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;"><button class="agent_button">Подтвердить</button><input type="checkbox" checked hidden name="me1" id="me1"></span></label>
                           <?php }else{ ?>
                            <label for="agent" class="fio with_label agent"><span class="aic"  onclick="Agent()" style="margin-top: -10px;"><span class="check jcc aic"><img src="../img/galc.png" class="checker_img" alt="" style="display: none"></span><span>Я агент</span></span><input type="checkbox" hidden class="agent_check" id="agent" name="agent_check"><span class="" style="display: flex;"><input type="text" class="checker1 calc_select" name="agent_key" disabled  style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;"><button class="agent_button">Подтвердить</button><input type="checkbox" hidden name="me1" id="me1"></span></label>
                           <?php } ?>                            
                            <div class="calc_avto calc_avto6 col-md-8" style="padding: 0;">
                                <input type="text" class="calc_select fio" name="pass" placeholder="Старый пороль">
                                <input type="text" class="calc_select fio" name="newpass" placeholder="Новый пороль">
                                <input type="text" class="calc_select fio" name="newpass" placeholder="Повторите пороль">
                            </div>
                        </div>
                        <div class="row">
                        <div class="head_form">Cтрахователя<label for="me" class="lab  aic jcc" onclick="myFunction()"><span class="check aic jcc">
                            <?php if ($user['check_img']==1) { ?>
                                <img src="../img/galc.png" class="check_img" alt="">
                                </span>Я собственник
                                <input type="checkbox"  id="me" hidden name="check_img" checked>
                           <?php }else{ ?>
                                <img src="../img/galc.png" class="check_img" alt="" style="display: none">
                                </span>Я собственник
                                <input type="checkbox"  id="me" hidden name="check_img">
                           <?php } ?>
                        </label></div>
                        <div class="calc_avto sec2_calc_avto row m-auto">
                                <label for="" class="fio  with_label">Фамилия<input type="text" class="surname calc_select" name="surname" placeholder="Фамилия" value="<?php echo $user['surname']?>"></label>
                                <label for="" class="fio  with_label">Имя<input type="text" class="calc_select name2" name="name" placeholder="Имя"  value="<?php echo $user['name']; ?>"></label>
                                <label for="" class="fio  with_label">Отчество<input type="text" class="calc_select fathername" name="fathername" value="<?php echo $user['fathername']; ?>"></label>
                                <label for="" class="fio  with_label">Паспорт<input type="text" class="calc_select pass" name="passport" placeholder="Паспорт" value="<?php echo $user['passport']?>"></label>
                                <label for="" class="fio  with_label">Дата выдачи паспорта<input type="date" class="calc_select day_pass" name="passport_date" placeholder="Дата выдачи паспорта"  value="<?php echo $user['passport_date']; ?>"></label>
                                <label for="" class="fio  with_label">Адрес выдачи паспорта<input type="text" placeholder="Адрес выдачи паспорта" class="calc_select place" name="passport_place" value="<?php echo $user['passport_place']; ?>" ></label>
                              <div class="calc_avto n_1">
                                <label for="" class="fio with_label">Серия и номер ВУ<input type="text" name="vu" class="calc_select vu" style="height: 40px" value="<?php echo  $user['vu'] ?>"></label>
                                <label for="" class="fio with_label">Дата выдачи ВУ<input type="date" name="date_vu" class="calc_select day_vu" value="<?php echo $user['date_vu']; ?>"></label>
                                <label for="" class="fio with_label">Адрес регистрации<input type="text" name="register" class="calc_select reg" value="<?php echo $user['register']; ?>"></label>
                              </div>
                            </div>
                        <div class="car_type">
                            <label for="" class="fio  with_label">Категория</label>
                            <div class="tips ">
                                <label for="" class="types">A<input type="radio" hidden=""></label>
                                <label for="" class="types is_active">B<input type="radio" hidden=""></label>
                                <label for="" class="types">C<input type="radio" hidden=""></label>
                                <label for="" class="types">D<input type="radio" hidden=""></label>
                                <label for="" class="types">BE<input type="radio" hidden=""></label>
                                <label for="" class="types">CE<input type="radio" hidden=""></label>
                                <label for="" class="types">DE<input type="radio" hidden=""></label>
                                <label for="" class="types"><img src="../img/train.svg" alt=""><input type="radio" hidden=""></label>
                                <label for="" class="types"><img src="../img/bus.svg" alt=""><input type="radio" hidden=""></label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="head_form">Собственник</div>
                        <div class="calc_avto sec2_calc_avto row m-auto">
                                <label for="" class="fio  with_label">Фамилия<input type="text" class="calc_select surname1" name="user_surname" placeholder="Фамилия" value="<?php echo $user_car['surname']?>"></label>
                                <label for="" class="fio  with_label">Имя<input type="text" class="calc_select name1" name="user_name" placeholder="Имя"  value="<?php echo $user_car['name']; ?>"></label>
                                <label for="" class="fio  with_label">Отчество<input type="text" class="calc_select fathername1" name="user_fathername" value="<?php echo $user_car['fathername']; ?>"></label>
                                <label for="" class="fio  with_label">Паспорт<input type="text" class="calc_select pass1" name="user_passport" placeholder="Имя" value="<?php echo $user_car['passport']?>"></label>
                                <label for="" class="fio  with_label">Дата выдачи паспорта<input type="date" class="calc_select day_pass1" name="user_passport_date" placeholder="Фамилия"  value="<?php echo $user_car['passport_date']; ?>"></label>
                                <label for="" class="fio  with_label">Адрес выдачи паспорта<input type="text" class="calc_select place1" name="user_passport_place" placeholder="Очество"   value="<?php echo $user_car['passport_place']; ?>"></label>
                              <div class="calc_avto n_1">
                                <label for="" class="fio with_label">Серия и номер ВУ<input type="text" class="calc_select vu1" name="user_vu" style="height: 40px" value="<?php echo  $user_car['vu'] ?>"></label>
                                <label for="" class="fio with_label">Дата выдачи ВУ<input type="date" name="user_date_vu" class="calc_select day_vu1" value="<?php echo $user_car['date_vu']; ?>"></label>
                                <label for="" class="fio with_label">Адрес регистрации<input type="text" name="user_register" class="calc_select reg1" value="<?php echo $user_car['register']; ?>"></label>
                              </div>
                            </div>
                        <div class="car_type">
                            <label for="" class="fio  with_label">Категория</label>
                            <div class="tips ">
                                <label for="" class="types">A<input type="radio" hidden=""></label>
                                <label for="" class="types is_active">B<input type="radio" hidden=""></label>
                                <label for="" class="types">C<input type="radio" hidden=""></label>
                                <label for="" class="types">D<input type="radio" hidden=""></label>
                                <label for="" class="types">BE<input type="radio" hidden=""></label>
                                <label for="" class="types">CE<input type="radio" hidden=""></label>
                                <label for="" class="types">DE<input type="radio" hidden=""></label>
                                <label for="" class="types"><img src="../img/train.svg" alt=""><input type="radio" hidden=""></label>
                                <label for="" class="types"><img src="../img/bus.svg" alt=""><input type="radio" hidden=""></label>
                            </div>
                        </div>
                        </div>
                        <div class="row ">
                        <div class="head_form">Авто</div>
                        <div class="calc_avto sec2_calc_avto row m-auto" >
                                <label for="" class="fio  with_label main">Гос номер<input name="car_number" type="text" class="calc_select " placeholder="Имя" value="<?php echo $car['car_number']?>"></label>
                                <label for="" class="fio  with_label main">Мощность двигателя
                                    <select id=""  name="car_type" class="calc_select " value="<?php echo $car['car_type']; ?>">
                                            <?php while ($cat = mysqli_fetch_assoc($data1)) {
                                            ?>
                                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['KmName']; ?></option>
                                         <?php
                                            } ?>
                                    </select>
                                </label>
                                <label for="" class="fio  with_label main">
                                    <select name="vin_type" id="" class="items_car">
                                                <?php
                                                if (isset($car['vin_type'])&&$car['vin_type']!=='') {
                                                    $vin_row = "SELECT * FROM vin WHERE id=".$car['vin_type'];
                                                    $vin_data_row = mysqli_query($bd,$vin_row);
                                                    $vin_row = mysqli_fetch_assoc($vin_data_row);
                                                ?>
                                                <option value="<?php echo $vin_row['id']?>"><?php echo $vin_row['name'] ?></option>
                                                <?php }
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
                                        <input type="text" class="calc_select "  name="vin" value="<?php echo $car['vin']?>"></label>
                                <label for="" class="fio  with_label main">
                                    <select name="sts_type" id="" class="items_car">
                                    <?php
                                    if (isset($car['sts_type'])&&$car['sts_type']!=='') {
                                        $sts_row = "SELECT * FROM sts WHERE id=".$car['sts_type'];
                                        $sts_data_row = mysqli_query($bd,$sts_row);
                                        $sts_row = mysqli_fetch_assoc($sts_data_row);
                                    ?>
                                    <option value="<?php echo $sts_row['id']?>"><?php echo $sts_row['name'] ?></option>
                                    <?php }
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
                                        <input type="text" class="calc_select " name="ctc" value="<?php echo $car['ctc']?>"></label>
                              <div class="calc_avto n_1 col-md-8" style="padding: 0;">
                                <label for="" class="fio with_label">Год выпуска
                                    <select id="" name="year" class="calc_select" value="<?php echo $car['year']; ?>">
                                        <option value="2020">2020</option>
                                    </select>
                                </label>
                                <label for="" class="fio with_label">Марка
                                    <select id="" name="car"  class="calc_select" value="<?php echo $car['car']; ?>">
                                        <option value="Каптива">Каптива</option>
                                    </select>
                                </label>
                                <label for="" class="fio with_label">Модель
                                    <select id="" name="carmodel" class="calc_select" value="<?php echo $car['carmodel']; ?>">
                                        <option value="xs">xs</option>
                                    </select></label>
                                </label>
                              </div>
                            </div>

                        </div>
                        <div class="row last">
                             <input type="submit" class="btn1" value="Сохранить изменения">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!--     <form action="result.php" method="post"  enctype="multipart/form-data">
        <?php if (isset($user['img'])) { ?>
            <img src="img/<?php echo $user['img'] ?>" alt="" width="150" class="img">
        <?php } ?>
        <input type="file" name="img">
    <div class="info">
        <div class="car">
            <?php if (isset($_COOKIE['login'])) { ?>
            <h1>Личный кабинет-<?php echo $_COOKIE['login']; ?></h1>
            <?php } ?>
                <h1>Информация об автомобиле</h1>
            <label for="number">Номерной знак
            <input type="text" id="number" placeholder="Номерной знак" name="car_number"  value="<?php echo $car['car_number']?>"></label>
            <label for="">Категория
            <select id="" disabled="disabled">
                <option value="Б">Категория Б</option>
            </select></label>
            <label for="">Цель использования
            <select id="" disabled="disabled">
                <option value="Личная">Личная</option>
            </select></label>
            <label for="">Марка
            <select id="" name="car" value="<?php echo $car['car']; ?>">
                <option value="Каптива">Каптива</option>
            </select></label>
            <label for="">Мошность л.с.
            <select id=""  name="car_type" value="<?php echo $car['car_type']; ?>">
                    <?php while ($cat = mysqli_fetch_assoc($data1)) {
                    ?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['KmName']; ?></option>
                 <?php
                    } ?>
            </select></label>
            <label for="">Модель
            <select id="" name="carmodel" value="<?php echo $car['carmodel']; ?>">
                <option value="xs">xs</option>
            </select></label>
            <label for="">Год
            <select id="" name="year" value="<?php echo $car['year']; ?>">
                <option value="2020">2020</option>
            </select></label><br><br>
            <label for="number">
                <select name="vin_type" id="" class="items_car">
                    <?php
                        $vin_row = "SELECT * FROM vin WHERE id=".$car['vin_type'];
                        $vin_data_row = mysqli_query($bd,$vin_row);
                        $vin_row = mysqli_fetch_assoc($vin_data_row)
                    ?>
                    <option value="<?php echo $vin_row['id']?>"><?php echo $vin_row['name'] ?></option>
                    <?php 
                        $vin = "SELECT * FROM vin WHERE id!=".$car['vin_type'];
                        $vin_data = mysqli_query($bd,$vin);
                        while ($cat = mysqli_fetch_assoc($vin_data)) { ?>
                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
                        <?php } ?>
                </select><input type="text" id="number" placeholder="CTC" name="vin"  value="<?php echo $car['vin']?>"></label><br><br>
            <label for="number">
                <select name="sts_type" id="" class="items_car">
                    <?php
                        $sts_row = "SELECT * FROM sts WHERE id=".$car['sts_type'];
                        $sts_data_row = mysqli_query($bd,$sts_row);
                        $sts_row = mysqli_fetch_assoc($sts_data_row)
                    ?>
                    <option value="<?php echo $sts_row['id']?>"><?php echo $sts_row['name'] ?></option>
                    <?php 
                        $sts = "SELECT * FROM sts WHERE id!=".$car['sts_type'];
                        $sts_data = mysqli_query($bd,$sts);
                        while ($cat = mysqli_fetch_assoc($sts_data)) { ?>
                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>
                        <?php } ?>
                </select>
            <input type="text" id="number" placeholder="VIN" name="ctc"  value="<?php echo $car['ctc']?>"></label>
        </div>
             <h1>Настройка профиля</h1>
            <div>  
                    <input type="text" placeholder="Имя" name="a_name" value="<?php echo  $row['name']; ?>" >
                    <input type="text" placeholder="Фамилия" name="a_surname" value="<?php echo  $row['surname']; ?>" >
                    <input type="text" placeholder="Очество" name="a_fathername" value="<?php echo $row['fathername']; ?>">
                    <input type="text" placeholder="Логин" name="login" value="<?php echo  $row['login']; ?>" >
                    <input type="text" placeholder="Телефон" name="phone" value="<?php echo  $row['phone']; ?>" >
                    <input type="text" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
                    <input type="text" placeholder="Старый пороль" name="pass" >
                    <input type="text" placeholder="Новый пороль" name="newpass">
            </div>

        <div class="users_info">
                <h1>Инфоримация о страхователя</h1>
                <label for="">Инвормация о страхователя</label>
            <div class="user">
                <input type="text" class="surname" placeholder="Фамилия" name="surname"  value="<?php echo $user['surname']; ?>">
                <input type="text" class="name" placeholder="Имя" name="name" value="<?php echo $user['name']; ?>">
                <input type="text" class="fathername" placeholder="Очество" name="fathername"  value="<?php echo $user['fathername']; ?>">
                <input type="date" class="day" placeholder="Дата рождения" name="birthday" style="text-align: center;"  value="<?php echo $user['birthday']; ?>">
                <input type="text" class="pass" placeholder="Паспорт" name="passport"  value="<?php echo $user['passport']; ?>">
                <input type="date" class="day_pass" placeholder="Дата выдачи" name="passport_date" style="text-align: center;"  value="<?php echo $user['passport_date']; ?>">
                <input type="text" class="vu" placeholder="Номер ВУ" name="vu"  value="<?php echo $user['vu']; ?>">
                <input type="date" class="day_vu" placeholder="Дата выдачи ВУ" name="date_vu" style="text-align: center;"  value="<?php echo $user['date_vu']; ?>">
            </div>
            <div class="inform">
                <input type="text" class="passport_place place" placeholder="Кем выдан" name="passport_place"  value="<?php echo $user['passport_place']; ?>">
                <input type="text" class="passport_place reg" placeholder="Регистрация" name="register"  value="<?php echo $user['register']; ?>">
            <label for="me">Я собственник<input type="checkbox" id="me" onclick="myFunction()" name="agent1"></label>
                <?php if ($row['role']==3) { ?>
                            
                    <label for="me">Я агент<input type="checkbox" id="me1" name="agent" onclick="inHide()" checked>
                    <input type="text" name="key" minlength="4" maxlength="8"  hidden class="checker">
                    </label>
                <?php }else{ ?>
                    <label for="me1">Я агент<input type="checkbox" id="me1" onclick="inHide()" name="agent">
                        <input type="text" name="key" minlength="4" maxlength="8"  hidden class="checker">
                    </label>
                <?php } ?>
            </div>
            <hr>

                <h1>Инфоримация о собственнике</h1>
                <label for="">Инвормация о собственнике</label>

            <div class="user">
                <input type="text" class="surname1" placeholder="Фамилия" name="user_surname"  value="<?php echo $user_car['surname']; ?>">
                <input type="text" class="name1" placeholder="Имя" name="user_name" value="<?php echo $user_car['name']; ?>">
                <input type="text" class="fathername1" placeholder="Очество" name="user_fathername"  value="<?php echo $user_car['fathername']; ?>">
                <input type="date" class="day1" placeholder="Дата рождения" name="user_birthday" style="text-align: center;"  value="<?php echo $user_car['birthday']; ?>">
                <input type="text" class="pass1" placeholder="Паспорт" name="user_passport"  value="<?php echo $user_car['passport']; ?>">
                <input type="date" class="day_pass1" placeholder="Дата выдачи" name="user_passport_date" style="text-align: center;"  value="<?php echo $user_car['passport_date']; ?>">
                <input type="text" class="vu1" laceholder="Номер ВУ" name="user_vu"  value="<?php echo $user['vu']; ?>">
                <input type="date" class="day_vu1" placeholder="Дата выдачи ВУ" name="user_date_vu" style="text-align: center;"  value="<?php echo $user_car['date_vu']; ?>">
            </div>
            <div class="inform">
                <input type="text" class="passport_place place1" placeholder="Кем выдан" name="user_passport_place"  value="<?php echo $user_car['passport_place']; ?>">
                <input type="text" class="passport_place reg1" placeholder="Регистрация" name="user_register"  value="<?php echo $user_car['register']; ?>">
                <label for="">Город<select name="sity" id="">
                    <?php while ($cat = mysqli_fetch_assoc($data_s)) {
                    ?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name']; ?></option>
                 <?php
                    } ?>
                </select></label>
            </div>
            
            <?php if ($user['default']==1){ ?>
            <button class="list1" style="display: none;">Список</button>
            <button class="list">Без лимита</button>
            <div class="user_info is_active"><h1>Список водителей</h1>
                <input type="text" name="default" hidden   class="default">
                <input type="text" hidden class="agent"  name="agent_num">
                
            <?php }else{ ?>
            <button class="list">Список</button>
            <button class="list1" style="display: none;">Без лимита</button>
            <div class="user_info"><h1>Список водителей</h1>
                <input type="text" name="default" hidden disabled class="default">
                <input type="text" hidden class="agent"  name="agent_num">
                
            <?php } ?>
        <?php for ($i=0; $i<=6; $i++) { echo $i+1; ?>
        <div class="user user<?php echo $i;?>">
            <input type="text" name="uname[]" class="items" placeholder="Имя" value="<?php echo $info['uname'][$i]?>">
            <input type="text" name="usurname[]" class="items" placeholder="Имя" value="<?php echo $info['usurname'][$i]?>">
            <input type="text" name="ufathername[]" class="items" placeholder="Имя" value="<?php echo $info['ufathername'][$i]?>">
            <input type="text" name="uvu[]" class="items" placeholder="Серия и номер ВУ" value="<?php echo $info['ufathername'][$i]?>">
            <label class="label" for="" style="margin-top: -20px;">Дата рождения<br><input type="date"  name="data[]"  class="items" style="width: 100%;" value="<?php echo $info['data'][$i] ?>"></label>
            <label class="label" for="" style="margin-top: -20px;">Дата выдачи<br><input type="date" name="stage[]" class="items" style="width: 100%;" value="<?php echo $info['data'][$i] ?>"></label>
        </div>
        <?php } ?>
        </div>
        </div>

    </div>
    <hr style="margin: 20px 0;">
</form> -->
    <script src="../js/main.js" defer></script>
    <?php }else{ ?>
    <h1>Вход в ЛК</h1>
    <form action="login.php" method="post">
        <input type="text" name="login" placeholder="Логин" >
        <input type="password" name="pass" placeholder="Пароль" >
        <input type="submit" name="reg" value="Войти">
    </form>
    <?php } ?>
    <script src="../js/ajax.js"></script>
<?php require('../module/footer.php') ?>
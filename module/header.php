<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<link rel="stylesheet" href="https://goldpreis.ru/css/bootstrap.min.css">
<link rel="stylesheet" href="https://goldpreis.ru/css/main.css">
<link rel="stylesheet" href="https://goldpreis.ru/css/media1.css">
<body class="body">
  <header class="header_menu">
    <div class="nav">
            <div class="container container-my">
              <div class="row">
                <a href="https://goldpreis.ru/" class="col-md-2 menu_logo">
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
                <div class="offset-md-3 col-md-3 justify-content-between menu_wrap">
                    <button class="head-btn menu dn"><a href="register/">Войти</a></button>
                    <button class="head-btn menu dn"><a href="register/">Регистрация</a></button>
                </div>
                  <?php } ?>
              </div>
            </div>
          </div>
  </header>
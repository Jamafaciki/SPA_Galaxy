<?php
require_once __DIR__ . '/src/helpers.php';
$auth = $_SESSION['user']['auth'] ?? false;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header class="header" id="header">
    <a class="header__logo" href="#">
        <img class="header__logo icon" src="img/galaxy.svg" alt="dots icon">
    </a>
    <p class="header__title">Galaxy</p>
    <nav class="header__nav">
        <a class="header__nav-item" href="../index.php">Главная</a>
        <a class="header__nav-item" href="#services">Услуги</a>
        <a class="header__nav-item" href="#contacts">Контакты</a>
    </nav>
    <div class="header__auth">
    <?php 
        if($auth){
            echo '<a class="button_header__auth login" method="post" href="./home.php" >' . getCurrentUser() . '</a>';
            echo '<a class="button_header__auth" method="post" href="src/actions/logout.php" >Выйти</a>';
            } else{
                echo  '<a class="button_header__auth" href="./login.php">Войти</a>';
                }
    ?>
    </div>
</header>
<?php
if($auth){
    if($_SESSION['user']['birthday']){
        echo '<p class = "birthday_today">' . getBirthday() . "</p>";
        } else{
        echo '<p class = "birthday">' . getBirthday() . "</p>";
        }
    }
?>
<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/1.jpg"  style="width:100%">
  <div class="text"></div>
</div>
<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/2.jpg"  style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/3.jpg"  style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/4.jpg" style="width:100%">
  <div class="text"></div>
</div>
</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
</div>


<div class="services__block" id="services">
    <div class="services__title">
        <h2>Услуги</h2>
    </div>
    <?php
    if($auth){
        echo '<div class ="timer" id="content"></div>';
        echo '<script src="/js/timer.js"></script>';
        echo '<div class="service__content_bith">';
        echo '<div class="service__content__title">';
        echo    '<p>*Название услуги*</p>';
        echo '</div>';
        echo '<img src="img/8.jpg" style="width:100%">';
        echo '<span class="service_price">*Цена*</span><span class="service_time">*Время сеанса*</span>';
        echo '</div>';
        }   
    ?>
    <script src="/js/slideshow.js"></script>
    <div class="service__content">
        <div class="service__content__title">
            <p>*Название услуги*</p>
        </div>
        <img src="img/5.jpg" style="width:100%">
        <span class="service_price">*Цена*</span><span class="service_time">*Время сеанса*</span>
    </div>
    <div class="service__content">
        <div class="service__content__title">
            <p>*Название услуги*</p>
        </div>
        <img src="img/6.jpg" style="width:100%">
        <span class="service_price">*Цена*</span><span class="service_time">*Время сеанса*</span>
    </div>
    <div class="service__content">
        <div class="service__content__title">
            <p>*Название услуги*</p>
        </div>
        <img src="img/7.jpg" style="width:100%">
        <span class="service_price">*Цена*</span><span class="service_time">*Время сеанса*</span>
    </div>
</div>   
<footer>
        <hr>
        <div class="links">
            <a href="#header">В начало</a>
            <a href="#">О компании</a>
            </div>
            <div class="contacts" id="contacts">
                <address>
                    Адрес:
                    <br>
                    г.Москва ул.Проспект 60-летия <br> Октября дом 17 <br>помещение 14
                </address>
            </div>
        
        <div class="copyright">
            <span class="copyright__info">Проект используется в учебных целях</span> ©  Все права защищены 2023
        </div>
    </footer>
</body>
</html>
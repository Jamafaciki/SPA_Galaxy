<?php
session_start();
//var_dump($_SESSION['personalpromo']);
$time = $_SESSION['personalpromo']??time();
$promo = $time - time();
$datetime = date("H:i:s", $promo); //Дата акции
if($promo==594000)
if($promo==594000){
    echo 'Для вас доступна персональная скидка 10% на услуги салона. Время действия скидки: 24:00:00';
}
if($promo >0 && $promo!=594000){
    echo 'Для вас доступна персональная скидка 10% на услуги салона. Время действия скидки: ' . $datetime;
}

?>
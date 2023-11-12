<?php
require_once __DIR__ . '/../helpers.php';

function getBirthday(){
$id = $_SESSION['user']['id']??0;
$login = trim(getCurrentUser())??null;
$birthday = giveDateBirthday($id);
$birthday_arr = explode("-", $birthday);
$birthday = $birthday_arr[2] . "." . $birthday_arr[1] . "." . $birthday_arr[0] . " " . "00:00:00";
$birthday = strtotime($birthday);
$time = time();
$year = date('Y', $time);
$year_check = $year - $birthday_arr[0] + 1;

$birthday = strtotime("$year_check year", $birthday);
$birthday = date('d.m.Y 00:00', $birthday);

$date1 = date('d.m.Y H:m', time());
$seconds = abs(strtotime($birthday) - strtotime($date1));

$days_until_birthday = floor($seconds / 86400);
if($days_until_birthday >= 365){
    $days_until_birthday -= 365;
}
if($days_until_birthday == 0){
    $_SESSION['user']['birthday'] = true;
    return "$login ! Поздравляем Ваc с Вашим днём рождения! Дарим Вам скидку 5% на все услуги салона!";
}else{
    $_SESSION['user']['birthday'] = false;
    return 'Количество дней до вашего дня рождения: "' . $days_until_birthday . '"';
    
}
}
?>
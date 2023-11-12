<?php

require_once __DIR__ . '/../helpers.php';


$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$id = giveID($login);

if (empty($login)) {
    setOldValue('login', $login);
    setValidationError('login', 'Неверный формат логина');
    setMessage('error', 'Ошибка валидации');
    redirect('../../login.php');
}

$user = existsUser($login);

if (!$user) {
    setMessage('error', "Пользователь $login не найден");
    redirect('../../login.php');
}

if (!checkPassword($login, $password)) {
    setMessage('error', 'Неверный логин или пароль');
    redirect('../../login.php');
}

$_SESSION['user']['id'] = $id;
$_SESSION['personalpromo'] = time() + 594000; //date("H:i:s", 594000) -> Даёт 24:00:00
$_SESSION['user']['auth'] = true;

$birthday = getBirthday();


redirect('/index.php');
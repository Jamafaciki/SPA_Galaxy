<?php

require_once __DIR__ . '/../helpers.php';


$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$birthday = $_POST['birthday'] ?? null;
$dateCreate = time();
if (empty($login)) {
    setValidationError('login', 'Неверное имя');
}

if (empty($password)) {
    setValidationError('password', 'Пароль пустой');
}

if ($password !== $passwordConfirmation) {
    setValidationError('password', 'Пароли не совпадают');
}

if (existsUser($login)){
    setValidationError('login', "Nickname $login уже занят!");
}

if (!empty($_SESSION['validation'])) {
    setOldValue('login', $login);
    redirect('../../registration.php');
}

$file = __DIR__ . '/../../db/users.txt';

$generate_id = generateID();

$user = [
    'login' => $login,
    'password' => md5($password),
    'id' => $generate_id,
    'dateCreate' => $dateCreate,
    'birthday' => $birthday
];

$res .= $user['login'] ."," . $user['password'] . "," .
 $user['id'] . "," . $user['dateCreate'] . "," . $user['birthday'] . ";\n";
file_put_contents($file , $res, FILE_APPEND | LOCK_EX);

redirect('../../login.php');

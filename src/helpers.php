<?php

session_start();

require_once __DIR__ . '/functions/existsUser.php';
require_once __DIR__ . '/functions/checkPassword.php';
require_once __DIR__ . '/functions/getCurrentUser.php';
require_once __DIR__ . '/functions/getUsersList.php';
require_once __DIR__ . '/actions/birthday.php';
function redirect(string $path)
{
    header("Location: $path");
    die();
}

function setValidationError(string $fieldName, string $message): void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr(string $fieldName): string
{
    return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName): string
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function setOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function logout(): void
{
    unset($_SESSION['user']['id']);
    redirect('../index.php');
}

function checkAuth(): void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('../login.php');
    }
}

function checkGuest(): void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('../index.php');
    }
}

function generateID(): int
{
    $file = 'C:\ospanel\domains\spagalaxy\db\users.txt';
    $current = file_get_contents($file);
    $count_users = explode(";", $current);
        if(empty($count_users[0])){
            $generate_id = 1;
        } else {
            $generate_id = count($count_users);
        }
    return $generate_id;
}

function giveID($login): int
{
    $users = getUsersList();
    $count = generateID() - 1;
        for($i = 0;$i < $count; $i++){
            if($users[$i]['login'] == $login){
                return $users[$i]['id'];
            }
        }
    return 0;
}

function giveDateCreate($id): int
{
        $users = getUsersList();
        $count = generateID() - 1;
        for($i = 0;$i < $count; $i++){
            if($users[$i]['id'] == $id){
                return $users[$i]['dateCreate'];
            }
        }
    return 0;
}

function giveDateBirthday($id): string
{
    $users = getUsersList();
    $count = generateID() - 1;
        for($i = 0;$i < $count; $i++){
            if($users[$i]['id'] == $id){
                return $users[$i]['birthday'];
            }
        }
    return '0';
}

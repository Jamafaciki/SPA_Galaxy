<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();

$user = getCurrentUser();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="card home">
    <h1>Привет, <?php echo $user ?>!</h1>
        <?php echo '<p class = "birthday_today">' . getBirthday() . "</p>";?>
        <?php require_once __DIR__ . '/src/actions/timer.php' ;?>
    <form action="src/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
        <a href="./index.php">&larr; На главную</a>
    </form>
</div>


</body>
</html>
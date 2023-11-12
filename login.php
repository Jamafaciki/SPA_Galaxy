<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
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

<form class="card" action="src/actions/login.php" method="post">
    <h2>Вход</h2>

    <?php if(hasMessage('error')): ?>
        <div class="notice error"><?php echo getMessage('error') ?></div>
    <?php endif; ?>

    <label for="login">
        Имя
        <input type="text" id="login" name="login" placeholder="Nickname" value="<?php echo old('login') ?>"
            <?php echo validationErrorAttr('login'); ?>>
        <?php if(hasValidationError('login')): ?>
            <small><?php echo validationErrorMessage('login'); ?></small>
        <?php endif; ?>
    </label>

    <label for="password">
        Пароль
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******"
        >
    </label>

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
    <a href="./index.php">&larr; Назад</a>
</form>

<p>У меня еще нет <a href="./registration.php">аккаунта</a></p>

<script src="assets/app.js"></script>
<?php getUsersList();?>
</body>
</html>
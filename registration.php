<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>

    <label for="login">
        Логин
        <input
            type="text"
            id="login"
            name="login"
            placeholder="Nickname"
            value="<?php echo old('login') ?>"
            <?php echo validationErrorAttr('login'); ?>
        >
        <?php if(hasValidationError('login')): ?>
            <small><?php echo validationErrorMessage('login'); ?></small>
        <?php endif; ?>
    </label>

    <label for="birthday">
        Дата рождения
        <input
            type="date"
            id="birthday"
            name="birthday"
            placeholder="01.01.1970"
            value="<?php echo old('birthday') ?>"
            <?php echo validationErrorAttr('birthday'); ?>
        >
        <?php if(hasValidationError('birthday')): ?>
            <small><?php echo validationErrorMessage('birthday'); ?></small>
        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
                <?php echo validationErrorAttr('password'); ?>
            >
            <?php if(hasValidationError('password')): ?>
                <small><?php echo validationErrorMessage('password'); ?></small>
            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******"
            >
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>

<p>У меня уже есть <a href="./login.php">аккаунт</a></p>

<script src="js/app.js"></script>
</body>
</html>
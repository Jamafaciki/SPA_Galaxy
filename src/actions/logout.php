<?php

require_once __DIR__ . '/../helpers.php';

    unset($_SESSION);
    //unset($_COOKIE);
    session_destroy();

redirect('/../../index.php');
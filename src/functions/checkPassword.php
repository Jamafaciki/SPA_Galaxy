<?php
function checkPassword($login, $password){

    $password = md5($password);
    
    $path = __DIR__ . '/../../db/users.txt';
    $file = file_get_contents($path);

        if(empty($file)){
            return "Нет ни одного зарегистрированного пользователя";
            }

        $users = explode(";" , $file);

        foreach($users as $value){
            $separation = explode("," , $value);
            if(empty($separation[1])){
                break;
                }
            if($login == trim($separation[0]) && $password == $separation[1]){
                    return true;
                }
            }
        return false;
}
?>
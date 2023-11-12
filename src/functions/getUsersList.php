<?php

    function getUsersList(){
        $path = __DIR__ . '/../../db/users.txt';
        $file = file_get_contents($path);
        if(empty($file)){
            return "Нет ни одного зарегистрированного пользователя";
        }
        $users_old = explode(";" , $file);
        $users = [];
        $i = 0;
        foreach($users_old as $value){
            $separation = explode("," , $value);
            if(empty($separation[1])){
                break;
                }
            $users[$i]['login'] = trim($separation[0]);
            $users[$i]['hash_password'] = $separation[1];
            $users[$i]['id'] = $separation[2];
            $users[$i]['dateCreate'] = $separation[3];
            $users[$i]['birthday'] = $separation[4];
            $i++;
            }
        return $users;
    }
?>
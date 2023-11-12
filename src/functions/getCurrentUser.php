<?php
function getCurrentUser(){
    session_start();
    $id = $_SESSION['user']['id'] ?? false;
    if(!$id){
        return false;
    }
    
    $path = __DIR__ . '/../../db/users.txt';
    $file = file_get_contents($path);

    if(empty($file)){
        return false;
    }

    $users = explode(";" , $file);

    foreach($users as $value){
        $separation = explode("," , $value);
        if(empty($separation[1])){
            break;
            }
        if(trim($separation[2]) == $id){
            return trim($separation[0]);
            }
        }
    return false;
}
?>
<?php

require CORE . '/classes/Db.php';

$name  = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date  = $_POST['date'];
$password = $_POST['password'];



if(empty($name) || empty($phone) || empty($email) || empty($date) || empty($password)){
    echo "пустая строка";
}else{
    $bd = new Db;
    if($bd->chec_copy($phone, $email) == true){

        $bd->add_user($name, $phone, $email, $date, password_hash($password, PASSWORD_DEFAULT));
        header("Location: /");
    }
    
}



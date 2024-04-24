<?php
require CORE . '/classes/Db.php';


$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
    echo "они пустые";
}
else{
    $bd = new Db;
    $bd->chec_user($email, $password);
        
    
}
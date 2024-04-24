<?php
require_once CORE . '/classes/Db.php'; 
session_start();
$user_id = $_SESSION['id'];
$i = 0;


$bd = new Db;

$getUser = "SELECT * FROM `cars` WHERE `user_id` = '$user_id'";

$result = $bd->conn->prepare($getUser);

$result->execute();

if($result->rowCount() > 0){
    foreach($result as $row){
        $id_tovars = $row["tovar_id"];
        $a = "cout" . $i++;
        $cout = $_POST[$a];
        echo $cout;
        $bd->plus_cout($cout, $user_id, $id_tovars);
    }

}
header("Location: /cars");
<?php
require CORE . '/classes/Db.php';

$nameTovars = $_POST["name"];
$price = $_POST["price"];
$cout = $_POST["cout"];
$description = $_POST["description"];
$property = $_POST["property"];
$category = $_POST["category"];
$img = $_FILES["img"];


$type = $img['type'];
    $name = md5(microtime()).'.'.substr($type, strlen("image/"));
    $dir = '../public/img/';
    $uploutfile = $dir.$name;

    if(move_uploaded_file($img['tmp_name'], $uploutfile)){
        $imgname = $name;
    }
    


$bd = new DB;
if(empty($name) || empty($price) ||empty($cout) ||empty($description) ||empty($property) ||empty($category) ||empty($img)){
    echo"бро ты указал не все параметры";
}else{
    $bd->add_tovars($nameTovars, $price, $cout, $description, $property, $category, $imgname);
    echo"все успешно бро";
    echo $imgname;
    header('Location: /');
}
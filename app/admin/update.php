<?php
require CORE . '/classes/Db.php';

$bd = new Db;

$idTovar = $_POST["id"];
$nameTovars = $_POST["name"];
$price = $_POST["price"];
$cout = $_POST["cout"];
$haracter = $_POST["description"];
$opisanie = $_POST["property"];
$kategoriy = $_POST["category"];
$img = $_FILES["img"];

if(empty($nameTovars) || empty($price) ||empty($cout) ||empty($haracter) ||empty($opisanie) ||empty($kategoriy)){
    echo"бро ты указал не все параметры";
}else{
    if(empty($img['name'])){

        $bd->update_noimg($idTovar, $nameTovars, $kategoriy, $price, $cout, $haracter, $opisanie);
    }
    elseif(!empty($img['name'])){
        $type = $img['type'];
    $nameImg = md5(microtime()).'.'.substr($type, strlen("image/"));
    $dir = '../public/img/';
    $uploutfile = $dir.$nameImg;

    if(move_uploaded_file($img['tmp_name'], $uploutfile)){
        $imgname = $nameImg;
    }
        $getUser = "SELECT * FROM `tovar` WHERE `id` = '$idTovar'";

        $result = $bd->conn->prepare($getUser);

        $result->execute();
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                unlink('../public/img/' . $row["img"]);
            }
        }

    $bd->update($idTovar, $nameTovars, $imgname, $kategoriy, $price, $cout, $haracter, $opisanie);
    }
    
    
    echo"все успешно бро";
    
}
    


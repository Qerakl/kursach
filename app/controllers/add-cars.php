<?php 
require_once CORE . '/classes/Db.php'; 
session_start();
$idTovar = $_SESSION['cars'];
$idUser = $_SESSION['id'];
$cout = $_POST['cout'];
$tovarname = $_SESSION['tovarname'];
$tovarimg = $_SESSION['tovarimg'];
$tovarprice = $_SESSION['tovarprice'];
$bd = new Db;

$getTovar = "SELECT * FROM `cars` WHERE `user_id` = '$idUser' AND `tovar_id` = '$idTovar'";

$result_tovar = $bd->conn->prepare($getTovar);

$result_tovar->execute();

if($result_tovar->rowCount() > 0){
    foreach($result_tovar as $tovar_row){
        $n = $tovar_row["cout"];
        $sum = $n + $cout;
        $sql = "UPDATE cars SET cout = '$sum' WHERE user_id = '$idUser' AND tovar_id = '$idTovar'";
        $affectedRowsNumber = $bd->conn->exec($sql);
        echo "Обновлено строк: $affectedRowsNumber";
    }
}
else{
    $bd->add_cars($idTovar, $idUser, $cout, $tovarname, $tovarimg, $tovarprice);
    echo "все добавлено";

}

header("Location: /cars");


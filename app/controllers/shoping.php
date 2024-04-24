<?php
require CORE . '/classes/Db.php';
session_start();

$bd = new Db;
$user_id = $_SESSION["id"];
$user_name = $_SESSION["name"];
$user_phone = $_SESSION["phone"];

$getUser = "SELECT * FROM `cars` WHERE `user_id` = '$user_id'";

$result = $bd->conn->prepare($getUser);

$result->execute();
if ($result->rowCount() > 0) {
    foreach ($result as $row) {
        $tovar_id = $row["tovar_id"];
        $tovar_name = $row["name"];
        $tovar_cout = $row["cout"];
        $tovar_price = $row["price"];
        $tovar_img = $row["img"];
        $tovar_result = "в обработке";

        $getTovar = "SELECT * FROM `ordera` WHERE `user_id` = '$user_id,' AND `tovar_id` = '$tovar_id'";

        $result_tovar = $bd->conn->prepare($getTovar);

        $result_tovar->execute();

        if ($result_tovar->rowCount() > 0) {
            foreach ($result_tovar as $tovar_row) {
                $n = $tovar_row["cout"];
                $sum = $n + $tovar_cout;
                $sql = "UPDATE ordera SET cout = '$sum' WHERE user_id = '$user_id' AND tovar_id = '$tovar_id'";
                $affectedRowsNumber = $bd->conn->exec($sql);
                $bd->update_bd($tovar_cout, $tovar_id);
                $bd->del_all($user_id);
                echo "Обновлено строк: $affectedRowsNumber";
            }
        }
        else{
            $bd->add_order($tovar_id, $user_id, $user_name, $user_phone, $tovar_name, $tovar_cout, $tovar_price, $tovar_img, $tovar_result);
            $bd->update_bd($tovar_cout, $tovar_id);
            $bd->del_all($user_id);
        }
    }
}
header("Location: /order");
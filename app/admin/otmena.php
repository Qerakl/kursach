<?php
require CORE . '/classes/Db.php';

$user_id = $_GET['id'];


$bd = new Db;

$getTovar = "SELECT * FROM `ordera` WHERE `user_id` = '$user_id,'";

$result_tovar = $bd->conn->prepare($getTovar);

$result_tovar->execute();

if ($result_tovar->rowCount() > 0) {
    foreach ($result_tovar as $row) {
        $tovar_id = $row["tovar_id"];
        $tovar_cout = $row["cout"];
        $bd->update_tovar($tovar_id, $tovar_cout);
        $bd->del_order($user_id);
    }
}

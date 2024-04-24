<?php
require_once CORE . '/classes/Db.php'; 
session_start();

$user_id = $_SESSION['id'];
$tovar_id = $_GET['id'];
$bd = new Db;
$bd->del_cars($user_id, $tovar_id);
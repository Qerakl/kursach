<?php
require CORE . '/classes/Db.php';

$user_id = $_GET['id'];
$bd = new Db;

$bd->del_order($user_id);

<?php
require CORE . '/classes/Db.php';
$name = $_POST["search"];
$bd = new Db;
$bd->search_tovar($name);
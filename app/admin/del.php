<?php
require CORE . '/classes/Db.php';

$bd = new Db;

$idTovar = $_GET["id"];

$bd->del_tovar($idTovar);
    


<?php require_once VIEWSADMIN . '/tovar.tpl.php';
require CORE . '/funcs.php';
if($_SESSION['rank'] != "admin"){
    abort();
}

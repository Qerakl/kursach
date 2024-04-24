<?php
function abort($code = 404){
   html_entity_decode($code);
   require VIEWS . "/errors/{$code}.tpl.php";
   die;
}
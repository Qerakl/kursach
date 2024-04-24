<?php

require CONFIG . '/routes.php';

session_start();

$uri = trim(parse_url(($_SERVER['REQUEST_URI']))['path'], '/');

if(array_key_exists($uri, $routes)){
    if(file_exists(CONTROLLERS . "/{$routes[$uri]}")){
        require CONTROLLERS . "/{$routes[$uri]}";
    }
    elseif(file_exists((USER . "/{$routes[$uri]}"))){
        require USER . "/{$routes[$uri]}";
    }
    elseif($_SESSION['rank'] == "admin"){
        if(file_exists((ADMIN . "/{$routes[$uri]}"))){
            require ADMIN . "/{$routes[$uri]}";
        }
    }
    else{
        abort();
    }
}
else{
    abort();
}

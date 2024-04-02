<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/style/style.css">
    
    <style>
        <?php require "../public/style/style.css"; ?>
       
    </style>
    
</head>

<body>
    <header>
        <div class="header">
            <div class="conteiner">
                <div class="logotip">
                    <a href="/" class="logo">
                        <h1>VAPESHOP</h1>
                    </a>

                    <div class="list">
                        <div class="list_word">
                            <li><a href="catalog" class="list">каталог |</a></li>
                        </div>
                        <div class="list_word">
                            <li><a href="garant" class="list">гарантия |</a></li>
                        </div>
                        <div class="list_word">
                            <li><a href="contacts" class="list">контакты |</a></li>
                        </div>
                        <?php if (!empty($_SESSION['email'])) {
                            if($_SESSION['rank'] == "admin"){ ?>
                                <div class="list_word">
                                    <li><a href="admin" class="list">Админка</a></li>
                                </div> <?php
                            } else{  ?>
                        <div class="list_word">
                            <li><a href="setings" class="list">Профиль</a></li>
                        </div><?php
                            }
                         } else{ ?>
                        <div class="list_word">
                            <li><a href="aut-reg" class="list">Вход в аккаунт</a></li>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="contact_number" class="list">
                        <h2><a href="#" class="cont_num">+7(999)999-99-99</a></h2>
                    </div>
                    <a href="#">
                        <div class="contact_number_info" class="list">
                            <h2 style="color: white; font-size: 15px; padding-top: 3px; margin-right: 2px;" >i</h2>
                        </div>
                    </a>
                </div>
                <div class="nev"></div>
                <form action="">
                    <div class="search"><input type="search" class="search" placeholder="    Найти"><input type="submit"
                            value="Поиск" class="btn_search"></div>
                </form>
                
            </div>
        </div>
    </header>
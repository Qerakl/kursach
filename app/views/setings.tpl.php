<?php require VIEWS . '/incs/header.php'

    ?>

<main>
    <div class="main">
        
        <div class="conteiner">
        <div class="flex">
            <form action="" class="profile" id="profile" method="post">
                <div class="form_conteiner">
                    <P>&nbsp</P>
                    
                    <div class="label_input">
                        
                        <p>
                            <?php if (empty($_SESSION['name'])) {
                               ?><h1> <?php echo "кажется вы вышли из аккаунта";?> </h1> <?php
                               
                               die();
                                

                            } else {
                                ?> <label>
                                <h2>Данные пользователя</h2>
                            </label> <P>&nbsp</P><?php
                                ?> <p><label>Имя:</label></p> <?php
                                echo $_SESSION['name'];
                            } ?>
                        </p>
                    </div>
                    <div class="label_input">
                        <p><label>Номер телефона</label></p>
                        <p>
                            <?php if (empty($_SESSION['phone'])) {
                                die();


                            } else {
                                echo $_SESSION['phone'];
                            } ?>
                        </p>
                    </div>
                    <div class="label_input">
                        <p><label>Электроная почта</label></p>
                        <p> <?php if(empty($_SESSION['email'])){
                       die();
                        
                        
                       }else{echo $_SESSION['email'];} ?> </p>
                    </div>
                    <div class="label_input">
                        <p><label>Дата рождения</label></p>
                        <p> <?php if(empty($_SESSION['date'])){
                       die();
                        
                        
                       }else{echo $_SESSION['date'];} ?> </p>
                    </div>

                    

                    <input type="submit" placeholder="Регистрация" class="btn_reg" value="Сохранить"><br>
                    
                    
                </div>
                
            </form>


            </form>
            <form action="" class="vape_menu">
                    <a  href="cars"><div class="text_vape_menu">
                        <h4>Корзина<h4>
                    </div></a>
                    <a  href="order"><div class="text_vape_menu" >
                        <h4>Мои заказы</h4>
                    </div></a>
                   
                </form></div>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
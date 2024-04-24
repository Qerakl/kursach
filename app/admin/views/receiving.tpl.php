<?php require VIEWS . '/incs/header.php';
require CORE . '/classes/Db.php';


?>


<main>
    <div class="main">

        <div class="conteiner">
            <form action="order-result" class="order" method="post" id="input">

                <label>
                    Введите ордер покупки
                </label>
                <div><input class="order" type="text" name="order"></div><br>
                <input type="submit" class="btn_order" value="Поиск заказа">

            </form>

        
        </div>
    </div>
</main>
<footer></footer>

</body>

</html>
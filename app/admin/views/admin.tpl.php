<?php require VIEWS . '/incs/header.php' ?>

<main>
    <div class="main">

        <div class="conteiner">
            <form method="post" id="admin_menu" class="admin_menu">
                <div class="form_conteiner">
                    <P>&nbsp</P>
                    <label>
                        <h2>Меню администратора</h2>
                    </label>
                    <P>&nbsp</P>

                    <p><label>
                            <h3>id</h3>
                        </label></p>
                    <?php echo $_SESSION['id']; ?>
                    <p>&nbsp</p>

                    <p><label>
                            <h3>Имя</h3>
                        </label></p>
                    <?php echo $_SESSION['name']; ?>
                    <p>&nbsp</p>

                    <p><label>
                            <h3>email</h3>
                        </label></p>
                    <?php echo $_SESSION['email']; ?>
                    <p>&nbsp</p>
                    <div class="privilegion">
                        <h4><a href="tovar">Добавить товар</a>
                        <p>&nbsp</p>
                        <a href="receiving">Прием заказов</a></h4>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
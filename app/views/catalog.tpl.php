<?php require VIEWS . '/incs/header.php';

?>


<main>
    <div class="main">

        <div class="conteiner">
            <P>&nbsp</P>
            <P>&nbsp</P>
            <P>&nbsp</P>
            <h2><label class="aut-reg" style="color: yellow;">Каталог товара</label></h2>

            <div class="cont_vape">
                <form action="" class="vape_menu">
                    <div class="text_vape_menu" onclick="OpenFormPod()">
                        <h4>POD-система</h4>
                    </div>
                    <div class="text_vape_menu" onclick="OpenFormGoo()">
                        <h4>Жижа</h4>
                    </div>
                    <div class="text_vape_menu" onclick="OpenFormSingle()">
                        <h4>Одноразоввые вейпы</h4>
                    </div>
                </form>

                <form class="form_shoping" id="shoping">

                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");
                    $getUser = "SELECT * FROM `tovar`";

                    $result = $conn->prepare($getUser);

                    $result->execute();
                    if ($result->rowCount() > 0) {
                        foreach ($result as $row) {
                            ?>

                            <a href="/info-tovars?id=<?php echo $row["id"] ?>">
                            <div class=" tovars">
                                <img class="tovars_foto" src="../public/img/<?php echo $row["img"] ?>">
                                <?php echo $row["name"] ?>
                                <div class="price">

                                    <h3>
                                        <?php echo $row["price"] . " Рублей" ?>
                                    </h3>
                                </div>
                    </div>
                    </a>



                    <?php
                        }
                    }


                    ?>



                </form>
                <form action="info-tovars" class="podiki" id="podiki" method="get">
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");
                    $getUser = "SELECT * FROM `tovar` WHERE category='pod'";

                    $result = $conn->prepare($getUser);

                    $result->execute();
                    if ($result->rowCount() > 0) {
                        foreach ($result as $row) {
                            ?>

                            <a href="/info-tovars?id=<?php echo $row["id"] ?>">
                            <div class=" tovars">
                                <img class="tovars_foto" src="../public/img/<?php echo $row["img"] ?>">
                                <?php echo $row["name"] ?>
                                <div class="price">

                                    <h3>
                                        <?php echo $row["price"] . " Рублей" ?>
                                    </h3>
                                </div>
                    </div>
                    </a>



                    <?php
                        }
                    }


                    ?>
            </form>

            <form action="info-tovars" class="single" id="single" method="get">
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");
                $getUser = "SELECT * FROM `tovar` WHERE category='single'";

                $result = $conn->prepare($getUser);

                $result->execute();
                if ($result->rowCount() > 0) {
                    foreach ($result as $row) {
                        ?>

                        <a href="/info-tovars?id=<?php echo $row["id"] ?>"">
                            <div class=" tovars">
                            <img class="tovars_foto" src="../public/img/<?php echo $row["img"] ?>">
                            <?php echo $row["name"] ?><br>&nbsp;<br>&nbsp;
                            <h3>
                                <?php echo $row["price"] . " Рублей" ?>
                            </h3>
                </div>
                </a>



                <?php
                    }
                }


                ?>
        </form>

        <form action="" class="goo" id="goo" method="get">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");
            $getUser = "SELECT * FROM `tovar` WHERE category='goo'";

            $result = $conn->prepare($getUser);

            $result->execute();
            if ($result->rowCount() > 0) {
                foreach ($result as $row) {
                    ?>

                    <a href="/info-tovars?id=<?php echo $row["id"] ?>">
                        <div class="tovars">
                            <img class="tovars_foto" src="../public/img/<?php echo $row["img"] ?>">
                            <?php echo $row["name"] ?><br>&nbsp;<br>&nbsp;
                            <h3>
                                <?php echo $row["price"] . " Рублей" ?>
                            </h3>
                        </div>
                    </a>



                    <?php
                }
            }


            ?>
        </form>
    </div>
    </div>
</main>
<footer><?php require VIEWS . '/incs/footer.php' ?></footer>

</body>

</html>
<script>
    let formPod = document.getElementById('podiki');
    let formShoping = document.getElementById('shoping');
    let formSingle = document.getElementById('single');
    let formGoo = document.getElementById('goo');
    function OpenFormPod() {
        formPod.style.display = "flex";
        formShoping.style.display = "none";
        formSingle.style.display = "none";
        formGoo.style.display = "none";
    }
    function OpenFormSingle() {
        formSingle.style.display = "flex";
        formShoping.style.display = "none";
        formPod.style.display = "none";
        formGoo.style.display = "none";
    }
    function OpenFormGoo() {
        formSingle.style.display = "none";
        formShoping.style.display = "none";
        formPod.style.display = "none";
        formGoo.style.display = "flex";
    }
</script>
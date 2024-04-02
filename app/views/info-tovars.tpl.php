<?php require VIEWS . '/incs/header.php';
require CORE . '/classes/Db.php';
session_start();
?>

<?php
$bd = new Db;

$id = $_GET["id"];


$conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");
$getUser = "SELECT * FROM `tovar` WHERE id=$id";

$result = $conn->prepare($getUser);

$result->execute(); ?>
<?php

if ($result->rowCount() > 0) {
    foreach ($result as $row) {

    }
}
?>

<main>
    <div class="main">

        <div class="conteiner">
            <div class="info_tovars">
                <div class="cont_tovars">
                    <p><label class="tovars">
                            <h1 style="color: yellow;">
                                <?php echo $row["name"] ?>
                            </h1>
                        </label>
                    </p>
                    <p>&nbsp</p>
                    <p><label><a href="#">В избраное</a></label> &nbsp&nbsp&nbsp&nbsp<label>id товара:
                            <?php echo $row["id"] ?>
                        </label></p>
                    <p>&nbsp</p>
                    <hr>
                    <p>&nbsp</p>
                    <p>&nbsp</p>
                    <div class="flex_co">
                        <img class="foto_tovar" src="../public/img/<?php echo $row["img"] ?>">
                        <div class="info">
                            <p>
                                <?php echo $row["description"]; ?>
                            </p>
                            <p>
                                <?php echo $row["property"]; ?>
                            </p>

                        </div>
                        <form action="add-cars" class="poocupka" method="post">

                            <div style="display:flex;"><?php
                             if( $row["cout"] > 0){
                                ?>
                                <div class="number">
                                    <button class="number-minus" type="button"
                                        onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();">-</button>
                                    <input type="number" min="1" class="cout_tovar"
                                    max="<?php echo $row["cout"]; ?>" value="1" name="cout" readonly>
                                    <button class="number-plus" type="button"
                                        onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();">+</button>
                                </div>
                                <h2 style="margin-left:20px; margin-top:26px;">
                                    <?php echo $row["price"] . " Рублей"; ?>
                                </h2>
                                <?php
                            }
                            ?>
                                
                            </div>
                            <div class="aut_text"><b>ЧТОБЫ ОФОРМИТЬ ЗАКАЗ, НЕОБХОДИМО<br>
                                    <font color="yellow">АВТОРИЗОВАТЬСЯ</font> НА САЙТЕ<br> И ПОДТВЕРДИТЬ ВОЗРАСТ!
                                </b></div>
                            <?php
                            if(!empty($_SESSION["id"])){ ?>
                                <?php 
                                
                                if( $row["cout"] < 1){
                                    ?>
                                    <div class="in" style="margin-top:50px; color:red;"><h4>*Данный товар отсутствует</h3></div>
                                    <?php
                                }
                                else{
                            ?>
                            <div class="in"><input type="submit" class="btn_shoping" value="Забронировать"
                                    onclick="<?php $_SESSION["cars"] = $row["id"]; $_SESSION["tovarname"] = $row["name"]; $_SESSION["tovarimg"] = $row["img"]; $_SESSION["tovarprice"] = $row["price"];?>"></div>
                            <?php
                           }
                           if($_SESSION["rank"] == 'admin'){
                            ?><div class="flex-red">
                                <a href="update_tovar?id=<?php echo $row["id"];?>">Изменить</a>
                                <a href="del?id=<?php echo $row["id"];?>" class="del">Удалить</a>
                            </div><?php
                            }
                            }
                            ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
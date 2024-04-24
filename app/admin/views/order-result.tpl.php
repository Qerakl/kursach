<?php require VIEWS . '/incs/header.php';
require CORE . '/classes/Db.php';

$user_id = $_POST['order'];

$sum_tovar = 0;
$sumtovars = 0;
$cout_tovar = 0;

$bd = new Db;
$getTovar = "SELECT * FROM `ordera` WHERE `user_id` = '$user_id,'";

$result_tovar = $bd->conn->prepare($getTovar);

$result_tovar->execute();

if ($result_tovar->rowCount() > 0) {
    foreach ($result_tovar as $row) {
        $sum_tovar += $row["price"] * $row["cout"];
        $cout_tovar += $row["cout"];
    }
}
?>


<main>
    <div class="main">

        <div class="conteiner">
                <h2 style="color: yellow; margin-top: 30px;">Заказ</h2>
            <div class="result" id="result">

                <table class="tabl">
                    <h1 style="color: white; text-align: center; margin-top:30px;">Данные заказа</h1>
                    <tr>
                        <td class="rigth">Ордер заказа:</td>
                        <td>
                            <?php echo $row["user_id"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rigth">Сумма заказа:</td>
                        <td>
                            <?php echo $sum_tovar . " Рублей"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rigth">Количество товаров:</td>
                        <td>
                            <?php echo $cout_tovar; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rigth">Имя покупателя:</td>
                        <td>
                            <?php echo $row["user_name"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rigth">Номер покупателя:</td>
                        <td>
                            <?php echo $row["user_phone"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rigth">Самовывоз:</td>
                        <td>
                            г. Челябинск, ул. Пушкина, д. 35Б
                        </td>
                    </tr>

                </table>

                <table class="tabl">
                    <h1 style="color: white; text-align: center; margin-top:30px;">Позиция заказа</h1>
                    <tr>
                    <td class="order_tovar">
                            <h3>Фото </h3>
                        </td>
                        <td class="order_tovar">
                            <h3>Товар </h3>
                        </td>
                        <td class="order_price">
                            <h3>Цена </h3>
                        </td>
                        <td class="order_cout">
                            <h3>Кол-во </h3>
                        </td>
                        <td class="order_all_cout">
                            <h3>Общая цена</h3>
                        </td>
                    </tr>
                    <?php
                    $Tovar = "SELECT * FROM `ordera` WHERE `user_id` = '$user_id,'";

                    $result = $bd->conn->prepare($Tovar);

                    $result->execute();

                    if ($result->rowCount() > 0) {
                        foreach ($result as $tovar_row) {
                            $sum = $tovar_row["price"] * $tovar_row["cout"];
                            $sumtovars += $sum;
                            ?>
                            <tr>
                            <td class="">
                                    <img src="../public/img/<?php echo $tovar_row["img"]; ?>" class="order-foto">
                                </td>
                                <td class="tdd">
                                    <?php echo $tovar_row["tovar_name"]; ?>
                                </td>
                                <td class="tdd">
                                    <?php echo $tovar_row["price"]; ?>
                                </td>
                                <td class="tdd">
                                    <?php echo $tovar_row["cout"]; ?>
                                </td>
                                <td class="tdd">
                                    <?php echo $tovar_row["price"] * $tovar_row["cout"]; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>

                    <table class="tab">

                        <tr>
                            <td class="order_tovar">
                                <h3>Итого:</h3>
                            </td>
                            <td class="order_price">
                                <h3>
                                    <?php echo $sumtovars; ?>
                                </h3>
                            </td>

                        </tr>
                    </table>


                </table>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                <a href="otmena?id=<?php echo $row["user_id"];?>"><input type="submit" value="Отмена заказа" class="btn_order"></a>
                <a href="shop?id=<?php echo $row["user_id"];?>"><input type="submit" value="Заказ выдан" class="btn_order"></a>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </div>


        </div>
    </div>
</main>
<footer></footer>

</body>

</html>
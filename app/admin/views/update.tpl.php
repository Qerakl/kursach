<?php require VIEWS . '/incs/header.php';

$bd = new Db;

$idTovar = $_GET["id"];
$getUser = "SELECT * FROM `tovar` WHERE `id` = '$idTovar'";

$result = $bd->conn->prepare($getUser);

$result->execute();

        
   
?>

<main>
    <div class="main">

        <div class="conteiner">
            <form action="update" method="post" class="add_tovars" enctype="multipart/form-data">
                <div class="form_conteiner">
                    <P>&nbsp</P>
                    <label>
                        <h2>Изменение товара</h2>
                    </label>
                    <P>&nbsp</P>
                <?php
                if ($result->rowCount() > 0) {
                    foreach ($result as $row) {
                ?><?php
            }
           }?>
                    <div class="cont_full">
                        <div class="cont_menu">
                        <div class="label_input">
                                <p><label>id товара</label></p>
                                <input type="text" class="add_name" value="<?php echo $idTovar;?>" name="id" id="name">
                            </div>
                            <div class="label_input">
                                <p><label>Название товара</label></p>
                                <input type="text" class="add_name" value="<?php echo $row["name"];?>" name="name" id="name">
                            </div>
                            <div class="label_input">
                                <p><label>Фото товара</label></p>
                                <input type="file" class="add_img" value="<?php echo $row["img"];?>" name="img" id="img">
                            </div>


                            <div class="label_input">
                                <p><label>Категория товара</label></p>
                                <input type="text" class="add_name" value="<?php echo $row["category"];?>" name="category">
                            </div>
                            <div class="label_input">
                                <p><label>Цена</label></p>
                                <input type="number" min="0" class="add_price" value="<?php echo $row["price"];?>" name="price">
                            </div>

                            <div class="label_input">
                                <p><label>Количество</label></p>
                                <input type="number" min="0" class="add_cout" value="<?php echo $row["cout"];?>" name="cout">
                            </div>
                        </div>

                        <div class="cont_tovar">

                            <div class="add_input">
                                <p><label>Характеристика товара</label></p>
                                <textarea class="description" name="property"><?php echo $row["property"];?></textarea>
                            </div>

                            <div class="add_input">
                                <p><label>Описание товара</label></p>
                                    <textarea class="description" name="description"><?php echo $row["description"];?></textarea>
                            </div>

                        </div>

                    </div>
                    <input type="submit" placeholder="Регистрация"  class="btn_reg" value="Изменить"><br>
                </div>
                
            </form>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
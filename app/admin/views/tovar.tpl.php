<?php require VIEWS . '/incs/header.php' ?>

<main>
    <div class="main">

        <div class="conteiner">
            <form action="add-tovars" method="post" class="add_tovars" enctype="multipart/form-data">
                <div class="form_conteiner">
                    <P>&nbsp</P>
                    <label>
                        <h2>Добавление товара</h2>
                    </label>
                    <P>&nbsp</P>

                    <div class="cont_full">
                        <div class="cont_menu">
                            <div class="label_input">
                                <p><label>Название товара</label></p>
                                <input type="text" class="add_name" placeholder="   Товар" name="name" id="name">
                            </div>
                            <div class="label_input">
                                <p><label>Фото товара</label></p>
                                <input type="file" class="add_img" name="img" id="img">
                            </div>


                            <div class="label_input">
                                <p><label>Категория товара</label></p>
                                <input type="text" class="add_name" placeholder="   категория" name="category">
                            </div>
                            <div class="label_input">
                                <p><label>Цена</label></p>
                                <input type="number" min="0" class="add_price" placeholder="   Ценф" name="price">
                            </div>

                            <div class="label_input">
                                <p><label>Количество</label></p>
                                <input type="number" min="0" class="add_cout" value="   кол-во" name="cout">
                            </div>
                        </div>

                        <div class="cont_tovar">

                            <div class="add_input">
                                <p><label>Характеристика товара</label></p>
                                <textarea class="description" name="property"></textarea>
                            </div>

                            <div class="add_input">
                                <p><label>Описание товара</label></p>
                                    <textarea class="description" name="description"></textarea>
                            </div>

                        </div>

                    </div>
                    <input type="submit" placeholder="Регистрация" class="btn_reg" value="Добавить"><br>
                </div>
            </form>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
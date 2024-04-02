<?php require VIEWS . '/incs/header.php' ?>


<main>
    <div class="main">

        <div class="conteiner">
        <div class="logo_aut-reg"><h2><label class="aut-reg">Войти или зарегистрироваться</label></h2></div>
                
            <form action="aut" class="aut" id="aut" method="post">
                    <div class="form_conteiner">
                    <P>&nbsp</P>
                    <label>
                        <h2>Постоянным покупателям</h2>
                    </label>
                    <P>&nbsp</P>
                    <label>Если вы уже имеете аккаунт, войдите в него, используя свои логин и пароль.</label>
                    <div class="label_input">
                        <p><label>Электроная почта</label></p>
                        <input type="email" class="reg-aut" placeholder="   email" name="email">
                    </div>

                    <div class="label_input">
                        <p><label>Пароль</label></p>
                        <input type="password" class="reg-aut" placeholder="   пароль" name="password">
                    </div>

                    <input type="submit" placeholder="Войти" class="btn_aut" value="Войти"><br>
                    <div class="reg"><a href="#" class="vhod" onclick="OpenFormReg()">Регистрация</a></div>
                    </div>
                </form>

                <form action="reg" class="reg" id="reg" method="post">
                    <div class="form_conteiner">
                    <P>&nbsp</P>
                    <label>
                        <h2>Персональные даные</h2>
                    </label>
                    <div class="label_input">
                        <p><label>Имя</label></p>
                        <input type="text" class="reg-aut" placeholder="   Имя" name="name" id="name">
                    </div>
                    <div class="label_input">
                        <p><label>Номер телефона</label></p>
                        <input type="number"    class="reg-aut" placeholder="   +7(999)-999-99-99" name="phone">
                    </div>
                    <div class="label_input">
                        <p><label>Электроная почта</label></p>
                        <input type="email" class="reg-aut" placeholder="   email" name="email">
                    </div>
                    <div class="label_input">
                        <p><label>Дата рождения</label></p>
                        <input type="date" class="reg-aut" max="2004-01-01" value="   17.09.2000" name="date">
                    </div>

                    <div class="label_input">
                        <p><label>Пароль</label></p>
                        <input type="password" class="reg-aut" placeholder="   пароль" name="password">
                    </div>

                    <input type="submit" placeholder="Регистрация" class="btn_reg" value="Регистрация"><br>
                    <div class="reg"><a href="#" onclick="OpenFormAut()" class="vhod">Войти</a></div>
                    </div>
                </form>

                
            </div>
    </div>
</main>
<footer></footer>
<script>
    let fomrReg = document.getElementById('reg');
    let fomrAut = document.getElementById('aut');
    function OpenFormReg(){
        fomrReg.style.display = "block";
        fomrAut.style.display = "none";
    }
    function OpenFormAut(){
        fomrReg.style.display = "none";
        fomrAut.style.display = "block";
    }
</script>
</body>

</html>
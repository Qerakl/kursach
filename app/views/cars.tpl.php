<?php require VIEWS . '/incs/header.php';
require CORE . '/classes/Db.php';
$user_id = $_SESSION['id'];
$bd = new Db;

$getUser = "SELECT * FROM `cars` WHERE `user_id` = '$user_id'";

$result = $bd->conn->prepare($getUser);

$result->execute();




$i = 0;



?>

<main>
    <div class="main">

        <div class="conteiner">
            <font color="yellow">
                <h2 style="margin-top: 20px;">Корзина</h2>
            </font>
            
            <div class="cars">
                <?php
                if ($result->rowCount() > 0) { ?>
                <div class="flex_cars" style="color: white; margin-top:20px;">
                    <div class="tovar_n"><h2>Товар</h2></div>
                    <div class="tovar_p"><h2>Цена к выходу</h2></div>
                    <div class="tovar_i"><h2>Кол-во</h2></div>
                </div>
                <table>
                <?php
                    $sum_tovars = 0;
                    foreach ($result as $row) { 
                        $sum_tovar = $row["price"] * $row["cout"];
                        
                        $sum_tovars += $sum_tovar;
                        $tovar = $row['tovar_id'];

                        
                        $getTovarss = "SELECT * FROM `tovar` WHERE `id` = '$tovar'";

                                    $resultTovarss = $bd->conn->prepare($getTovarss);
               
                                    $resultTovarss->execute();
                                    if($resultTovarss->rowCount() > 0){
                                        foreach($resultTovarss as $rowsss){}}
                            
                        ?>
                        
                       <div class="cars_block">
                            
                             <form action="update_cars" method="post">
                             <img class="img_cars" src="../public/img/<?php echo $row["img"];?>" >
                             
                             <div class="tovar_name"><em><h3 style="color: white;"><?php echo $row["name"];?></h3></em>
                             <h4>Цена за штуку: <?php echo $row["price"];?></h4>
                            </div>
                            <div class="tovar_price"><?php echo $sum_tovar;?></div>
                             <div class="tovar_cout">
                                <div class="number">
                                    
                                       <button class="number-minus"  type="submit"
                                           onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();">-</button>
                                       <input type="number" style="border: 1px solid #393939;" min="1" max="<?php echo $rowsss["cout"]?>"class="cout_tovar"
                                        value="<?php echo $row["cout"]; ?>" name="<?php echo "cout" . $i++ ?>" readonly>
                                       <button class="number-plus"  type="submit"
                                           onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();">+</button>
                                   </div>
                             </div>

                             <div class="del"><a href="/del_cars?id=<?php echo $row["tovar_id"]?>">Удалить</a></div>
                       </div>
                       <?php
}

                       
                    
                    ?> 
                    </table>
                    <div class="sum"><h2>Сумма к выходу: <?php echo $sum_tovars; ?></h2> 
                     </form><?php

$getUser = "SELECT * FROM `cars` WHERE `user_id` = '$user_id'";

$result = $bd->conn->prepare($getUser);
$i = 0;
$result->execute();
if ($result->rowCount() > 0) {
    foreach ($result as $row) { 
        $tovar = $row['tovar_id'];
        $getTovarq = "SELECT * FROM `tovar` WHERE `id` = '$tovar'";

        $resultTovarq = $bd->conn->prepare($getTovarq);
        
        $resultTovarq->execute();
        if($resultTovarq->rowCount() > 0){
            
            foreach($resultTovarq as $rowse){
                   if($rowse['cout'] <= 0){
                        ?> <h3 style="color: red;">В вашей Корзине есть товар который отсутствует</h3>
                        <?php
                         $i++;
                            return;
                         }
                   }
            
                }
                

                     
                     
                    
                    
                    }if($i <= 0){
                        ?><a href="shoping"><input type="submit" value="Забронировать" class="btn_bron"></a><?php
                     }?></div><?php
                }
                }else{  
                     ?><h2>Ваша Корзина пуста</h2><?php
                }?>
                
            </div>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
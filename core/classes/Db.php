<?php
session_start();
class Db
{
    public $conn, $sql, $articul, $cou;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=vapeshop;", "root", "");

    }
    public function add_user($name, $phone, $email, $date, $password)
    {
        $this->sql = "INSERT INTO clients (`name`, `phone`, `email`, `date`, `password`) VALUES ('$name', '$phone', '$email', '$date', '$password')";
        $this->conn->exec($this->sql);

        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['date'] = $date;
        $_SESSION['password'] = $password;
        
        $getUser = "SELECT * FROM clients";
        $result = $this->conn->query($getUser);
        foreach ($result as $row) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['rank'] = $row["rank"];
        }

    }

    public function chec_copy($phone, $email)
    {
        $getUser = "SELECT * FROM clients WHERE phone = '$phone' AND email = '$email'";
        $result = $this->conn->query($getUser);
        if ($row = $result->fetch() > 0) {
            echo "Данный номер или почта заняты";
            return false;
        } else {
            return true;
        }
    }

    public function chec_user($email, $password)
    {

        $getUser = "SELECT * FROM `clients` WHERE `email` = '$email'";

        $result = $this->conn->prepare($getUser);

        $result->execute();
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                if(password_verify($password, $row["password"])){

                $_SESSION['email'] = $row["email"];
                $_SESSION['password'] = $row["password"];
                $_SESSION['id'] = $row["id"];
                $_SESSION['name'] = $row["name"];
                $_SESSION['phone'] = $row["phone"];
                $_SESSION['date'] = $row["date"];
                $_SESSION['rank'] = $row["rank"];
                
                }else{
                    return "неверные данные!!!!!!";
                }
                

                header("Location: /");
            }

        } else {
            echo "данного пользователя нет";
        }

    }
    public function add_tovars($name, $price, $cout, $description, $property, $category, $img)
    {
        $this->sql = "INSERT INTO tovar (`name`, `price`, `cout`, `description`, `property`, `category`, `img`) VALUES ('$name', '$price', '$cout', '$description', '$property', '$category', '$img')";
        $this->conn->exec($this->sql);

    }

    public function add_cars($idTovar, $idUser, $cout, $name, $img, $price)
    {
        $this->sql = "INSERT INTO `cars`(user_id, tovar_id, cout, `name`, img, price) VALUES ('$idUser', '$idTovar', '$cout', '$name', '$img', '$price')";

        $this->conn->exec($this->sql);


    }

    public function plus_cout($cout, $idUser, $idTovar)
    {
        $this->sql = "UPDATE cars SET cout = '$cout' WHERE user_id = '$idUser' AND tovar_id = '$idTovar'";
        $this->conn->exec($this->sql);
        header("Location: /");

    }
    public function del_cars($idUser, $idTovar)
    {
        $sql = "DELETE FROM cars WHERE user_id = $idUser AND tovar_id = $idTovar";
        $this->conn->exec($sql);
        header("Location: /cars");
    }

    public function add_order($tovar_id, $user_id, $user_name, $user_phone, $tovar_name, $tovar_cout, $tovar_price, $tovar_img, $tovar_result)
    {
        $sql = "INSERT INTO `ordera` (`tovar_id`, `user_id`, `user_name`, `user_phone`, `tovar_name`, `cout`, `price`, `img`, `result`) VALUES ('$tovar_id', '$user_id', '$user_name', '$user_phone', '$tovar_name', '$tovar_cout', '$tovar_price', '$tovar_img', '$tovar_result')";
        $this->conn->exec($sql);

    }

    public function del_all($idUser)
    {
        $sql = "DELETE FROM cars WHERE user_id = $idUser";
        $this->conn->exec($sql);
    }

    public function update_bd($cout, $idTovar)
    {

        $getUser = "SELECT * FROM `tovar` WHERE  `id` = '$idTovar'";

        $result = $this->conn->prepare($getUser);

        $result->execute();
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                $tovar_cout = $row["cout"];
                $result_cout = $tovar_cout - $cout;
                $this->sql = "UPDATE tovar SET cout = '$result_cout' WHERE id = '$idTovar'";
                $this->conn->exec($this->sql);
            }
        }

    }
    public function del_order($idUser)
    {
        $sql = "DELETE FROM ordera WHERE user_id = $idUser";
        $this->conn->exec($sql);
        header("Location: /");
    }
    public function update_tovar($tovar_id, $cout)
    {
        $getUser = "SELECT * FROM `tovar` WHERE  `id` = '$tovar_id'";

        $result = $this->conn->prepare($getUser);

        $result->execute();
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                $tovar_cout = $row["cout"];
                $result_cout = $tovar_cout + $cout;
                $this->sql = "UPDATE tovar SET cout = '$result_cout' WHERE id = '$tovar_id'";
                $this->conn->exec($this->sql);
            }
        }

    }
    public function update($idTovar, $name, $img, $kategoriy, $price, $cout, $haracter, $opisanie)
    {
        $this->sql = "UPDATE tovar SET `name` = '$name', img = '$img', cout = '$cout', category = '$kategoriy', price = '$price', `description` = '$haracter', `property` = '$opisanie' WHERE id = '$idTovar'";
        $this->conn->exec($this->sql);
        header("Location: /");

    }
    public function update_noimg($idTovar, $name, $kategoriy, $price, $cout, $haracter, $opisanie){
        $this->sql = "UPDATE tovar SET `name` = '$name', category = '$kategoriy', cout = '$cout', price = '$price', `description` = '$haracter', `property` = '$opisanie' WHERE id = '$idTovar'";
        $this->conn->exec($this->sql);
        header("Location: /");
    }

    public function del_tovar($idTovar)
    {
        $sql = "DELETE FROM tovar WHERE id = $idTovar";
        $getTovar = "SELECT * FROM tovar WHERE id = $idTovar";
        $result = $this->conn->prepare($getTovar);

        $result->execute();
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                unlink('../public/img/' . $row["img"]);
            }}
        $this->conn->exec($sql);
        header("Location: /");
    }
    public function search_tovar($name)
    {
        
            $getUser = "SELECT * FROM `tovar` WHERE `name`='$name'";

            $result = $this->conn->prepare($getUser);

            $result->execute();
            if ($result->rowCount() > 0) {
                foreach ($result as $row) {
                    header("Location: /info-tovars?id=" . $row["id"]);
                }
            }else{
                abort();
            }
            
        
        
            
              
    }

   
}
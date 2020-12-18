<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require '../csatlakozas.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta name="viewport" content="width=device-width initial-scale=1"/>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="regisztracio.css"/>
    </head>
    <body>
        <div class="container">
            <h1>Regisztrációs űrlap</h1>
            <form method="POST">
                <label for="username">Felhasználói név:</label>
                <input type="text" class="form-control" id="username" name="username"/>
                <div class="form-group">
                    <label for="szolgaltato">Szolgáltató:</label>
                    <input type="number" class="form-control" id="szolgaltato" name="szolgaltato"/>
                </div>
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="tel" class="form-control" id="phone" name="phone"/>
                </div>
                <div class="form-group">
                    <label for="email">Emailcim:</label>
                    <input type="email" class="form-control" id="email" name="email"/>
                </div>
                <div class="form-group">
                    <label for="password">Jelszó:</label>
                    <input type="password" class="form-control" id="password" name="password"/>
                </div>
                <div class="form-group">
                <button type="submit" class="form-control" id="submit" name="submit">Regisztrál</button>
                </div>
                <div class="form-group">
                <button type="reset" class="form-control" id="reset" name="reset">Visszaállítás</button>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function(){
               $("#submit").click(function(){
                 var username=$("#username").val();
                 var szolgaltato=$("#szolgaltato").val();
                 var phone=$("#phone").val();
                 var email=$("#email").val();
                 var password=$("#password").val();
                 $.ajax({
                    url:'../regisztracio/regisztracio.php',
                    method:'POST',
                    data:{
                      username:username,
                      szolgaltato:szolgaltato,
                      phone:phone,
                      email:email,
                      password:password
                    },
                    success:function(data)
                    {
                        alert(data);
                    }
                 });
               }); 
            });
        </script>
        <?php
        $username= filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING);
        $szolgaltato= filter_input(INPUT_POST,"szolgaltato",FILTER_SANITIZE_NUMBER_INT);
        $phone= filter_input(INPUT_POST,"phone", FILTER_SANITIZE_NUMBER_INT);
        $email= filter_input(INPUT_POST,"email", FILTER_SANITIZE_STRING);
        $password= filter_input(INPUT_POST,"password", FILTER_SANITIZE_STRING);
        $sql="INSERT INTO `felhasz`(`ID`, `username`, `szolgaltato`, `phone`, `email`, `password`) VALUES (NULL,'.$username.','.$szolgaltato.','.$phone.','.$email.','.$password.')";
        if($conn->query($sql)===TRUE)
        {
            echo 'data inserted';
        }else{
            echo 'failed';
        }
        ?>
    </body>
</html>


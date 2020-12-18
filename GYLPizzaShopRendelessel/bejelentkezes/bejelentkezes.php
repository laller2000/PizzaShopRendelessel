<?php
session_start();
require '../csatlakozas.php';
$nev= filter_input(INPUT_POST,"user", FILTER_SANITIZE_STRING);
$jelszo= filter_input(INPUT_POST,"pwd",FILTER_SANITIZE_STRING);
var_dump($_SESSION);
if(filter_input(INPUT_POST,"submit",FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE))
{
    $sql="SELECT 'ID',`username`,`password` FROM `felhasz` WHERE username='".$nev."' AND password='".$jelszo."'";
    if($result=$conn->query($sql))
    {
        echo 'Returned row are:'.$result->num_rows;
        if($result->num_rows==1)
        {
            $_SESSION['login']=true;
        }
        else{
            $_SESSION['login']=false;
        }
    }
    
       
}
echo $nev.$jelszo;
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Bejelentkezés az pizza oldalba!</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="bejelentkezes.css"/>
    </head>
    <body class="container">
        <h1>Bejelentkezés a pizza oldalba!</h1>
        <form method="POST">
            
            <div class="form-group">
                <label for="user">Felhasználói név</label>
                <input type="text" class="form-control" id="user" name="user" required/>
            </div>
            <div class="form-group">
                <label for="pwd">Jelszó:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required/>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control" id="submit" name="submit" value="true">Bejelentkezés</button>
            </div>
        </form>
       
    </body>
</html>

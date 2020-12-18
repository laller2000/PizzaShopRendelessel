<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require './csatlakozas.php';
var_dump($_SESSION);
?>
<!DOCTYPE html>

<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>PizzaShop Rendelessel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="fooldalstilusa.css"/>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0 ">
                        <h1>PizzaShop rendelessel</h1>
                        <p>Ezen az oldalon tudsz regisztrálni bejelenkezni és rendelni pizzákat!</p>
                        <img src="fooldal.jpg" alt="fooldal" title="fooldal"/>
                        
        </div>
        <div class="container">

            <nav class="navbar navbar-expand-sm bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="regisztracio/regisztacio.php" target="_blank" >Regisztráció</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="bejelentkezes/bejelentkezes.php" target="_blank">Bejelentkezés</a>  
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="kijelentkezes/Logout.php" target="_blank">Kijelentkezés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="rendeles/Rendeles.php" target="_blank">Rendelés</a>  
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-item" href="Italok/Italrendeles.php" target="_blank">Ital rendelés</a>
                    </li>
                    <li class="nav-item">
                        <a class="navitem" href="Rendelesekadatbazis/Rendelesekadatbazisbairasa.php" target="_Blank">Rendelések adatbázisbaírása</a>
                    </li>
                </ul>
            </nav>
            </div>
    </body>
</html>

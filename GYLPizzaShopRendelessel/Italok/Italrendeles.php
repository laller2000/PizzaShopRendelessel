<?php
session_start();
require '../csatlakozas.php';
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Italrendelés</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="Italokstilus.css"/>
    </head>
    <body>
        <div class="container">
        <h1>ItalRendelés</h1>
        <?php
        $sql="SELECT `ID`, `nev`, `ar` FROM `italok` WHERE 1";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            var_dump($_POST);
            ?>
        <table class="table table-bordered table-dark table-responsive-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nev</th>
                    <th>ar</th>
                </tr>
            </thead>
            <?php
            while($row=$result->fetch_assoc())
            {
                echo '<tr><td>'.$row["ID"].'</td>';
                echo '<td>'.$row["nev"].'</td>';
                echo '<td>'.$row["ar"].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }else{
            echo '0 results';
        }
        ?>
        <form method="POST">
            <div class="card" style="width: 200px">
                <img class="card-img-top" src="../10.jpg" alt="Coca cola" title="coca cola"/>
                <p class="card-text">Coca Cola</p>
                <p class="card-text">Ár:220FT</p>
                <input type="checkbox" class="form-control" id="Cocacola" name="Cocacola"/>
                <input type="number" class="form-control" id="Coladarab" name="Coladarab"/>
            </div>
            <div class="card" style="width: 200px">
                <img class="card-img-top" src="../11.JPG" alt="Dreher Bak" title="Dreher Bak"/>
                <p class="card-text">Dreher Bak</p>
                <p class="card-text">300FT</p>
                <input type="checkbox" class="form-control" id="dreherbak" name="dreherbak"/>
                <input type="number" class="form-control" id="dreherdarab" name="dreherdarab"/>
            </div>
            <button type="submit" id="italrendeles" name="italrendeles" value="true">Ital Rendelés</button>
        </form>
       </div>
        <script>
            $(document).ready(function(){
               $("#italrendeles").click(function(){
                    var alapar=100;
                    var cocacolaar=220;
                    var drehersorar=300;
                    if($('#Cocacola').is(':checked'))
                    {
                        $('#Coladarab').val();
                        console.log('#Coladarab');
                        var colaosses=(alapar+cocacolaar)*$('#Coladarab').val();
                        alert(colaosses+"FT kell Fizetned!");
                    }
                    else if($('#dreherbak').is(':checked'))
                    {
                        $('#dreherdarab').val();
                        console.log('#dreherdarab');
                        var dreherosszes=(alapar+drehersorar)*$('#dreherdarab').val();
                        alert(dreherosszes+"Ft Kell fizetned!");
                    }
                    var osszesitalar=colaosses+dreherosszes;
                    alert(osszesitalar+"Ft kell fizetned Köszönjük a rendelést!");
               }); 
            });
        </script>
    </body>
</html>


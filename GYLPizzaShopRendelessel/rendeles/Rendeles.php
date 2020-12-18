<?php
require '../csatlakozas.php';
header("Content-Tpye:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rendelés</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="RendelesStilus.css"/>
    </head>
    <body>
        <h1>Rendelés pizzák</h1>
        <div class="container">
            <?php
            $sql="SELECT `ID`, `nev`, `ar`, `sajt`, `szosz`, `kep` FROM `pizza` WHERE 1";
            $result=$conn->query($sql);
            if($result->num_rows>0)
            {
                var_dump($_POST);
                ?>
            <table class="table table-dark table-bordered table-responsive-md">
                <thead>
                    <tr>
                <th>ID</th>
                <th>Nev</th>
                <th>Ár</th>
                <th>Sajt</th>
                <th>Szósz</th>
                <th>Kép</th>
                </tr>
                </thead>
                
            <?php
                while($row=$result->fetch_assoc())
                {
                    echo '<td>'.$row["ID"].'</td>';
                    echo '<td>'.$row["nev"].'</td>';
                    echo '<td>'.$row["ar"].'</td>';
                    echo '<td>'.$row["sajt"].'</td>';
                    echo '<td>'.$row["szosz"].'</td>';
                    echo '<td>'.$row["kep"].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
          <form method="POST">
                    <div class="card" style="width:400px">
            <img class="card-img-top" src="..//0.jpg" alt="Hagymás"/>
            <input type="checkbox" class="form-control" id="hagymas" name="hagymas"/>
            <input type="number" class="form-control" id="hagymasdarab" name="hagymasdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//1.jpg" alt="Szalámis"/>
            <input type="checkbox" class="form-control" id="szalamis" name="szalamis"/>
            <input type="number" class="form-control" id="szalamisdarab" name="szalamissdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//2.jpg" alt="Zöldséges"/>
            <input type="checkbox" class="form-control" id="zoldseges" name="zoldseges"/>
             <input type="number" class="form-control" id="zoldsegesdarab" name="zoldsegessdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//3.jpg" alt="sajtos"/>
            <input type="checkbox" class="form-control" id="sajtos" name="sajtos"/>
             <input type="number" class="form-control" id="sajtosdarab" name="sajtossdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//4.jpg" alt="Kolbászos"/>
            <input type="checkbox" class="form-control" id="kolbaszos" name="kolbaszsos"/>
             <input type="number" class="form-control" id="kolbaszosdarab" name="kolbaszossdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//5.jpg" alt="kukoricás"/>
            <input type="checkbox" class="form-control" id="kukoricas" name="kukoricas"/>
             <input type="number" class="form-control" id="kukoricasdarab" name="kukoricassdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//6.jpg" alt="Paradicsomos"/>
            <input type="checkbox" class="form-control" id="paradicsom" name="paradicsom"/>
             <input type="number" class="form-control" id="paradicsomosdarab" name="paradicsomosdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//7.jpg" alt="baconos"/>
            <input type="checkbox" class="form-control" id="baconoss" name="baconoss"/>
             <input type="number" class="form-control" id="baconosdarab" name="baconosdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//8.jpg" alt="magyaros"/>
            <input type="checkbox" class="form-control" id="magyaross" name="magyaross"/>
             <input type="number" class="form-control" id="magyarosdarab" name="magyarosdarab"/>
        </div>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="..//9.jpg" alt="gombás"/>
            <input type="checkbox" class="form-control" id="gombas" name="gombas"/>
             <input type="number" class="form-control" id="gombasdarab" name="gombasdarab"/>
        </div>
        <button type="submit" name="rendel" id="rendel">Rendelés</button>
        </form>
       </div>
        <script>
            $(document).ready(function(){
               $("#rendel").click(function(){
                   var hagymas=1200;
                   var szalamis=1300;
                   var zoldseges=1100;
                   var sajtos=1100;
                   var kolbaszos=1200;
                   var kukoricas=1200;
                   var paradicsomos=1200;
                   var baconos=1500;
                   var magyaros=1400;
                   var gombas=1300;
                   var alapar=1000;
                   if($('#hagymas').is(':checked'))
                   {
                       $('#hagymasdarab').val();
                       console.log('#hagymasdarab');
                       var hagyma=(alapar+hagymas)*$('#hagymasdarab').val();
                       alert(hagyma+"FT kell fizetned!");
                       
                   }
                   else if($('#szalamis').is(':checked'))
                   {
                       $('#szalamisdarab').val();
                       console.log("#szalamisdarab");
                       var szalami=(alapar+szalamis)*$('#szalamisdarab').val();
                       alert(szalami+"FT kell fizetned!");
                   }
                   else if($('#zoldseges').is(':checked'))
                   {
                       $('#zoldsegesdarab').val();
                       console.log("#zoldsegesdarab");
                       var zoldseg=(alapar+zoldseges)*$('#zoldsegesdarab').val();
                       alert(zoldseg+"FT kell fizetned!");
                   }
                   else if($('#sajtos').is(':checked'))
                   {
                       $('#sajtosdarab').val();
                       console.log("#sajtosdarab");
                       var sajt=(alapar+sajtos)*$('#sajtosdarab').val();
                       alert(sajt+"FT kell fizetned!");
                   }
                   else if($('#kolbaszos').is(':checked'))
                   {
                       $('#kolbaszosdarab').val();
                       console.log("#kolbaszosdarab");
                       var kolbasz=(alapar+kolbaszos)*$('#kolbaszosdarab').val();
                       alert(kolbasz+"FT kell fizetned!");
                   }
                   else if($('#kukoricas').is(':checked'))
                   {
                       $('#kukoricasdarab').val();
                       console.log("#kukoricasdarab");
                       var kukorica=(alapar+kukoricas)*$('#kukoricasdarab').val();
                       alert(kukorica+"Ft fizetned kell!");
                   }
                   else if($('#paradicsom').is(':checked'))
                   {
                       $('#paradicsomosdarab').val();
                       console.log("#paradicsomosdarab");
                       var paradi=(alapar+paradicsomos)*$('#paradicsomosdarab').val();
                       alert(paradi+"FT kell fizetned!");
                   }
                   else if($('#baconoss').is(':checked'))
                   {
                       $('#baconosdarab').val();
                       console.log("#baconosdarab");
                       var bacon=(alapar+baconos)*$('#baconosdarab').val();
                       alert(bacon+"FT kell fizetned!");
                   }
                   else if($('#magyaross').is(':checked'))
                   {
                       $('#magyarosdarab').val();
                       console.log("#magyarosdarab");
                       var magyar=(alapar+magyaros)*$("#magyarosdarab").val();
                       alert(magyar+"FT kell fizetned!");
                   }
                   else if($('#gombas').is(':checked'))
                   {
                       $('#gombasdarab').val();
                       console.log("#gombasdarab");
                       var gomba=(alapar+gombas)*$("#gombasdarab").val();
                       alert(gomba+"FT kell fizetned!");
                   }
                   var osszesen=hagyma+szalami+zoldseg+sajt+kolbasz+kukorica+paradi+bacon+magyar+gomba;
                   alert(osszesen+"Ft kell fizetned!Köszönjük a rendelést!");
               }); 
            });
        </script>
        
    </body>
</html>

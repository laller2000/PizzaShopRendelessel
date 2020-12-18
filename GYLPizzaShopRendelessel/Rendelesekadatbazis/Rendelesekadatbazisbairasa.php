<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require '../csatlakozas.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rendelés adatbázisba</title>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="Rendelesadatstilus.css"/>
    <body>
        <div class="jumbotron text-center" style="margin-bottom: 0">
                   <h1>Rendelés adatbázisba!</h1>
        </div>
        <div class="container">
            <form method="POST">
                <div class="form-group">
                <label for="rendelesdatum">Rendelés dátuma</label>
                <input type="datetime-local" class="form-control" id="rendelesdatum" name="rendelesdatum"/>
                </div>
                <div class="form-group">
                    <label for="felhasznalo">Felhasználói ID</label>
                    <input type="number" class="form-control" id="felhasznalo" name="felhaszID"/>
                        <label for="fel"></label>
                        <select type="number" class="form-control" id="fel" name="fel">
                            <option>11-imre</option>
                            <option>15-ferike</option>
                            <option>17-test</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="pizzaazon">pizzaid</label>
                    <input tpye="number" class="form-control" id="pizzaazon" name="pizzaID"/>
                    <label for="pizz"></label>
                    <select type="number" class="form-control" id="pizz" name="pizz">
                         <option>15-hagymas</option>
                        <option>16-szalamis</option>
                        <option>17-zoldseges</option>
                        <option>18-sajtos</option>
                        <option>19-kolbaszos</option>
                        <option>20-kukoricas</option>
                        <option>21-paradicsomos</option>
                        <option>22-baconos</option>
                        <option>23-magyaros</option>
                        <option>24-gomba</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="italok">Italid</label>
                    <input type="number" class="form-control" id="italok" name="italID"/>
                    <label for="ital"></label>
                    <select type="number" class="form-control" id="ital" name='ital'>
                        <option>1-Coca cola</option>
                        <option>2-Dreher dak</option>
                    </select>
                </div>
                <button type="submit" class="form-control" id="kuldesadatbazis" name="kuldesadatbazis">BeszúrásAdatbázis</button>
            </form>
        </div>
        <script>
            $(document).ready(function(){
               $("#kuldesadatbazis").click(function(){
                   var rendeles=$("#rendelesdatum").val();
                   var fel=$("#fel").val();
                   var pizz=$("#pizz").val();
                   var ital=$("#ital").val();
                   $.ajax({
                      url:'../Rendelesekadatbazis/Rendelesekadatbazisbairasa.php',
                      method:'POST',
                      data:{
                          Datum:rendeles,
                          felhaszId:fel,
                          pizzaID:pizz,
                          itaID:ital
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
        $datum= filter_input(INPUT_POST,"datum",FILTER_SANITIZE_STRING);
        $fel= filter_input(INPUT_POST,"fel", FILTER_SANITIZE_NUMBER_INT);
        $pizz= filter_input(INPUT_POST,"pizz", FILTER_SANITIZE_NUMBER_INT);
        $ital= filter_input(INPUT_POST,"ital",FILTER_SANITIZE_NUMBER_INT);
        $sql=" INSERT INTO `megrendeles`(`ID`, `Datum`, `felhasz_ID`, `pizza_ID`, `ital_ID`) VALUES (NULL,'".$datum."','".$fel."','".$pizz."','".$ital."')";
        if($conn->query($sql)){
            echo 'data inserted';
        }else
        {
            echo '0 results';
        }
        ?>
    </body>
</html>


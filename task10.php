<?php require "header.php";?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№10. Создать выпадающий список с 10 странами.</h3>
                <h5>При выборе страны отображаем, какое сейчас там время. Допускается перезагрузка страницы. Но лучше без перезагрузки.</h5>
            </div>
            <div class="col-sm-12 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <h5>Пожалуйста, выберите город для отображения времени: </h5><br>
                        <label for="select town">Страна, город:</label>
                        <select class="default-select mb-3 form-control" id="select town" name="town">
                            <?php
                            $arrayTowns=array("--Выберите город--","Ukraine, Zaporozhye","Russia, Moscow","Belarus, Minsk","United Kingdom, London","USA, New York","UAE, Dubai","Australia, Sydney","Argentina, Buenos-Aires","Japan, Tokyo","China, Beijing");
                            for ($indexTown=0;$indexTown<11;$indexTown++) {
                                echo '<option> '.$arrayTowns[$indexTown].' </option>';
                            }?>
                        </select>
                        <input type="submit" class="btn btn-success" value="Сколько время?">
                    </fieldset>
                </form><br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-center">
                <?php
                if (isset($_POST["town"])) {
                    $town = $_POST["town"];
                    $indexTown=array_search($town,$arrayTowns);
                    $timeNow=time();
                    $arrayDiffTime=array("0","0","+1","+1","-2","-7","+2","+9","-5","+7","+6");
                    $timeNowInTown=$timeNow+(($arrayDiffTime["$indexTown"])*60*60);
                    function writeTownDate($time) {
                        return date("Y F d l G:i:s",$time);
                    }
                    if ($indexTown=="0") {
                        echo "<h3 style='color:darkred'>Вы не выбрали город!<br> Пожалуйста, выберите город.</h3>";
                    } else {
                        echo "<h3 style='color:lightseagreen'>".$town."</h3>";
                        echo "<h4 style='color:darkblue'>".writeTownDate($timeNowInTown)."</h4>";
                        echo "<br>Разница во времени: ".$arrayDiffTime["$indexTown"]." час(-a,-ов).";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php";?>

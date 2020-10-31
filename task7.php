<?php
if (isset($_GET)) {
    function get_numeric_bool($val)
    {
        if (is_numeric($val)) {
            return $val + 0;
        } else if ($val === "true" or $val === "false") {
            return (bool)$val;
        } else
            return $val;
    }

    function result($value1, $value2, $value3, $value4)
    {
        if ($value1 === "" or $value2 === "" or $value3 === "" or $value4 === ""){
            echo "<p style='color:red'>Вы не заполнили все ячейки!</p>";
    } else {
        $value1 = get_numeric_bool($value1);
        $value2 = get_numeric_bool($value2);
        $value3 = get_numeric_bool($value3);
        $value4 = get_numeric_bool($value4);
        $type1 = gettype($value1);
        $type2 = gettype($value2);
        $type3 = gettype($value3);
        $type4 = gettype($value4);
//        echo $type1 ."<br>". $type2."<br>" . $type3 ."<br>". $type4."<br>";
        if ($type1 == $type2 and $type2 == $type3 and $type3 == $type4) {
            echo '<p>Запрос отправки данных выполнится. Актер№1: ' . $value1 . ', Актер№2: ' . $value2 . ', Актер№3: ' . $value3 . ', Актер№4: ' . $value4 . ' </p>';
        } else {
            echo "<p>Запрос отправки данных не выполнится, так как вы задали разные типы данных</p>";
        }
    }
}
}
?>
<?php require "header.php";?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№7. Создать функцию.</h3>
                    <h5>Создать функцию которая будет экранировать значения при необходимости, в зависимости от других значений.</h5>
                </div>
                <div class="col-sm-5 justify-content-center">
                    <form action="" method="GET">
                        <fieldset>
                            <h5>Напишите четыре имени любимых актеров</h5>
                            <?php for($numberInput=1;$numberInput<5;$numberInput++) {
                                echo '<input type="text" name="nameActor'.$numberInput.'" size="50" maxlength="45" placeholder="Имя актера №'.$numberInput.'"><br>';
                            }
                            ?>
                            <br>
                            <input type="submit" class="btn btn-success" value="Проверить отправку таких данных">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 jumbotron text-left">
                    <?php
                    if (isset($_GET["nameActor1"]) and isset($_GET["nameActor2"]) and isset($_GET["nameActor3"]) and isset($_GET["nameActor4"])) {
                        $nameActor1=$_GET["nameActor1"];
                        $nameActor2=$_GET["nameActor2"];
                        $nameActor3=$_GET["nameActor3"];
                        $nameActor4=$_GET["nameActor4"];
                        result($nameActor1, $nameActor2, $nameActor3, $nameActor4);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
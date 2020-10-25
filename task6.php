<?php
if (isset($_GET)) {
    function getStringComparison($numberGreater, $numberLess) {
        echo "<h5>Число ".$numberGreater." больше, чем число ".$numberLess."</h5>";
    }
    function getDiffPercent($numberGreater, $numberLess) {
        $diffPercent = ($numberGreater / $numberLess - 1) * 100;
        echo "<h5>Разница между числами в процентном соотношении ".$diffPercent." %</h5>";
    }
    function getTaskResult($number1, $number2) {
        if (is_numeric($number1) && is_numeric($number2)) {
            if ($number1 > $number2) {
                return getStringComparison($number1, $number2) . getDiffPercent($number1, $number2);
            } else if ($number1 < $number2) {
                return getStringComparison($number2, $number1) . getDiffPercent($number2, $number1);
            } else if ($number1 === $number2 || $number1!=="NULL") {
                echo '<h5 class="text-warning">Ваши числа одинаковы!Введите разные два числа.</h5>';
            } else echo "";
        } else {
            echo '<h5 class="text-danger">Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</h5>';
        }
    }
}
?>
<?php require "header.php";?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№6. Результат двух чисел.</h3>
                    <h5>Определить какое число больше и вернуть разницу между числами в процентном соотношении.</h5>
                </div>
                <div class="col-sm-5 justify-content-center">
                    <form action="" method="GET">
                        <fieldset>
                            <h5>Задайте два числа:</h5>
                                <input type="text" name="firstNumber" size="15" maxlength="5" placeholder="Первое число"><br>
                                <input type="text" name="secondNumber" size="15" maxlength="5" placeholder="Второе число">
                            <br>
                            <input type="submit" class="btn btn-success" value="Задать">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 jumbotron text-left">
<?php
if (isset($_GET["firstNumber"]) and isset($_GET["secondNumber"])) {
    $firstNumber= $_GET["firstNumber"];
    $secondNumber= $_GET["secondNumber"];
    if (isset($firstNumber)||isset($secondNumber)) {
        getTaskResult($firstNumber, $secondNumber);
    }}
?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
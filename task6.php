<?php
if (isset($_GET)) {
    function getStringComparison($numberGreater, $numberLess)
    {
        return "<h5>Число $numberGreater больше, чем число $numberLess </h5>";
    }

    function getDiffPercent($numberGreater, $numberLess)
    {
        $diffPercent = ($numberGreater / $numberLess - 1) * 100;
        return "<h5>Разница между числами в процентном соотношении $diffPercent%</h5>";
    }

    function getTaskResult($number1, $number2)
    {
        $res = '';
        if (!is_numeric($number1) || !is_numeric($number2)) {
            $res = '<h5 class="text-danger">Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</h5>';
        }
        if ($number1 > $number2) {
            $res = getStringComparison($number1, $number2) . getDiffPercent($number1, $number2);
        }
        if ($number1 < $number2) {
            $res = getStringComparison($number2, $number1) . getDiffPercent($number2, $number1);
        }
        if ($number1 === $number2 || $number1 !== "NULL") {
            $res = '<h5 class="text-warning">Ваши числа одинаковы!Введите разные два числа.</h5>';
        }
        return $res;
    }
}
?>
<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№6. Результат двух чисел.</h3>
                    <h5>Определить какое число больше и вернуть разницу между числами в процентном соотношении.</h5>
                </div>
                <div class="col-sm-5">
                    <form action="" method="GET">
                        <fieldset>
                            <label for="">Задайте два числа:
                                <input type="text" name="firstNumber" size="25" maxlength="5"
                                       placeholder="Первое число" class="col-sm-12"><br>
                                <input type="text" name="secondNumber" size="25" maxlength="5"
                                       placeholder="Второе число" class="col-sm-12"><br>
                            </label>
                            <input type="submit" class="btn btn-success col-sm-12" value="Задать"><br><br>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 jumbotron">
                    <?php
                    if (isset($_GET["firstNumber"]) && isset($_GET["secondNumber"])) {
                        echo getTaskResult($_GET["firstNumber"], $_GET["secondNumber"]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>
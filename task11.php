<?php
$sign = array(
    'plus' => "+",
    'minus' => "-",
    'multiplication' => "*",
    'division' => "/"
);
if (isset($_POST)) {
    function getTaskResult($number1, $number2, $mathSign)
    {
        $res = "";
        global $sign;
        $keys = array_keys($sign);
        $number1 = $number1 + 0;
        $number2 = $number2 + 0;
        if ($mathSign === $keys[0]) {
            $res = $number1 . " " . $sign[$keys[0]] . " " . $number2 . " = " . ($number1 + $number2);
        }
        if ($mathSign === $keys[1]) {
            $res = $number1 . " " . $sign[$keys[1]] . " " . $number2 . " = " . ($number1 - $number2);
        }
        if ($mathSign === $keys[2]) {
            $res = $number1 . " " . $sign[$keys[2]] . " " . $number2 . " = " . ($number1 * $number2);
        }
        if ($mathSign === $keys[3]) {
            $res = $number1 . " " . $sign[$keys[3]] . " " . $number2 . " = " . ($number1 / $number2);
        }
        return $res;
    }
}
?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№11. Создать форму в которой пользователь будет вводить два числа.</h3>
                <h5>Создать форму в которую пользователь будет вводить два числа,
                    выбирать из выпадающего списка математическую операцию («+» «-» «*» «/») и
                    на экране должен получать результат. На стороне php дописать валидацию на
                    вводимые значения. Должны быть только числа. В противном случае выводить сообщение об ошибке.</h5>
            </div>
            <div class="col-md-12">
                <form action="" method="POST">
                    <fieldset>
                        <label for="">Задайте два числа и действие:<br>
                            <input type="text" name="firstNumber" size="12" maxlength="5" placeholder="Первое число"
                                <?php
                                if (isset($_POST["firstNumber"])) { ?>
                                    value="<?= $_POST["firstNumber"]; ?>"
                                    <?php
                                }
                                ?>
                            >
                            <select class="default-select" name="mathSign">
                                <?php foreach ($sign as $nameSign => $mathSign) { ?>
                                    <option value="<?= $nameSign; ?>"><?= $mathSign; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="text" name="secondNumber" size="12" maxlength="5" placeholder="Второе число"
                                <?php
                                if (isset($_POST["secondNumber"])) { ?>
                                    value="<?= $_POST["secondNumber"]; ?>"
                                    <?php
                                }
                                ?>
                            >
                        </label>
                        <input type="submit" class="btn btn-success" value="     =     ">
                    </fieldset>
                </form>
            </div>
            <div class="col-md-10 jumbotron text-center">
                <?php
                if (isset($_POST["firstNumber"]) && isset($_POST["secondNumber"])) {
                    if ($_POST["firstNumber"]===""|| $_POST["secondNumber"]==="") {
                        echo '<p class="text-danger">Вы не задали два числа</p>';
                        exit();
                    }
                    if (!is_numeric(($_POST["firstNumber"])) || !is_numeric($_POST["secondNumber"])) {
                        echo '<h5 class="text-danger">Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</h5>';
                        exit;
                    }
                    echo getTaskResult($_POST["firstNumber"], $_POST["secondNumber"], $_POST["mathSign"]);
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

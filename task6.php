<?php
if (isset($_GET)) {
    function getDiffPercent($number1, $number2)
    {
        $numbMin = min($number1, $number2);
        $numbMax = max($number1, $number2);
        if ($numbMin == 0) {
            return "На ноль делить нельзя";
        }
        return (($numbMax / $numbMin) - 1) * 100;
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
                                <input type="number" name="firstNumber" size="25" maxlength="5"
                                       placeholder="Первое число" class="col-sm-12"
                                       value="<?= isset($_GET['firstNumber']) ? $_GET['firstNumber'] : '' ?>"
                                       required><br>
                                <input type="number" name="secondNumber" size="25" maxlength="5"
                                       placeholder="Второе число" class="col-sm-12"
                                       value="<?= isset($_GET['secondNumber']) ? $_GET['secondNumber'] : '' ?>"
                                       required><br>
                            </label>
                            <input type="submit" class="btn btn-success col-sm-12" value="Задать"><br><br>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 jumbotron">
                    <?php
                    if (isset($_GET['firstNumber'])) {
                        echo getDiffPercent($_GET['firstNumber'], $_GET['secondNumber']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>
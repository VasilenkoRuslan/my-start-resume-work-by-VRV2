<?php
if (isset($_GET)) {
    function getDiffPercent($number1, $number2)
    {
        if ($number1 == 0 && $number2 == 0) {
            return "0";
        }
        if ($number1 == 0 || $number2 == 0) {
            return 100;
        }
        if ($number1 >= $number2) {
            return abs($number1 / $number2 - 1) * 100;
        }
        if ($number2 > $number1) {
            return abs($number2 / $number1 - 1) * 100;
        }
        return '';
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
                        if (($_GET['firstNumber'] < 0 && $_GET['secondNumber'] > 0) || ($_GET['firstNumber'] > 0 && $_GET['secondNumber'] < 0)) { ?>
                            <h5 class="text-danger">Расчет не имеет смысла</h5>
                            <?php
                        }
                        if (($_GET['firstNumber'] >= 0 && $_GET['secondNumber'] >= 0) || ($_GET['firstNumber'] <= 0 && $_GET['secondNumber'] <= 0)) {
                            ?>
                            <h5>Разница между
                                числами <?= getDiffPercent($_GET['firstNumber'], $_GET['secondNumber']); ?>
                                %.
                            </h5>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>
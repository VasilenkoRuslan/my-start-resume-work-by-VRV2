<?php
if (isset($_GET)) {
    function getStringComparison($numberGreater, $numberLess)
    {
        echo "<p>Число ".$numberGreater." больше, чем число ".$numberLess."</p><br>";
    }

    function getDiffPercent($numberGreater, $numberLess)
    {
        $diffPercent = ($numberGreater / $numberLess - 1) * 100;
        echo "<p>Разница между числами в процентном соотношении ".$diffPercent."/%</p>";
    }

    function getTaskResult($number1, $number2)
    {
        if ($number1 === !(int)$number1 || $number2 === !(int)$number2 || $number1 === !(float)$number1 || $number2 === !(float)$number2) {
            echo "<p>Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</p>";
        } else {
            if ($number1 > $number2) {
                return getStringComparison($number1, $number2) . getDiffPercent($number1, $number2);
            } else if ($number1 < $number2) {
                return getStringComparison($number2, $number1) . getDiffPercent($number2, $number1);
            } else if ($number1 === $number2||$number1==!"NULL") {
                echo "<p>Ваши числа одинаковы!Введите разные два числа.</p>";
            } else echo "";
        }
    }
}
?>
<?php require "header.php";?>
    <section class="tasks">
        <div class="container">
            <div class="row justify-content-center">
                <form action="task6.php" method="GET">
                    <fieldset>
                        <p>Задание№6. Результат двух чисел.</p>
                        <p>Определить какое число больше и вернуть разницу между числами в процентном соотношении.</p>
                        Задайте два числа:<br>
                        <label>
                            <input type="text" name="firstNumber" size="15" maxlength="5" placeholder="Первое число">
                            <input type="text" name="secondNumber" size="15" maxlength="5" placeholder="Второе число">
                        </label><br>
                        <input type="submit" value="Задать">
                    </fieldset>
                </form>
            </div>
            <div class="row justify-content-center">
                <?php
                if (isset($_GET)) {
                    $firstNumber = $_GET["firstNumber"];
                    $secondNumber = $_GET["secondNumber"];
                    getTaskResult($firstNumber, $secondNumber);
                }
                ?>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
<?php
if (isset($_POST)) {
    function getTaskResult($number1, $number2,$sign) {
        if (is_numeric($number1) && is_numeric($number2)) {
            $number1=$number1+0;
            $number2=$number2+0;
            if ($sign=="plus") {
                echo "$number1+$number2 = ";
                return ($number1+$number2);
            } else if ($sign=="minus") {
                echo "$number1-$number2 = ";
                return ($number1-$number2);
            } else if ($sign=="multiplication") {
                echo "$number1*$number2 = ";
                return ($number1*$number2);
            } else {
                echo "$number1/$number2 = ";
                return ($number1/$number2);
            }
        } else {
            return '<h5 class="text-danger">Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</h5>';
        }
    }
}
?>
<?php require "header.php";?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№11. Создать форму в которой пользователь будет вводить два числа.</h3>
                    <h5>Создать форму в которую пользователь будет вводить два числа,
                        выбирать из выпадающего списка математическую операцию («+» «-» «*» «/») и
                        на экране должен получать результат. На стороне php дописать валидацию на
                        вводимые значения. Должны быть только числа. В противном случае выводить сообщение об ошибке.</h5>
                </div>
                <div class="col-sm-8 justify-content-center">
                    <form action="" method="POST">
                        <fieldset>
                            <label for="">Задайте два числа и действие:<br>
                            <input type="text" name="firstNumber" size="15" maxlength="5" placeholder="Первое число">
                            <select class="default-select" name="mathSign">
                                <option value="plus">+</option>
                                <option value="minus">-</option>
                                <option value="multiplication">*</option>
                                <option value="division">/</option>
                            </select>
                            <input type="text" name="secondNumber" size="15" maxlength="5" placeholder="Второе число">
                            </label>
                            <input type="submit" class="btn btn-success" value="      =      ">
                        </fieldset>
                    </form>
                </div>
                <div class="col-sm-8 jumbotron text-left">
                    <?php
                    if (isset($_POST["firstNumber"]) and isset($_POST["secondNumber"])) {
                        $firstNumber= $_POST["firstNumber"];
                        $secondNumber= $_POST["secondNumber"];
                        $sign= $_POST["mathSign"];
                        if (isset($firstNumber)||isset($secondNumber)) {
                            echo getTaskResult($firstNumber, $secondNumber, $sign);
                        }}
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
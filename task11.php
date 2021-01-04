<?php
function getTaskResult($number1, $number2, $Sign)
{
    switch ($Sign) {
        case "+" :
            return $number1 + $number2;
        case "-" :
            return $number1 - $number2;
        case "*" :
            return $number1 * $number2;
        case "/" :
            if ($number2 == 0) {
                return "На ноль делить нельзя!";
            }
            return $number1 / $number2;
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
                            <input type="number" name="firstNumber" size="12" maxlength="5" placeholder="Первое число"
                                   value='<?= isset($_POST["firstNumber"]) ? $_POST["firstNumber"] : ""; ?>' required>
                            <select class="default-select" name="mathSign">
                                <option value="+"> +</option>
                                <option value="-"> -</option>
                                <option value="*"> *</option>
                                <option value="/"> /</option>
                            </select>
                            <input type="number" name="secondNumber" size="12" maxlength="5" placeholder="Второе число"
                                   value='<?= isset($_POST["secondNumber"]) ? $_POST["secondNumber"] : ""; ?>' required>
                        </label>
                        <input type="submit" class="btn btn-success" value="     =     ">
                    </fieldset>
                </form>
            </div>
            <div class="col-md-10 jumbotron text-center">
                <?= (isset($_POST["firstNumber"])) ? getTaskResult($_POST["firstNumber"], $_POST["secondNumber"], $_POST["mathSign"]) : ""; ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

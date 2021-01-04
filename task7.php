<?php
function shieldingIfNeeded()
{
    $arrayArg = func_get_args();
    $allTypeNumeric = true;
    foreach ($arrayArg as $arg) {
        if (!is_numeric($arg)) {
            $allTypeNumeric = false;
            break;
        }
    }
    if ($allTypeNumeric) {
        return $arrayArg;
    }
    foreach ($arrayArg as $key => $arg) {
        if (is_numeric($arrayArg[$key])) {
            $arrayArg[$key] = (string)$arg;
        }
    }
    return $arrayArg;
}

?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№7. Создать функцию.</h3>
                <h5>В некоторых базах данных, запрещается использовать смешанные типа данных.<br><br>

                    Пример:<br>
                    SELECT ‘test’ IN (‘test2’, ‘test33’, ‘test’) - запрос выполнится<br>
                    SELECT ‘test’ IN (11, 2, ‘test’, 2) - запрос не выполнится<br>
                    SELECT 25 IN (11, 2, 25) - запрос выполнится<br><br>

                    Создать функцию которая будет экранировать значения при необходимости, в зависимости от других
                    значений.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                var_dump(shieldingIfNeeded(1, 2, "ERROR'EXIT", "OR", 544));
                var_dump(shieldingIfNeeded(23, 15, 22));
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

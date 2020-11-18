<?php
$howMachActors = 6;
$actors = ['actor_1' => ''];
for ($numbActor = 2; $numbActor <= $howMachActors; $numbActor++) {
    $actors["actor_$numbActor"] = ('');
}

if (isset($_GET)) {
    function get_numeric_bool($val)
    {
        $value = '';
        if (!is_numeric($val) && $val !== "true" && $val !== "false") {
            $value = $val;
        }
        if (is_numeric($val)) {
            $value = $val + 0;
        }
        if ($val === "true" || $val === "false") {
            $value = (bool)$val;
        }
        return $value;
    }

    function result($actors)
    {
        $screening = true;
        $type = gettype(get_numeric_bool($actors['actor_1']));
        foreach ($actors as $key => $actor) {
            $actor = get_numeric_bool($actor);
            if (gettype($actor) !== $type) {
                $screening = false;
                break;
            }
        }
        if (!$screening) {
            $res = '<p style="color: mediumvioletred">Запрос отправки данных не выполнится, так как вы задали разные типы данных</p>';
        }
        if ($screening) {
            $res = '<p style="color: green">Запрос отправки данных выполнится. Типы значений одинаковы.</p>';
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
                <h3>Задание№7. Создать функцию.</h3>
                <h5>Создать функцию которая будет экранировать значения при необходимости, в зависимости от других
                    значений.</h5>
            </div>
            <div class="col-sm-5 justify-content-center">
                <form action="" method="GET">
                    <fieldset>
                        <label for="">Напишите имена любимых актеров
                        <?php
                        $numberActor = 0;
                        foreach ($actors as $key => $actor) {
                            $numberActor++;
                            ?>
                            <input type="text" name="<?= $key ?>" size="50" maxlength="45"
                                   placeholder="Имя актера <?= $numberActor ?>">
                            <br>
                        <?php } ?>
                        </label>
                        <br>
                        <input type="submit" class="btn btn-success" value="Проверить отправку таких данных">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_GET[$key])) {
                    $validate = true;
//                    print_r($_GET);
                    foreach ($_GET as $key => $actor) {
                        if (($_GET[$key] === '')) {
                            $validate = false;
                            break;
                        }
                    }

                    if (!$validate) {
                        echo "<p style='color:red'>Вы не заполнили все ячейки!</p>";
                    }

                    if ($validate) {
                        echo result($_GET);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

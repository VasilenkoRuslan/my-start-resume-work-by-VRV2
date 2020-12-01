<?php
$howMachActors = 4;
$actors = [1 => ''];
for ($numbActor = 2; $numbActor <= $howMachActors; $numbActor++) {
    $actors[$numbActor] = ('');
}

function shieldingIfNeeded($actors)
{
    $allTypeEqual = true;
    $typeMain = gettype($actors[1]);
    foreach ($actors as $key => $actor) {
        if ($key > 1 && (gettype($actor) != $typeMain)) {
            $allTypeEqual = false;
            break;
        }
    }
    if ($allTypeEqual) {
        return false;
    }
    if (empty($allTypeEqual)) {
        foreach ($actors as $key => $actor) {
            $actors[$key] = (string)$actor;
        }
        return true;
    }
    return '';
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
                    <label for="">Напишите имена любимых актеров
                        <?php
                        foreach ($actors as $key => $actor) {
                            ?>
                            <input type="text" name="<?= $key; ?>" size="50" maxlength="45"
                                   placeholder="Имя актера <?= $key; ?>" required>
                            <br>
                        <?php } ?>
                    </label>
                    <br>
                    <input type="submit" class="btn btn-success" value="Проверить отправку таких данных">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_GET[1])) {
                    foreach ($_GET as $key => $actor) {
                        if (is_numeric($actor)) {
                            $_GET[$key] = (integer)$actor;
                        }
                    }
                    $screening = shieldingIfNeeded($_GET);
                    if (empty($screening)) { ?>
                        <h5 class="text-success">Типы значений одинаковые. Не нужно экранировать.</h5>
                        <?php
                    }
                    if ($screening) { ?>
                        <h5 class="text-primary">Все значения преобразованы в строковые, так как типы значений были не
                            одинаковые.</h5>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

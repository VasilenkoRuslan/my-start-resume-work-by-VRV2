<?php
if (isset($_GET["date_start"])) {
    $time_start = strtotime($_GET["date_start"]);
    $time_finish = strtotime($_GET["date_finish"]);
    function getCorrectQuery($time_start, $time_finish)
    {
        $CorrectQuery = "";
        $time_start_plus_1year = strtotime(date("Y-m-d", $time_start) . "+ 1 year");
        if ($time_finish >= $time_start_plus_1year) {
            $CorrectQuery = 'SELECT *, RIGHT(`birthday`,5) AS `month_day` FROM `users` ORDER BY RIGHT(`birthday`,5)';
        }
        if ($time_finish < $time_start_plus_1year) {
            $month_day_start = date("m-d", $time_start);
            $month_day_finish = date("m-d", $time_finish);
            if ($month_day_start === $month_day_finish) {
                $CorrectQuery = 'SELECT *, RIGHT(`birthday`,5) AS `month_day` FROM `users` WHERE (RIGHT (`birthday`,5)) = "' . $month_day_start . '" ORDER BY RIGHT(`birthday`,5)';
            }
            if ($month_day_start < $month_day_finish) {
                $CorrectQuery = 'SELECT *, RIGHT (`birthday`,5) AS `month_day`  FROM `users` WHERE ((RIGHT (`birthday`,5)) > "' . $month_day_start . '") AND (RIGHT (`birthday`,5)) < "' . $month_day_finish . '" ORDER BY RIGHT(`birthday`,5)';
            }
            if ($month_day_start > $month_day_finish) {
                $CorrectQuery = 'SELECT *, RIGHT (`birthday`,5) AS `month_day`  FROM `users` WHERE ((RIGHT (`birthday`,5)) > "' . $month_day_start . '") OR (RIGHT (`birthday`,5)) < "' . $month_day_finish . '" ORDER BY RIGHT(`birthday`,5)';
            }
        }
        return $CorrectQuery;
    }
}
?>
<?php require "header.php"; ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№16. Datepicker.</h3>
                <h5>Создать два текстовых поля и подключить datepicker.
                    При выборе диапазона, вывести пользователей с датой рождения в этом диапазоне.</h5>
            </div>
        </div>
    </div>
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-center bg-light">
                <form action="" method="GET">
                    <label for="">Задайте диапазон: <br><br>
                        <input type="text" name="date_start" class="datepicker"
                               value="<?= isset($_GET["date_start"]) ? $_GET["date_start"] : ""; ?>"
                               required>
                        <input type="text" name="date_finish" class="datepicker"
                               value="<?= isset($_GET["date_finish"]) ? $_GET["date_finish"] : ""; ?>"
                               required>
                    </label><br><br>
                    <input type="submit" class="btn btn-success" value="Вывести ДР пользователей">
                </form>
            </div>
            <?php
            if (isset($_GET["date_start"])) {
                global $time_start, $time_finish;
//                echo date("Y-m-d", $time_start) . "<br>" . date("Y-m-d", $time_finish) . "<br>";
                if ($time_start > $time_finish) { ?>
                    <p class="text-danger"> Вы задали ошибочный(отрицательный) интервал</p>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    if (isset($_GET["date_start"])) {
        global $time_start, $time_finish;
        if ($time_start <= $time_finish) {
            ?>
            <div class="container bg-light borderForm">
                <div class="row">
                    <div class="col-md-12 jumbotron text-left bg-light">
                        <div class=" table-sm table-responsive-xl borderForm bg-dark">
                            <table class="table table-dark table-hover">
                                <thead>
                                <tr class="table-active text-primary">
                                    <th>Name users</th>
                                    <th>date birthday</th>
                                    <th>month and day birthday</th>
                                </tr>
                                <tr class="table-active text-warning">
                                    <th>Имя пользователя</th>
                                    <th>Дата рождения</th>
                                    <th>Месяц и день рождения</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqlQuery = mysqlQuery(getCorrectQuery($time_start, $time_finish));
                                while ($product = mysqli_fetch_assoc($sqlQuery)) {
                                    ?>
                                    <tr>
                                        <td> <?= $product['name']; ?></td>
                                        <td> <?= $product['birthday']; ?></td>
                                        <td> <?= $product['month_day']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</section>
<?php require "footer.php"; ?>

<?php require "header.php"; ?>
<?php
$howMachDayAdd = 10;
$sqlQuery = mysqlQuery("SELECT *, RIGHT(`birthday`,5) AS `month_day` FROM `task20` 
                                WHERE RIGHT(`birthday`,5)=RIGHT(DATE_ADD(CURRENT_DATE, INTERVAL $howMachDayAdd DAY),5) 
                                ORDER BY RIGHT(`birthday`,5)");
?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№20. Создать таблицу в базе данных.</h3>
                <h5>Создать таблицу в базе данных.
                    В которой будут находиться данные о пользователях. Одно из полей будет дата рождения.
                    Получить всех пользователей, у которых будет день рождение через 10 дней.</h5>
            </div>
        </div>
    </div>
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
</section>
<?php require "footer.php"; ?>

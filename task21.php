<?php require "header.php"; ?>
<?php
$arrayWithNumbers = [11,3,15,4,8,4,20,13,17,8,23,19];
$sqlQuery = mysqlQuery("SELECT *, RIGHT(`birthday`,5) AS `month_day` FROM `task20` WHERE `id` IN (".implode(',',$arrayWithNumbers).")");
?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№21. Массив чисел.</h3>
                <h5>Имеется массив чисел, получить из таблицы в задаче 20 список всех пользователей, чьи ID совпадают с числами из массива.</h5>
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

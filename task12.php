<?php include 'db.php';
include "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№12. Подключиться к БД.</h3>
                    <h5>Подключиться к БД.
                        Получить список всех товаров.
                        Вывести их на экран в алфавитном порядке. В виде таблицы.
                        Добавить ссылыки на редактирование товара и его удаление.
                        Так же добавить возможность создания товара, с выбором владельца этого товара.</h5>
                </div>
                <div class="col-sm-12 justify-content-center">
                    <div class="getProduct">
                        <h5>Выводим список всех товаров по алфавиту:</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 text-center table-responsive">
                    <div class="text-left">
                        <?php
                        $sql = true;
                        if (isset($_GET['delete_id'])) {
                            $sql = mysqlQuery("DELETE FROM `products` WHERE `id` = {$_GET['delete_id']}");
                        }

                        if (isset($_POST['update_id'])) {
                            $sql = mysqlQuery("UPDATE `products` SET `name` = {$_POST['name']},`price` = {$_POST['price']},`amount` = {$_POST['amount']},`provider` = {$_POST['providerCountry']},`date` = {$_POST['date']},`manager_id` = {$_POST['manager']} WHERE `id`={$_POST['update_id']}");
                        }

                        if (isset($_POST['create'])) {
                            $sql = mysqlQuery("INSERT INTO `products` (`name`,`price`,`amount`,`provider`,`date`,`manager_id`) VALUES ({$_POST['name']},{$_POST['price']},{$_POST['amount']},{$_POST['providerCountry']},{$_POST['date']},{$_POST['manager']})");
                        }

                        if (!$sql) {
                            global $mysqlConnect;
                            ?>
                            <p>Произошла ошибка: <?= mysqli_error($mysqlConnect); ?></p>
                            <?php
                        }
                        ?>
                        <h2>Список продуктов</h2>
                        <div class=" table-sm table-responsive-xl borderForm bg-dark">
                            <table class="table table-dark table-hover">
                                <thead>
                                <tr class="table-active text-primary">
                                    <th>Title</th>
                                    <th>Price of a piece</th>
                                    <th>Amount</th>
                                    <th>Provider country</th>
                                    <th>Date of delivery</th>
                                    <th>Manager</th>
                                    <th>Redaction</th>
                                    <th>Deletion</th>
                                </tr>
                                <tr class="table-active text-warning">
                                    <th>Продукт</th>
                                    <th>Цена за шт.</th>
                                    <th>Количество</th>
                                    <th>Страна-поставщик</th>
                                    <th>Дата поставки</th>
                                    <th>Менеджер</th>
                                    <th>Редактирование</th>
                                    <th>Удаление</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $sqlQuery = mysqlQuery('SELECT * FROM `products` ORDER BY `name` ASC');
                                    while ($product = mysqli_fetch_assoc($sqlQuery)) {
                                    ?>
                                    <td> <?= $product['name']; ?></td>
                                    <td> <?= $product['price']; ?> EUR</td>
                                    <td> <?= $product['amount']; ?> pieces</td>
                                    <td> <?= $product['provider']; ?></td>
                                    <td> <?= $product['date']; ?></td>
                                    <td>
                                        <?php
                                        $sqlQueryManager = mysqlQuery('SELECT * FROM `managers` ORDER BY `name`');
                                        while ($manager = mysqli_fetch_assoc($sqlQueryManager)) {
                                            if ($product['manager_id'] === $manager['id']) {
                                                echo $manager['name'];
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><a href="task12update.php?update_id=<?= $product['id']; ?>"
                                           class="btn btn-info">Изменить</a></td>
                                    <td>
                                        <button onclick="deleteConfirm('<?= $product['id']; ?>', '<?= $product['name']; ?>');"
                                                class="btn btn-danger">Удалить
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7" class="text-center"><a href="task12create.php"
                                                                           class="btn btn-success">Добавить новый
                                            товар</a></td>
                                    <td colspan="1" class="text-center"><a href="task12.php" class="btn btn-primary">Обновить</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteConfirm(id, product) {
            let r = confirm("Вы уверены что хотите удалить \nпродукт '" + product + "'?");
            if (r === true) {
                document.location = "?delete_id=" + id;
            }
        }
    </script>
<?php include "footer.php"; ?>
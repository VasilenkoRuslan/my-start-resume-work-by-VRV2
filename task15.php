<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№15. Создать таблицу в базе данных с полями created_at и updated_at.</h3>
                <h5>Создать таблицу в базе данных с полями created_at и updated_at,
                    по умолчанию данные поля null, когда создается запись created должно автоматически
                    назначаться и при обновлении updated тоже устанавливать текущее время.</h5>
            </div>
        </div>
    </div>
    <div class="container bg-light borderForm">
        <div class="col-sm-12 text-center table-responsive">
            <div class="text-left">
                <?php
                if (isset($_GET['del_id'])) {
                    $sql = mysqlQuery("DELETE FROM `products2` WHERE `id` = '{$_GET['del_id']}'");
//                        $sql->bind(':productId', $_GET['product_id']);

                    if (!$sql) {
                        global $mysqlConnect;
                        echo '<p>Произошла ошибка: ' . mysqli_error($mysqlConnect) . '</p>';
                    }
                    if ($sql) {
                        echo "<p style='color: red'>Товар удален.</p>";
                    }
                }

                if (isset($_POST["name"])) {
                    $sql = false;
                    if (isset($_POST['red'])) {
                        $sql = mysqlQuery("UPDATE `products2` SET `name` = '{$_POST['name']}',`price` = '{$_POST['price']}',`amount` = '{$_POST['amount']}',`update_at` = CURRENT_TIME(),`manager_id` = '{$_POST['manager']}' WHERE `id`={$_POST['red_id']}");
                    }
                    if (isset($_POST['add'])) {
                        $sql = mysqlQuery("INSERT INTO `products2` (`name`,`price`,`amount`,`create_at`,`update_at`,`manager_id`) VALUES ('{$_POST['name']}','{$_POST['price']}','{$_POST['amount']}', CURRENT_TIME(), CURRENT_TIME(),'{$_POST['manager']}')");
                    }

                    if (!$sql) {
                        global $mysqlConnect;
                        echo '<p>Произошла ошибка: ' . mysqli_error($mysqlConnect) . '</p>';
                    }
                    if ($sql) {
                        echo '<p>Успешно!</p>';
                    }

                }

                if (isset($_GET['red_id'])) {
                    $sql = mysqlQuery("SELECT `id`,`name`, `price`,`amount`,`manager_id` FROM `products2` WHERE `id`={$_GET['red_id']}");
                    $product = mysqli_fetch_assoc($sql);
                    ?>
                    <br>
                    <div class="container borderForm bg-secondary text-warning">
                        <h3 class="text-center text-warning">Форма редактирования</h3>
                        <form action="task15.php" method="post">
                            <input type="hidden" name="red">
                            <input type="hidden" name="red_id" value="<?= $_GET['red_id']; ?>">
                            <table>
                                <tr>
                                    <td>Наименование:</td>
                                    <td><input type="text" name="name"
                                               value="<?= isset($_GET['red_id']) ? $product['name'] : ''; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цена:</td>
                                    <td><input type="number" name="price" size="5"
                                               value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> EUR
                                    </td>
                                </tr>
                                <tr>
                                    <td>Количество:</td>
                                    <td><input type="number" name="amount" size="5"
                                               value="<?= isset($_GET['red_id']) ? $product['amount'] : ''; ?>"> шт.
                                    </td>
                                </tr>
                                <tr>
                                    <td>Менеджер продажи товара:</td>
                                    <td>
                                        <select class="default-select" name="manager">
                                            <?php
                                            if (isset($_GET['red_id'])) {
                                                $sqlQueryManager = mysqlQuery('SELECT * FROM `managers2`');
                                                while ($manager = mysqli_fetch_assoc($sqlQueryManager)) {
                                                    ?>
                                                    <option value="<?= $manager['id']; ?>" <?= $manager['id'] === $product['manager_id'] ? 'selected' : '';
                                                    ?>
                                                    > <?= $manager['name']; ?> </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Редактировать" class="btn btn-info">
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </form>
                    </div>
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
                            <th>Date create</th>
                            <th>Date update</th>
                            <th>Manager</th>
                            <th>Redaction</th>
                            <th>Delete</th>
                        </tr>
                        <tr class="table-active text-warning">
                            <th>Продукт</th>
                            <th>Цена за шт.</th>
                            <th>Количество</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                            <th>Менеджер</th>
                            <th>Редактирование</th>
                            <th>Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $sqlQuery = mysqlQuery('SELECT * FROM `products2` ORDER BY `name` ASC');
                            while ($product = mysqli_fetch_assoc($sqlQuery)) {
                            ?>
                            <td> <?= $product['name']; ?></td>
                            <td> <?= $product['price']; ?> EUR</td>
                            <td> <?= $product['amount']; ?> pieces</td>
                            <td> <?= $product['create_at']; ?></td>
                            <td> <?= $product['update_at']; ?></td>
                            <td>
                                <?php
                                $sqlQueryManager = mysqlQuery('SELECT * FROM `managers2` ORDER BY `name` ASC');
                                while ($manager = mysqli_fetch_assoc($sqlQueryManager)) {
                                    if ($product['manager_id'] === $manager['id']) {
                                        echo $manager['name'];
                                    }
                                }
                                ?></td>
                            <td><a href="?red_id=<?= $product['id']; ?>" class="btn btn-info">
                                    Изменить </a></td>
                            <td><a href="?del_id=<?= $product['id']; ?>" class="btn btn-danger">
                                    Удалить </a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="8" class="text-center"><a href="?add=new" class="btn btn-success">Добавить
                                    новый товар</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <br>
            </div>
            <?php
            if (isset($_GET['add'])) {
                ?>
                <div class="container borderForm bg-secondary text-warning">
                    <h3 class="text-center">Форма добавления продукта</h3>
                    <form action="task15.php" method="post">
                        <fieldset>
                            <input type="hidden" name="add">
                            <table class="text-left">
                                <tr>
                                    <td>Наименование:</td>
                                    <td><label for=""><input type="text" name="name"></label></td>

                                </tr>
                                <tr>
                                    <td>Цена:</td>
                                    <td><label for=""><input type="number" name="price" size="5">
                                            EUR</label></td>
                                </tr>
                                <tr>
                                    <td>Количество:</td>
                                    <td><label for=""><input type="number" name="amount" size="5">
                                            шт.</label></td>
                                </tr>
                                <tr>
                                    <td>Менеджер продажи товара:</td>
                                    <td><label for="">
                                            <select class="default-select" name="manager">
                                                <?php
                                                $sqlQueryManager = mysqlQuery('SELECT * FROM `managers2`');
                                                while ($manager = mysqli_fetch_assoc($sqlQueryManager)) {
                                                    ?>
                                                    <option value="<?= $manager['id']; ?>"> <?= $manager['name']; ?> </option>
                                                    <?php
                                                }
                                                ?>
                                            </select></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" class="btn btn-success"
                                                           value="Добавить товар">
                                    </td>
                                </tr>
                            </table>
                            <br>
                    </form>
                </div><br>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

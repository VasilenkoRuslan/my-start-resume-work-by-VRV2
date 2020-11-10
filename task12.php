<?php

$host= '91.239.235.118';
$userName="vasilenko_ruslan";
$userPassword="flexi140";
$dbName="vrvtask";

$link= mysqli_connect($host, $userName, $userPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Ошибка подключения";
    exit();
}
?>
<?php require "header.php";?>
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
    if (isset($_GET['del_id'])) {
        $sql = mysqli_query($link, "DELETE FROM `products` WHERE `id_product` = {$_GET['del_id']}");
        if ($sql) {
            echo "<p style='color: red'>Товар удален.</p>";
        } else {
            echo '<p>Произошла ошибка: '.mysqli_error($link).'</p>';
        }
    }

    if (isset($_POST["name"])) {
        if (isset($_GET['red_id'])) {
            $sql = mysqli_query($link, "UPDATE `products` SET `name_product` = '{$_POST['name']}',`price` = '{$_POST['price']}',`amount` = '{$_POST['amount']}',`provider_country` = '{$_POST['providerCountry']}',`date_of_delivery` = '{$_POST['date']}' WHERE `id_product`={$_GET['red_id']}");
        } else {
            $sql = mysqli_query($link, "INSERT INTO `products` (`name_product`,`price`,`amount`,`provider_country`,`date_of_delivery`) VALUES ('{$_POST['name']}','{$_POST['price']}','{$_POST['amount']}','{$_POST['providerCountry']}','{$_POST['date']}')");
        }

        if ($sql) {
            echo '<p>Успешно!</p>';
            $_GET["add"]=false;
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }

    if (isset($_GET['red_id'])) {
        $sql = mysqli_query($link, "SELECT `id_product`,`name_product`, `price`,`amount`,`provider_country`,`date_of_delivery` FROM `products` WHERE `id_product`={$_GET['red_id']}");
        $product = mysqli_fetch_assoc($sql);
?>
                        <br>
                        <div class="container borderForm bg-secondary text-warning">
                            <h3 class="text-center text-warning">Форма редактирования</h3>
                            <form action="" method="post">
                            <table>
                            <tr>
                                <td>Наименование:</td>
                                <td><input type="text" name="name" value="<?= isset($_GET['red_id']) ? $product['name_product'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Цена:</td>
                                <td><input type="text" name="price" size="5" value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> EUR</td>
                            </tr>
                            <tr>
                                <td>Количество:</td>
                                <td><input type="text" name="amount" size="5" value="<?= isset($_GET['red_id']) ? $product['amount'] : ''; ?>"> шт.</td>
                            </tr>
                            <tr>
                                <td>Страна-производитель:</td>
                                <td><input type="text" name="providerCountry" size="25" value="<?= isset($_GET['red_id']) ? $product['provider_country'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Дата поставки:</td>
                                <td><input type="date" name="date" size="10" value="<?= isset($_GET['red_id']) ? $product['date_of_delivery'] : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Редактировать" class="btn btn-info"></td>
                            </tr>
                            </table><br>
                            </form>
                        </div>
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
                        <th>Provider country</th>
                        <th>Date of delivery</th>
                        <th>Redaction</th>
                        <th>Deletion</th>
                    </tr>
                    <tr class="table-active text-warning">
                        <th>Продукт</th>
                        <th>Цена за шт.</th>
                        <th>Количество</th>
                        <th>Страна-поставщик</th>
                        <th>Дата поставки</th>
                        <th>Редактирование</th>
                        <th>Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
<?php
    $sqlQuery=mysqli_query($link,'SELECT * FROM `products` ORDER BY `name_product` ASC');
    while($product=mysqli_fetch_assoc($sqlQuery)) {
?>
                        <td> <?php echo $product['name_product']; ?></td>
                        <td> <?php echo $product['price']; ?> EUR</td>
                        <td> <?php echo $product['amount']; ?> pieces</td>
                        <td> <?php echo $product['provider_country']; ?></td>
                        <td> <?php echo $product['date_of_delivery']; ?></td>
                        <td> <a href="?red_id=<?php echo $product['id_product']; ?>" class="btn btn-info"> Изменить </a></td>
                        <td> <a href="?del_id=<?php echo $product['id_product']; ?>" class="btn btn-danger"> Удалить </a></td>
                    </tr>
<?php
    }
?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" class="text-center"><a href="?add=new" class="btn btn-success">Добавить новый товар</a></td>
                        <td colspan="1" class="text-center"><a href="task12.php" class="btn btn-primary">Обновить</a></td>
                    </tr>
                    </tfoot>
                    </table>
                    </div><br>
                </div>
<?php
    if ($_GET["add"]) {
?>
                <div class="container borderForm bg-secondary text-warning">
                    <h3 class="text-center">Форма добавления продукта</h3>
                    <form action="" method="post">
                        <table class="text-left">
                            <tr>
                                <td>Наименование:</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td>Цена:</td>
                                <td><input type="text" name="price" size="5"> EUR</td>
                            </tr>
                            <tr>
                                <td>Количество:</td>
                                <td><input type="text" name="amount" size="5"> шт.</td>
                            </tr>
                            <tr>
                                <td>Страна-производитель:</td>
                                <td><input type="text" name="providerCountry" size="25"></td>
                            </tr>
                            <tr>
                                <td>Дата поставки:</td>
                                <td><input type="date" name="date" size="10"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn btn-success" value="Добавить товар"></td>
                            </tr>
                        </table><br>
                    </form>
                </div><br>
<?php
    }
?>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
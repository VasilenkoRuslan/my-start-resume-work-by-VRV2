<?php include 'db.php'; ?>
<?php include "header.php"; ?>
    <section class="tasks bg-info">
        <?php
        $sql = mysqlQuery("SELECT * FROM `products` WHERE `id`={$_GET['update_id']}");
        $product = mysqli_fetch_assoc($sql);
        ?>
        <br>
        <div class="container borderForm bg-secondary text-warning">
            <h3 class="text-center text-warning">Форма редактирования</h3>
            <form action="task12.php" method="post">
                <input type="hidden" name="update_id" value="<?= $product['id']; ?>">
                <table>
                    <tr>
                        <td>Наименование:</td>
                        <td><label for=""><input type="text" name="name" value="<?= $product['name']; ?>"></label>
                        </td>
                    </tr>
                    <tr>
                        <td>Цена:</td>
                        <td><label for=""><input type="number" name="price" size="5"
                                                 value="<?= $product['price']; ?>"> EUR</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Количество:</td>
                        <td><label for=""><input type="number" name="amount" size="5"
                                                 value="<?= $product['amount']; ?>"> шт.</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Страна-производитель:</td>
                        <td><label for=""><input type="text" name="providerCountry" size="25"
                                                 value="<?= $product['provider']; ?>"></label>
                        </td>
                    </tr>
                    <tr>
                        <td>Дата поставки:</td>
                        <td><label for=""><input type="date" name="date" size="10"
                                                 value="<?= $product['date']; ?>"></label>
                        </td>
                    </tr>
                    <tr>
                        <td>Менеджер продажи товара:</td>
                        <td><label for="">
                                <select class="default-select" name="manager">
                                    <?php
                                    $sqlQueryManager = mysqlQuery('SELECT * FROM `managers`');
                                    while ($manager = mysqli_fetch_assoc($sqlQueryManager)) {
                                        ?>
                                        <option value="<?= $manager['id']; ?>" <?= $manager['id'] === $product['manager_id'] ? 'selected' : ''; ?>> <?= $manager['name']; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select></label>
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
    </section>
<?php include "footer.php"; ?>
<?php include 'db.php'; ?>
<?php include "header.php"; ?>
<section class="tasks bg-info">
    <div class="container borderForm bg-secondary text-warning">
        <h3 class="text-center">Форма добавления продукта</h3>
        <form action="task12.php" method="post">
            <fieldset>
                <input type="hidden" name="create">
                <table class="text-left">
                    <tr>
                        <td>Наименование:</td>
                        <td><label for=""><input type="text" name="name"></label></td>
                    </tr>
                    <tr>
                        <td>Цена:</td>
                        <td><label for=""><input type="number" name="price" size="5"> EUR</label></td>
                    </tr>
                    <tr>
                        <td>Количество:</td>
                        <td><label for=""><input type="number" name="amount" size="5"> шт.</label></td>
                    </tr>
                    <tr>
                        <td>Страна-производитель:</td>
                        <td><label for=""><input type="text" name="providerCountry" size="25"></label></td>
                    </tr>
                    <tr>
                        <td>Дата поставки:</td>
                        <td><label for=""><input type="date" name="date" size="10"></label></td>
                    </tr>
                    <tr>
                        <td>Менеджер продажи товара:</td>
                        <td><label for="">
                                <select class="default-select" name="manager">
                                    <?php
                                    $sqlQueryManager = mysqlQuery('SELECT * FROM `managers`');
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
    </div>
    <br>
</section>
<?php include "footer.php"; ?>

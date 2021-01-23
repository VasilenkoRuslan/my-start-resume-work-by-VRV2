<?php require "header.php"; ?>
<head>
    <style>
        .remove_input_btn {
            width: 30px;
            height: 30px;
            font-size: 10px;
            margin-left: 10px;

        }
    </style>
</head>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№33. Создать форму с неограниченной возможностью добавления инпутов..</h3>
                <h5>Пример:
                    ФИО
                    Адрес
                    Названия книг, что прочитали (и тут должна быть кнопка добавить еще)

                    Что-то вроде этого:
                    !Untitled.png|thumbnail!

                    Количество добавлений не ограничено.

                    Так же для каждой добавленной строки — должна быть иконка удалить с работающим функционалом.
                    Засабмитить эту форму.
                    Придумать структуру БД для хранения такой информации.
                    Сохранить форму в БД.


                    # Работа с динамическим контентом
                    # Основные свойства элемента (.css, .show, .hide, .add_class, ...)
                    # Get & Post
                    # Нативный php
                    # Insert
                    # SQL injection</h5>
            </div>
        </div>
    </div>
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <form action="" method="POST" class="text-center">
                    <label for="name">Your full name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?= (isset($_POST['name'])) ? $_POST['name'] : ''; ?>">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?= (isset($_POST['address'])) ? $_POST['address'] : ''; ?>">
                    <label for="book">Books</label>
                    <div class="books">
                        <div class="form-group form-inline"><input type="text" class="form-control col" name="books[]"
                                                                   id="book">
                            <button class="btn btn-danger remove_input_btn">x</button>
                        </div>
                    </div>
                    <button class="btn btn-success form-control col-3" id="addBook" name="addBook" type="button">add
                        book more
                    </button>
                    <input type="submit" class="btn btn-primary form-control" name="send" style="margin-top: 20px"
                           value="Submit">
                </form>
            </div>
            <?php
            $query = "
                CREATE TABLE IF NOT EXISTS readers(
                id INT AUTO_INCREMENT PRIMARY KEY,
                reader VARCHAR(100) NOT NULL,
                address VARCHAR(100) NOT NULL
               );
    ";
            mysqlQuery($query);
            $query = "CREATE TABLE IF NOT EXISTS books(
                id INT AUTO_INCREMENT PRIMARY KEY,
                book VARCHAR(50) NOT NULL,
                id_user INT,
                FOREIGN KEY (id_user) REFERENCES readers (id) );
        ";
            mysqlQuery($query);
            if (isset($_POST['send'])) {
                $reader = $_POST['name'];
                $address = $_POST['address'];
                $books = [];
                if (isset($_POST['books'])) {
                    for ($i = 0; $i < count($_POST['books']); $i++) {
                        $books [$i] = $_POST['books'][$i];
                    }
                }
                global $mysqlConnect;
                $queryInsertReader = $mysqlConnect->prepare("INSERT INTO `readers` (reader, address) VALUES (?, ?)");
                $queryInsertReader->bind_param("ss", $reader, $address);
                $queryInsertReader->execute();
                $id = $mysqlConnect->insert_id;
                if (isset($id)) {
                    if (count($books) > 0) {
                        $query = "INSERT INTO `books` (book, id_user) VALUES ('{$books[0]}', $id)";
                        for ($n = 1; $n < count($books); $n++) {
                            $query .= ", ('{$books[$n]}',$id)";
                        }
                        $queryInsertBook = $mysqlConnect->prepare($query);
                        $queryInsertBook->execute();
                    }
                }
            }

            $queryAll = mysqlQuery("SELECT *, R.id AS redid FROM `readers` AS R LEFT JOIN `books` AS B ON B.id_user = R.id ORDER BY R.id");
            ?>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Reader</th>
                    <th scope="col">Address</th>
                    <th scope="col">Books</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    $last_id_reader = "";
                    while ($row = mysqli_fetch_assoc($queryAll)) {
                    if ($last_id_reader === $row['redid']) {
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <?= $row["book"]; ?> </td>
                </tr>
                <?php
                }
                if ($last_id_reader !== $row['redid']) {
                    $last_id_reader = $row['redid'];
                    ?>
                    <tr>
                        <td> <?= $row['redid']; ?> </td>
                        <td> <?= $row['reader'] ?> </td>
                        <td> <?= $row['address']; ?> </td>
                        <td> <?= $row["book"]; ?> </td>
                    </tr>
                    <?php
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(this).on("click", "#addBook", function () {
            var html = '<div class="form-group form-inline"><input type="text" class="form-control col" name="books[]">';
            html += '<button class="btn btn-danger remove_input_btn">x</button></div>';
            $(".books").append(html);
        });

        $(this).on("click", ".remove_input_btn", function () {
            $(this).parent().remove();
        });
    })
</script>
<?php include "footer.php"; ?>

<?php require "header.php"; ?>
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
                <form action="" methood="POST" class="form-inline">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <label for="book">Book</label>
                    <input type="text" class="form-control" name="books[]" id="book">

                    <div class="col-md-12">
                        <button class="btn btn-success form-control-plaintext" id="addBook" name="addBook" style="margin-top: 32px" type="button">Add book</button>
                    </div>

                    <div class="col buttons" style="display: inline-block">
                    </div>
                    <button type="submit" class="btn btn-primary" name="send" style="margin-top: 20px">Submit</button>
                </form>
            </div>
            <?php
            try
            {
            /*
            $query = "
                CREATE TABLE readers(
                id INT AUTO_INCREMENT PRIMARY KEY,
                reader VARCHAR(100) NOT NULL,
                address VARCHAR(100) NOT NULL
               );
    ";
            $db->exec($query);
            $query = "CREATE TABLE books(
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_user INT,
                book VARCHAR(50) NOT NULL,
                FOREIGN KEY (id_user) REFERENCES readers (id) );
        ";
            $db->exec($query);
           */
            if (isset($_POST['send']))
            {
                $reader = $_POST['fio'];
                $address = $_POST['address'];
                $books = [];
                if(isset($_POST['books']))
                {
                    for($i = 0; $i < count($_POST['books']); $i++)
                    {
                        $books [] = $_POST['books'][$i];
                    }
                }
                $queryInsertReader = $db->prepare("INSERT INTO readers(reader, address) VALUES (:reader, :address)");
                $result = $queryInsertReader->execute(array(':reader' => $reader, ':address' => $address));
                $id = $db->lastInsertId();
                if(isset($id))
                {
                    if(count($books) > 0)
                    {
                        $query = "INSERT INTO books (id_user, book) VALUES ($id, '{$books[0]}')";
                        for($i = 1; $i < count($books); $i++)
                        {
                            $query .= ", ($id, '$books[$i]')";
                        }
                        $queryInsertBook = $db->prepare($query);
                        $queryInsertBook->execute();
                    }
                }
            }

            $queryAll = $db->query("SELECT * FROM `readers`")->fetchAll();

            ?>

        </div>
    </div>
</section>
<?php include "footer.php"; ?>

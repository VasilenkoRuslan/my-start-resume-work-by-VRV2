<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№19. Защита от SQL injection.</h3>
                <h5>Форму из задачи номер 9: необходимо данные сохранять в базу данных, предварительно защитив их от sql
                    injection.</h5>
            </div>
            <div class="col-sm-8 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <label for="nameFile">Укажите Ваше имя:</label><br>
                        <input type="text" id="nameFile" class="form-control" name="name" size="50" maxlength="50"
                               placeholder="Имя"
                               required><br>
                        <label for="text">Ваш комментарий:</label><br>
                        <textarea class="form-control" rows="5" cols="50" id="text" name="comment"
                                  placeholder="Комментарий" required></textarea><br>
                        <input type="submit" class="btn btn-success" value="Записать в БД">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_POST["name"], $_POST["comment"])) {
                    global $mysqlConnect;
                    $sql = $mysqlConnect->prepare("INSERT INTO `task19` (`name`,`comment`) VALUES ( ?, ?)");
                    $sql->bind_param("ss", $_POST["name"], $_POST["comment"]);
                    $sql->execute();
                    if (!$sql) {
                        global $mysqlConnect;
                        ?>
                        <p>Произошла ошибка: <?= mysqli_error($mysqlConnect); ?></p>
                        <?php
                    }
                    $sql->close();
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

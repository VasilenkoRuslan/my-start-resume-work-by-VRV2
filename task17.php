<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№17. Выполнить следующую последовательность.</h3>
                    <h5>Выполнить следующую последовательность: <br>
                        - Создать форму, выбрать файл и отправить на сервер. <br>
                        - Отправить несколько файлов на сервер и сохранить их. <br>
                        - Вывести на странице файл. Если это картинка просто выводим ее, если нет, по клику скачиваем.
                    </h5>
                </div>
            </div>
            <div class="col-md-12 jumbotron text-left bg-light">
                <div class="form">
                    <form action="" method="GET">
                        <label for="">
                            <input type="file">
                        </label>
                        <input type="submit" value="Отправить на сервер">
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>
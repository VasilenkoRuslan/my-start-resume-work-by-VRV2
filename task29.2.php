<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№29. Создать два сайта.</h3>
                    <h5>Создать два сайта.
                        Один должен всегда сохранять в базу адрес с которого пришел клиент. Данный параметр можно найти
                        в глобальной переменной сервер.<br>
                        На втором сайте нужно создать три, четыре, любое произвольное количество страниц и ссылку на на
                        первый сайт.<br>
                        Заблокировать посещение сайта с определённые ссылки (если видим что пользователь пришел с такой
                        страницы).<br>
                        Должен быть соответствующий статус в header и определённый контент, что доступ закрыт с данной
                        ссылки. Если заходим с другой, контент нормальный.</h5>
                    <p>
                        <a href="task29.2.1.php" class="btn btn-outline-info"> Перейти на task29.2.1</a>
                        <a href="task29.2.2.php" class="btn btn-outline-info"> Перейти на task29.2.2</a>
                        <a href="task29.2.3.php" class="btn btn-outline-info"> Перейти на task29.2.3</a>
                        <a href="task29.error.php" class="btn btn-outline-info"> Перейти на task29.error</a>
                        <a href="task29.1.php" class="btn btn-outline-info"> Перейти на первый сайт(task29.1)</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>
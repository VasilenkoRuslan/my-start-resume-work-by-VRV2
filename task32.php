<?php require "header.php"; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn').click(function () {
                $.ajax({
                    method: "POST",
                    url: 'task32/task32obr.php',
                    dataType: 'json',
                    data: {
                        'login': $('#login').val(),
                        'password': $('#password').val()
                    },
                    error: function (e) {
                        console.log(e);
                    },
                }).done(function (data) {
                    if (data.status === 400) {
                        alert("Ошибка: " + data.error);
                    }
                    if (data.status === 200) {
                        alert(data.result);
                    }
                });
            });
        });
    </script>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№32. Создать форму, API и отдельный сайт.</h3>
                    <h5>Выполнить следующие задачи:<br>
                        - Создать форму и обработчик для нее. Если пользователь ввел неправильные данные, должна
                        вернуться ошибка валидации и соответствующий статус. Данные должны отправляться через AJAX и
                        сохраняться в базу данных.<br>
                        - Создать простое api. Которое будет отдавать данные всех пользователей (см пункт 3) так же
                        иметь возможность удалить данные через post запрос.<br>
                        - Создать отдельный сайт. В котором данные должны получаться через curl с api, которое было
                        создано ранее.</h5>
                </div>
            </div>
        </div>
        <div class="container bg-light borderForm">
            <form action="" class="form-group">
                РЕГИСТРАЦИЯ:<br>
                <label for="login">Введите новый логин: </label>
                <input type="text" class="form-control" name="login" maxlength="50" size="50" id="login"
                       placeholder="Enter Username">
                <label for="password">Введите пароль: </label>
                <input type="password" class="form-control" name="password" maxlength="50" size="50" id="password"
                       placeholder="Enter Password"><br>
                <button type="button" class="btn btn-outline-info" id="btn">Зарегестрировать</button>
            </form>
            <div class="col-md=12 text-center"><a href="task32/" class="btn btn-warning form-control">Список
                    пользователей(task32 CURL)</a></div>
        </div>
    </section>
<?php require "footer.php"; ?>
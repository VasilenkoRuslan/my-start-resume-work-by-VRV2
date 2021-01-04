<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№32. Создать форму, API и отдельный сайт.</h3>
                    <h5>Выполнить следующие задачи:<br>
                        - Создать форму и обработчик для нее. Если пользователь ввел неправильные данные, должна вернуться ошибка валидации и соответствующий статус. Данные должны отправляться через AJAX и сохраняться в базу данных.<br>
                        - Создать простое api. Которое будет отдавать данные всех пользователей (см пункт 3) так же иметь возможность удалить данные через post запрос.<br>
                        - Создать отдельный сайт. В котором данные должны получаться через curl с api, которое было создано ранее.</h5>
                </div>
            </div>
        </div>

        <div class="container bg-light borderForm">
            <form action="task32obr.php" method="POST" name="form1" class="form-group">
            <label for="login">Введите логин: </label>
            <input type="text" class="form-control" name="login" maxlength="50" size="50" id="login" placeholder="Enter Username">
            <label for="password">Введите пароль: </label>
            <input type="password" class="form-control" name="password" maxlength="50" size="50" id="password" placeholder="Enter Password"><br>
            <button type="submit" class="btn btn-outline-info">Войти</button>
            </form>
        </div>

    </section>
<?php require "footer.php"; ?>
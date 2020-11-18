<?php
$typeWoman = 'Woman';
$typeMan = 'Man';
$startInputYear = 1969;
$endInputYear = 2009;
?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-9 jumbotron text-left bg-light">
                <h3>Задание№8. Создать форму.</h3>
                <h5>Создать форму с несколькими типами элементов формы.</h5>
            </div>
            <div class="col-sm-10 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <h5>Форма для заполнения данных(мини резюме)</h5><br>
                        <label for="name">Имя:<br>
                            <input type="text" name="name" size="50" maxlength="45" placeholder="Введите ваше имя"
                                   id="name" required><br>
                        </label><br>
                        <label for="surname">Фамилия:<br>
                            <input type="text" name="surname" size="50" maxlength="45"
                                   placeholder="Введите вашу фамилию" id="surname" required><br>
                        </label><br>
                        Пол:<br>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="woman">
                                <input type="radio" class="form-check-input" value="<?= $typeWoman ?>" name="gender"
                                       id="women">Женский
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="man">
                                <input type="radio" class="form-check-input" value="<?= $typeMan ?>" name="gender"
                                       id="man" checked>Мужской
                            </label>
                        </div>
                        <br><br>
                        <label for="yearOfBirth">Год рождения:</label>
                        <select class="default-select mb-3" id="yearOfBirth" name="yearOfBirth">
                            <?php for ($year = $startInputYear; $year <= $endInputYear; $year++) { ?>
                                <option> <?= $year ?> </option>
                                <?php
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <label for="information">Информация про Вас:
                                <textarea class="form-control" rows="5" cols="50" id="information"
                                          name="information"></textarea>
                            </label>
                        </div>
                        <input type="submit" class="btn btn-success" value="Отправить">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_POST["name"])) {

                    function respect($gender)
                    {
                        global $typeWoman;
                        global $typeMan;

                        switch ($gender) {
                            case $typeWoman:
                                return "Уважаемый";
                            case $typeMan:
                                return "Уважаемая";
                            default :
                                return "Не известрно кто";
                        }
                    }

                    $respect = respect($_POST["gender"]);
                    echo $respect . $_POST["name"] . ' ' . $_POST["surname"] . ' ' . $_POST["yearOfBirth"] . " года рождения!<br>Информация про Вас:<p style='color:green'>" . $_POST["information"] . '</p>добавлена в Вашу карточку.<br>Ваше резюме добавлено в список для рассмотрения.';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

<?php require "header.php";
if (isset($_POST["deleteFile"])) {
    unlink($_POST['nameFile'] . ".txt"); ?>
    <p class="text-danger text-center">Файл <?= $_POST['nameFile']; ?> удален.</p>
    <?php
}
?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№9. Создать файл и записать в него текст.</h3>
                <h5>Создать файл и записать в него какой-то текст, потом прочитать этот файл на другой странице и
                    удалить его.</h5>
            </div>
            <div class="col-sm-8 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <label for="nameFile">Укажите название файла, который вы хотите создать:<br>
                            <input type="text" name="nameFile" size="52" maxlength="50" placeholder="Название файла"
                                   required>
                        </label>
                        <br>
                        <label for="text">Напишите текст, который вы хотите вставить в файл:<br>
                            <textarea class="form-control" rows="5" cols="50" id="text" name="textIntoFile"
                                      placeholder="Текст внутри созданного файла" required></textarea>
                        </label>
                        <br>
                        <input type="submit" class="btn btn-success" value="Создать файл и записать в него текст">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_POST["nameFile"], $_POST["textIntoFile"])) {
                $fileText = fopen($_POST["nameFile"] . ".txt", "w+");
                $textInto = htmlspecialchars($_POST["textIntoFile"]);
                if (empty(fwrite($fileText, $textInto))) { ?>
                    <p class="text-danger">Запись не прошла.</p>
                <?php exit();
                }
                ?>
                <p>Файл создан!</p>
                <?php fclose($fileText); ?>
                <form action='task9readFile.php' method='POST'>
                    <input type='hidden' name='nameFile' value='<?= $_POST["nameFile"]; ?>'>
                    <input type='submit' class='btn btn-outline-primary' value='Открыть файл <?= $_POST["nameFile"]; ?> в новой вкладке'>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

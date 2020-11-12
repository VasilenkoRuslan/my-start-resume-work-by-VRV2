<?php
if (isset($_POST)) {

    if (isset($_POST["deleteFile"])) {
        $nameFile = $_POST['nameFile'];
        unlink($nameFile . ".txt");
        unlink($nameFile . ".php");
        echo "Файл $nameFile удален";
    }

    function createButton($name)
    {
        echo <<<EOD
            <form action='$name.php' method='POST'>
            <input type='hidden' name='nameFile' value='$name'>
            <a href='$name.php'>
<input type='submit' class='btn btn-outline-primary' value='Открыть файл $name в новой вкладке'></a>
EOD;
    }

    function createAndWrite($name, $textInto)
    {
        $textInto = htmlspecialchars($textInto);
        $fileName = $name . ".txt";
        $fileText = fopen($fileName, "w+");
        fwrite($fileText, $textInto);
        fclose($fileText);
        chmod($name . ".txt", 0777);
        $filePhp = fopen($name . ".php", "w+");

        $pageContent = <<<'EOD'
<?php require "header.php";?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row justify-content-center">
            <div class="col-sm-9 jumbotron text-center bg-light">
                <p><?php 
                $nameFileTxt=$_POST['nameFile'].".txt";
                echo file_get_contents($nameFileTxt);?></p>
                <form action="task9.php" method="POST">
                    <input type='hidden' name='nameFile' value='<?php echo $_POST["nameFile"]; ?>'><br>
                    <a href="task9.php"><input type='submit' name='deleteFile' class='btn btn-success' value='Удалить файл <?php echo $_POST["nameFile"]; ?> и вернутся'></a>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php";?>
EOD;
        fwrite($filePhp, $pageContent);
        fclose($filePhp);
        chmod($name . ".php", 0777);
        echo "Файл создан";
        createButton($name);
    }
}
?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№9. Создать файл и записать в него текст.</h3>
                <h5>Создать файл и записать в него какой-то текст, потом прочитать этот файл на другой странице и удалить его.</h5>
            </div>
            <div class="col-sm-8 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <label for="nameFile">Укажите название файла, который вы хотите создать:<br>
                            <input type="text" name="nameFile" size="52" maxlength="50" placeholder="Название файла" required>
                        </label>
                        <br>
                        <label for="text">Напишите текст, который вы хотите вставить в файл:<br>
                            <textarea class="form-control" rows="5" cols="50" id="text" name="textIntoFile" placeholder="Текст внутри созданного файла" required></textarea>
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
                if (isset($_POST["nameFile"]) and isset($_POST["textIntoFile"])) {
                    $nameFile = $_POST["nameFile"];
                    $textIntoFile = $_POST["textIntoFile"];
                    createAndWrite($nameFile, $textIntoFile);
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

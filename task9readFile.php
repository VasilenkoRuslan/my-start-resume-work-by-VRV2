<?php require "header.php"; ?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row justify-content-center">
                <div class="col-sm-9 jumbotron text-center bg-light">
                    <p><?= file_get_contents($_POST['nameFile'] . '.txt'); ?></p>
                    <form action="task9.php" method="POST">
                        <input type='hidden' name='nameFile' value='<?= $_POST["nameFile"]; ?>'><br>
                        <a href="task9.php"><input type='submit' name='deleteFile' class='btn btn-success'
                                                   value='Удалить файл <?= $_POST["nameFile"]; ?> и вернутся'></a>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php"; ?>

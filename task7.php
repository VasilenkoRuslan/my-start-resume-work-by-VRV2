<?php
if (isset($_GET)) {
    function sendCommand($string) {
        $stringEkran=addslashes($string);
        echo "вы хотите отправить команду ".$string."<br>";
        if ($stringEkran!=$string) {
            echo "Ваша команда экранирована";
        }
        echo "<h5>Команда ".$string." отправлена.</h5>";
    }
}
?>
<?php require "header.php";?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-sm-12 jumbotron text-left bg-light">
                    <h3>Задание№7. Создать функцию.</h3>
                    <h5>Создать функцию которая будет экранировать значения при необходимости, в зависимости от других значений.</h5>
                </div>
                <div class="col-sm-5 justify-content-center">
                    <form action="" method="GET">
                        <fieldset>
                            <h5>Введите команду(mySQL) для исполнения(для экранирования при необходимости):</h5>
                            <input type="text" name="string" size="50" maxlength="45" placeholder="Команда MySQL"><br>
                            <br>
                            <input type="submit" class="btn btn-success" value="Задать">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 jumbotron text-left">
                    <?php
                    if (isset($_GET["string"])) {
                        $string= $_GET["string"];
                            sendCommand($string);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require "footer.php";?>
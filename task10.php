<?php require "header.php"; ?>
<script type="text/javascript">
    function getResult()
    {
        let town = $('#town').val();
        $.ajax({
            type: "POST",
            url : 'task10ajax.php',
            data: {town: town}
        }).done(function (result) {
            $("#result").html(result);
        });
    }
</script>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№10. Создать выпадающий список с 10 странами.</h3>
                <h5>При выборе страны отображаем, какое сейчас там время. Допускается перезагрузка страницы. Но лучше без перезагрузки.</h5>
            </div>
            <div class="col-sm-12 justify-content-center">
                <form action="" method="POST">
                    <fieldset>
                        <h5>Пожалуйста, выберите город для отображения времени: </h5><br>
                        <label for="town">Страна, город:</label>
                        <select class="default-select mb-3 form-control" id="town" name="town">
                            <?php
                            $arrayTowns = [
                                "--Выберите город--",
                                "Europe/Kiev",
                                "Europe/Moscow",
                                "Europe/Minsk",
                                "Europe/London",
                                "America/New_York",
                                "Asia/Dubai",
                                "Australia/Sydney",
                                "America/Argentina/Buenos_Aires",
                                "Asia/Tokyo",
                                "Asia/Shanghai",
                            ];

                            foreach ($arrayTowns as $town){
                                echo '<option> ' . $town . ' </option>';
                            }

                             ?>
                        </select>
                        <input type='hidden' name='indexTown' id="index" value='<?php $town = $_POST['town'];
                        echo $indexTown = array_search($town, $arrayTowns); ?>'><br>
                        <input type="button" class="btn btn-success" name="submit" id="submit" value="Сколько время?" onclick="getResult()">
                    </fieldset>
                </form>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-center" id="result">
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>

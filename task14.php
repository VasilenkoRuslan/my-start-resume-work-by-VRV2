<?php
$varAnswer = array(
    "success" => "Конечно да!!",
    "info" => "Я и сам играю",
    "danger" => "Категорически, нет!",
    "secondary" => "Что в нем интересного???",
    "primary" => "Интересуюсь другими видами спорта"
);
?>
<?php require "header.php"; ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/task14.css">
    </head>
    <body>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№14. Всплывающее окно.</h3>
                <h5>Добавить на страницу всплывающее окно с каким-либо уведомлением.
                    Окно должно всплывать вместе с фоном, полностью затемняющим весь контент. Окно должно быть
                    отцентрировано по вертикали и горизонтали.
                    Появляется при клике на кнопку и закрываться при слдике на close btn.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="result_answer"></p>
                <button type="button" class="btn btn-lg btn-warning startAlert" onclick="fadeForm();">Нажмите,
                    пожалуйста,
                    кнопку!!!
                </button>
                <br><br>


                <div class="checkbox_div">
                    <input type="checkbox" id="checkbox_input">
                    <label for="checkbox_input" class="btn btn-lg btn-warning">Нажмите,
                        пожалуйста,
                        кнопку!!!</label>
                    <label for="checkbox_input" id="gray2"></label>
                    <div class="container" id="window2">
                        <div class="form text-center bg-warning borderForm alert">
                            <form action="" name="form_1">
                                <label for="checkbox_input" class="popup-closer">&#215;</label>
                                <h3 class="popup_h3">Любите ли ВЫ футбол?</h3><br>
                                <?php foreach ($varAnswer as $colorButton => $answer) { ?>
                                <label for="checkbox_input" class="btn btn-lg btn-outline-<?= $colorButton; ?>"
                                            onclick="getTextThankYou();"><?= $answer; ?></label>
                                    <br><br>
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div onclick="fadeForm();" id="gray"></div>
    <div class="container" id="window">
        <div class="form text-center bg-warning borderForm alert">
            <form action="" name="form_1">
                    <span class="btn_exit float-right close" onclick="fadeForm();"
                          style="font-size: 2em; color: darkblue;">
                        <i class="far fa-times-circle"></i>
                    </span>
                <h3 class="popup_h3">Любите ли ВЫ футбол?</h3><br>
                <?php foreach ($varAnswer as $colorButton => $answer) { ?>
                    <button type="button" class="btn btn-lg btn-outline-<?= $colorButton; ?>"
                            onclick="fadeForm(); getTextThankYou();"><?= $answer; ?></button>
                    <br><br>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</section>
<script>
    function fadeForm() {
        $('#window,#gray').toggle();
    }

    let clickAnswer = "off";

    function getTextThankYou() {
        if (clickAnswer === "off") {
            clickAnswer = "on";
            $('.result_answer').append("Спасибо за ответ!");
        }
    }

</script>
<?php require "footer.php"; ?>
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
        <title>

        </title>
        <style>
            #window {
                max-width: 45%;
                min-width: 30em;
                min-height: 40em;
                margin: 40% auto;
                z-index: 150;
                display: none;
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }

            #gray {
                background-color: rgba(1, 1, 1, 0.6);
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 100;
                display: none;
            }
        </style>
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
                <p class="result_answer">
                    <button type="button" class="btn btn-lg btn-warning startAlert" onclick="fadeForm();">Нажмите,
                        пожалуйста,
                        кнопку!!!
                    </button>
                    <br>
                </p>
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
                <h3 style="margin-left: 2em; color: mediumslateblue">Любите ли ВЫ футбол?</h3><br>
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
        $('#window,#gray').toggle(60);
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
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
                /*min-height: 70%;*/
                max-height: 100%;
                margin: 15% auto;
                z-index: 150;
                display: none;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                position: fixed;
                overflow-y: auto;
                overflow-x: hidden;
            }

            #gray {
                background-color: rgba(1, 1, 1, 0.6);
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 102;
                display: none;
            }

            #for_close_back {
                position: fixed;
                opacity: 0;
                visibility: hidden;
            }

            .popup {
                position: fixed;
                width: 100%;
                height: 100%;
                background-color: rgba(1, 1, 1, 0.6);
                top: 0;
                left: 0;
                opacity: 0;
                visibility: hidden;
                overflow-y: auto;
                overflow-x: hidden;
            }

            .popup:target {
                opacity: 1;
                visibility: visible;
            }

            .popup_area {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

            .popup_body {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 30px 20px;
                transition: all 0.8s ease 0s;
                margin: 5% auto;
            }

            .popup_content {
                min-height: 80%;
                max-width: 90%;
                min-width: 60%;
                padding: 30px;
                position: relative;
            }

            .popup_close {
                position: absolute;
                right: 10px;
                top: 10px;
                font-size: 2em;
                color: darkblue;

            }

            .popup_form {
            }

            .popup_h3 {
                color: mediumslateblue;
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
                    <br><br>
                    <a href="#popup" class="btn btn-lg btn-warning" onclick="">Нажмите,
                        пожалуйста,
                        кнопку!!!
                    </a>
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

    <div id="for_close_back"></div>
    <div class="popup" id="popup">
        <a href="#for_close_back" class="popup_area"></a>
        <div class="popup_body">
            <div class="popup_content bg-warning  text-center borderForm">
                <a href="#for_close_back" class="popup_close">
                    <span><i class="far fa-times-circle"></i></span></a>
                <div class="popup_form">
                    <form action="">
                        <h3 style="margin-left: 2em; color: mediumslateblue">Любите ли ВЫ футбол?</h3><br>
                        <?php foreach ($varAnswer as $colorButton => $answer) { ?>
                            <a href="#for_close_back" class="btn btn-lg btn-outline-<?= $colorButton; ?>"
                               onclick="getTextThankYou();"><?= $answer; ?></a>
                            <br><br>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
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
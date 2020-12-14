<?php require "header.php"; ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/task24style.css">
        <script src="js/task24.js"></script>
    </head>
<?php
$howMachBlocks = 5;
?>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№24. Добавить аккордеон на страница с контентом.</h3>
                    <h5>Добавить аккордеон на страницу с контентом.
                        При открытии одного блока, другой закрывается.
                        Скрипт должен быть сделан с учетом, что количество блоков
                        в аккордеоне может быть динамическим.
                        Т.е. должно одинаково работать, для любого
                        количества блоков.</h5>
                </div>
            </div>
        </div>
        <div class="container bg-light accordion">
            <?php
            for ($n = 1; $n <= $howMachBlocks; $n++) { ?>
                <div class="text-center accordion-item">
                    <div class="accordion-item__trigger bg-warning">Block #<?= $n; ?></div>
                    <div class="accordion-item__content bg-warning">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dignissimos distinctio
                        ducimus et eveniet, laboriosam laborum libero molestias mollitia natus, neque nihil quam quidem
                        repudiandae sint sit totam.
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
<?php require "footer.php"; ?>
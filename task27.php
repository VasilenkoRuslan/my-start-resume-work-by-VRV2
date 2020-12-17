<?php require "header.php"; ?>
<?php
$howMachBoxes = 4;
?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/task27.css">
        <title>vrvtask</title>
    </head>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№27. Создать простую страницу, в которой будет два блока с текстом и кнопкой load
                        more</h3>
                    <h5>Создать простую страницу в которой будет два блока с текстом и кнопкой load more.
                        По клику на первую отображаем скрытый текст который уже есть на странице. Сделать все средствами
                        css.</h5>
                </div>
            </div>
        </div>
        <div class="container bg-light borderForm">
            <?php for ($box = 1; $box <= $howMachBoxes; $box++) { ?>
                <div class="box">
                    <input type="checkbox" class="btnLoadMore" id="box_<?= $box; ?>">
                    <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab beatae deleniti
                        dolor doloremque, dolores dolorum est ex facilis laboriosam nemo nobis officiis quisquam
                        repellendus repudiandae sapiente sit tempora, totam! Dignissimos eius illum maxime. Aliquam
                        consequuntur eum impedit iusto laudantium quas rem rerum saepe similique suscipit?</p>
                    <label for="box_<?= $box; ?>" class="btn btn-outline-dark">Load More</label>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
<?php require "footer.php"; ?>
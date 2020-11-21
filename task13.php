<?php

?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№13. Создать кастомный чекбокс и радио баттон.</h3>
                <h5>Надо сделать кастомный чекбокс.</h5>
            </div>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="checkbox" class="check_input option">
                <span class="check_box"></span>
                First
            </label>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="checkbox" class="check_input option" checked>
                <span class="check_box"></span>
                Second
            </label>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="checkbox" class="check_input option" disabled>
                <span class="check_box"></span>
                Third
            </label>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="checkbox" class="check_input option" checked disabled>
                <span class="check_box"></span>
                Four
            </label>
        </div>
        <div class="col-md-12 jumbotron text-left bg-light">
            <h5>Кастомный радио баттон.</h5>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="radio" class="check_input option" name="radio_1">
                <span class="check_box radiobutton"></span>
                First
            </label>
        </div>
        <div class="col-md-12">
            <label class="check">
                <input type="radio" class="check_input option" name="radio_1">
                <span class="check_box radiobutton"></span>
                Second
            </label>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>


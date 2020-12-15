<?php require "header.php"; ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/task25.css">
        <title>vrvtask</title>
    </head>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№26. Создать два текстовых поля в который будет вводиться координаты места.</h3>
                    <h5>Создать два текстовых поля в который будет вводиться координаты места по нажатию на кнопки
                        должен устанавливаться маркер на карте.</h5>
                </div>
            </div>
        </div>
        <div class="container text-center bg-light">
            <div class="form">
                <form>
                <label>Задайте координаты маркера: <br>
                    <input type="number" id="lat" placeholder="lat">
                    <input type="number" id="lng" placeholder="lng">
                </label> <br>
                <button type="button" class="btn btn-primary btn-block btn-lg" id="btn">Задать</button>
                </form>
            </div>
            <h1>Location</h1>
            <div id="map" style="display: none"></div>
        </div>
    </section>
    <script src="js/task26.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkWlWThgmaiVzuwd6OIVkaenThF9nTBTc&callback=initMap"
            type="text/javascript">
    </script>
<?php require "footer.php"; ?>
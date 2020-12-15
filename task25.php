<?php require "header.php"; ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/task25.css">
    <script src="js/task25.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkWlWThgmaiVzuwd6OIVkaenThF9nTBTc&callback=initMap" type="text/javascript">
    </script>
    <title>vrvtask</title>
</head>
    <section class="tasks bg-info">
        <div class="container bg-light borderForm">
            <div class="row">
                <div class="col-md-12 jumbotron text-left bg-light">
                    <h3>Задание№25. Подключение google maps.</h3>
                    <h5>Подключить google maps и создать на ней маркер, на любой произвольный объект.</h5>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h1>Location</h1>
            <div id="map"></div>
        </div>
    </section>
<?php require "footer.php"; ?>
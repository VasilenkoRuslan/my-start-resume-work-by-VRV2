<?php
if (isset($_POST["town"])) {
    $town = $_POST["town"];
    if ($town=="--Выберите город--") {
        echo "<h3 style='color:darkred'>Вы не выбрали город!<br> Пожалуйста, выберите город.</h3>";
    } else {
        date_default_timezone_set("$town");
        echo "<h3 style='color:lightseagreen'>".$town."</h3><h4 style='color:darkblue'>".date("Y F d l G:i:s")."</h4>";
    }
}

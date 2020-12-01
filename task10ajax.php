<?php
if (isset($_POST["town"])) {
    $town = $_POST["town"];
    if ($town == "") {
        echo json_encode( "<h3 style='color:darkred'>Вы не выбрали город!<br> Пожалуйста, выберите город.</h3>");
    }
    if ($town !== ""){
        $arrayTown=timezone_identifiers_list();
        date_default_timezone_set($arrayTown["$town"]);
        echo json_encode("<h3 style='color:lightseagreen'>".$arrayTown[$town]."</h3><h4 style='color:darkblue'>".date('Y F d l G:i:s')."</h4>");
    }
}
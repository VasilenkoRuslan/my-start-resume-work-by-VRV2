<?php
if (isset($_POST["town"])) {
    $town = $_POST["town"];
    $data=[];
    if ($town == "") {
        $data["error"] = "error";
    }
    if ($town !== "") {
        $arrayTown = timezone_identifiers_list();
        date_default_timezone_set($arrayTown[$town]);
        $data["nameTown"]= $arrayTown[$town];
        $data["timeInTown"]= date('Y F d l G:i:s');
        $data["result"] = true;
    }
    echo json_encode($data);
}
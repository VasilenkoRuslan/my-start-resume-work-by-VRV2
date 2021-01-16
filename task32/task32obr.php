<?php
include('../init_db.php');
if (isset($_POST["login"])) {
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);
    $data = [];
    http_response_code(400);
    $data["status"] = 400;
    if ($login == "") {
        $data["error"][] = "Логин пуст";
        echo json_encode($data);
        exit();
    }
    if ($password == "") {
        $data["error"][] = "Пароль пуст";
        echo json_encode($data);
        exit();
    }
    if (strlen($login) < 3) {
        $data["error"][] = "Логин не может быть меньше 3х символов";
    }
    if (strlen($password) < 4) {
        $data["error"][] = "пароль не может быть меньше 4х символов";
    }
    if ($password == 1234) {
        $data["error"][] = "пароль не должен быть простым";
    }
    if (empty($data["error"])) {
        $data["status"] = 200;
        http_response_code(200);
        global $mysqlConnect;
        $sqlQuery = $mysqlConnect->prepare("INSERT INTO `registration` (`id`, `login`, `pass`) VALUES (NULL, ?, ?)");
        $sqlQuery->bind_param("ss", $login, $password);
        $sqlQuery->execute();
        $data["result"] = "Вы удачно зарегестрированы";
    }
    echo json_encode($data);
}
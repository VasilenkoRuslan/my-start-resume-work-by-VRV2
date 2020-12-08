<?php
include('db.php');

global $host, $userName, $userPassword, $dbName;

$mysqlConnect = mysqli_connect($host, $userName, $userPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Ошибка подключения";
    exit();
}

mysqli_set_charset($mysqlConnect, "utf8");

function mysqlQuery($query)
{
    global $mysqlConnect;
    return mysqli_query($mysqlConnect, $query);
}

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header('Content-type: json/application');

include ("../init_db.php");
require 'task32functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
if(isset($params[1]))
    $id = $params[1];
if($method === "GET")
{
    if($type === "users")
    {
        global $mysqlConnect;
        getUsers($mysqlConnect);
    }
}
if ($method === "POST")
{
    if($type === "users")
    {
        if(isset($id))
        {
            global $mysqlConnect;
            deleteUser($mysqlConnect, $id);
        }
    }
}

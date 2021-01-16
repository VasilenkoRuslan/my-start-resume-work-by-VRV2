<?php
require "../init_db.php";
function getUsers($dbQuery)
{
    $allUsers = [];
    $users = $dbQuery->query('SELECT * FROM `registration`');
    while ($user = $users->fetch_assoc()) {
        $allUsers[] = $user;
    }
    return $allUsers;
}

function deleteUser($dbQuery, $id)
{
    $query = $dbQuery->prepare("DELETE FROM `registration` WHERE `registration`.`id` = ?");
    $query->bind_param("s", $id);
    $query->execute();
    return [
        "status" => "true",
        "message" => "User is deleted"
    ];
}

$arr = array();

if (isset($_GET["users"])) {
    global $mysqlConnect;
    $arr = getUsers($mysqlConnect);
    echo json_encode($arr);
}
if (isset($_POST["id"])) {
    global $mysqlConnect;
    $arr = deleteUser($mysqlConnect, $_POST["id"]);
    echo json_encode($arr);
}


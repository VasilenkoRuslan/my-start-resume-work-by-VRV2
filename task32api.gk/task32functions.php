<?php
function getUsers ($dbQuery)
{
    $allUsers = [];
    $users = $dbQuery->query('SELECT * FROM registration');
    while($user = $users->fetch())
    {
        $allUsers[] = $user;
    }
    echo json_encode($allUsers);
}

function deleteUser ($dbQuery, $id)
{
    $query = $dbQuery->prepare("DELETE FROM registration WHERE id=?");
    $query->execute(array($id));
    $result = [
        "status" => "true",
        "message" => "User is deleted"
    ];
    return json_encode($result);
}

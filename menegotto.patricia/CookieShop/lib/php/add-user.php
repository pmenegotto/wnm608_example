<?php
$newUser = [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
];
$users = json_decode(file_get_contents('../../data/data.json'), true);
$users[] = $newUser;
file_put_contents('../../data/data.json', json_encode($users, JSON_PRETTY_PRINT));

header('Location: ../../admin-page.php');
<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewDevBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);

    if ($firstName !== '' && $lastName !== '' && $email == '') {
        $query = insertNewGameDev($pdo, $firstName, $lastName, $email);

        if ($query) {
            header("Location: ..index.php");
            exit;    
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST["editDevBtn"])) {
    $query = updateGameDevByID($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["developer_id"]);
    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Edit Failed";
    }
}
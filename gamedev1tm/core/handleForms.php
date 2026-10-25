<?php

require_once __DIR__ . '/dbConfig.php';
require_once __DIR__ . '/models.php';

// ---------- Developers ----------

if (isset($_POST['insertNewDevBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);

    if ($firstName !== '' && $lastName !== '' && $email !== '') {
        $query = insertNewGameDev($pdo, $firstName, $lastName, $email);

        if ($query) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editDevBtn'])) {
    $query = updateGameDevByID($pdo, trim($_POST['firstName']), trim($_POST['lastName']), trim($_POST['email']), $_POST['developer_id']);
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Edit Failed";
    }
}

if (isset($_POST['deleteDevBtn'])) {
    // remove the developer's games first so the foreign key doesn't block the delete
    foreach (getGamesByDev($pdo, $_POST['developer_id']) as $game) {
        deleteAGame($pdo, $game['game_id']);
    }
    $query = deleteAGameDev($pdo, $_POST['developer_id']);
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Deletion Failed";
    }
}

// ---------- Games ----------

if (isset($_POST['insertGameBtn'])) {
    $title = trim($_POST['title']);
    $genre = trim($_POST['genre']);
    $developer_id = $_POST['developer_id'];

    if ($title !== '' && $genre !== '') {
        $query = insertGame($pdo, $title, $genre, $developer_id);
        if ($query) {
            header("Location: ../viewgames.php?developer_id=" . urlencode($developer_id));
            exit;
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editGameBtn'])) {
    $query = updateGameByID($pdo, trim($_POST['title']), trim($_POST['genre']), $_POST['game_id']);
    if ($query) {
        header("Location: ../viewgames.php?developer_id=" . urlencode($_POST['developer_id']));
        exit;
    } else {
        echo "Edit Failed";
    }
}

if (isset($_POST['deleteGameBtn'])) {
    $query = deleteAGame($pdo, $_POST['game_id']);
    if ($query) {
        header("Location: ../viewgames.php?developer_id=" . urlencode($_POST['developer_id']));
        exit;
    } else {
        echo "Deletion Failed";
    }
}
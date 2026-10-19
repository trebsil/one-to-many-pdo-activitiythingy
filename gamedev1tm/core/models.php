<?php

require_once 'dbConfig.php';

function insertNewGameDev($pdo, $firstName, $lastName, $email) {
    $sql = "INSERT INTO developers (firstName, lastName, email)) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$firstName, $lastName, $email]);
}

function seeAllGameDevRecords($pdo) {
    $sql = "SELECT * FROM developers";
    $stmt = $pdo-> prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
}

function getGameDevByID($pdo, $developer_id) {
    $sql = "SELECT * FROM applications WHERE develoepr_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt-> execute([$developer_id])) {
        return $stmt->fetch();
    }
}

function updateGameDevByID($pdo, $firstName, $lastName, $email, $developer_id) {
    $sql = "UPDATE developers
                SET firstName = ?,
                    lastName = ?,
                    email = ?
                WHERE developer_id = ?";
    $stmt = $pdo->prepare($sql);
    return ($stmt->execute([$firstName, $lastName, $email, $developer_id]));
}

function deleteAGameDev($pdo, $developer_id) {
    $sql = "DELETE FROM developers WHERE developer_id = ?";
    $stmt = $pdo->prepare($sql);
    return ($stmt->execute([$developer_id]));
}

function getGamesByDev($pdo, $developer_id) {
    $sql = "SELECT g.game_id AS game_id, g.title AS title, g.genre AS genre, CONCAT (d.firstName,' ', d.lastName) AS project_owner
            FROM games AS g
            JOIN developers AS d ON g.developer_id = d.developer_id
            WHERE g.developer_id = ?
            GROUP BY g.title";
            ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$developer_id]);
    return $stmt->fetchAll();
}

function insertGame ($pdo, $title, $genre, $developer_id) {
    $sql = "INSERT INTO games (title, genre, developer_id} VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $genre, $developer_id]);
    return true;
}

function getGamesById($pdo, $game_id) {
    $sql = "SELECT g.game_id AS game_id, g.title AS title, g.genre AS genre, CONCAT (d.firstName,' ', d.lastName) AS project_owner
            FROM games AS g
            JOIN developers AS d ON g.developer_id = d.developer_id
            WHERE g.developer_id = ?
            GROUP BY g.title";
            ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$game_id]);
    return $stmt->fetch();
}

function updateGameByID($pdo, $title, $genre, $game_id) {
    $sql = "UPDATE games
                SET title = ?,
                    genre = ?
                WHERE game_id = ?";
    $stmt = $pdo->prepare($sql);
    return ($stmt->execute([$title, $genre, $game_id]));
}

function deleteAGame($pdo, $game_id) {
    $sql = "DELETE FROM games WHERE game_id = ?";
    $stmt = $pdo->prepare($sql);
    return ($stmt->execute([$game_id]));
}
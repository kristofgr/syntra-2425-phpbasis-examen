<?php

function connectToDB()
{
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'phpbasis';
    $db_port = 8889;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}


function getGeoCaches($filter_level = 0): array
{
    $sql = "SELECT geocaches.*, geolevels.name as level_name FROM geocaches
    LEFT JOIN geolevels
    ON geocaches.level_id = geolevels.id";

    if ($filter_level > 0)
        $sql .= " WHERE geocaches.level_id = $filter_level";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getGeoCacheById(int $id): array|bool
{
    $sql = "SELECT geocaches.* FROM geocaches
    WHERE geocaches.id = :id;";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function insertGeocache(String $name, String $description, String $hint, int $level, float $latitude, float $longitude): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO geocaches(name, description, hint, level_id, latitude, longitude) VALUES (:name, :description, :hint, :level, :latitude, :longitude)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'description' => $description,
        'hint' => $hint,
        'level' => $level,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ]);

    return $db->lastInsertId();
}

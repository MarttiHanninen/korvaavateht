<?php
require "dbconnection.php";

$dbcon = createDbConnection();


$alkukirjain = $_GET['alkukirjain'];
$kaupunki = $_GET['kaupunki'];

$sql = "SELECT * FROM asiakkaat WHERE Nimi LIKE :alkukirjain AND Kaupunki = :kaupunki";
$stmt = $dbcon->prepare($sql);
$stmt->bindValue(':alkukirjain', $alkukirjain . '%');
$stmt->bindValue(':kaupunki', $kaupunki);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($results);
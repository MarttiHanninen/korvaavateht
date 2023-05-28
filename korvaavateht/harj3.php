<?php
require "dbconnection.php";

$dbcon = createDbConnection();


$alkukirjain = $_GET['alkukirjain'];
$country = $_GET['country'];

$sql = "SELECT * FROM customers WHERE Name LIKE :alkukirjain AND country = :country";
$stmt = $dbcon->prepare($sql);
$stmt->bindValue(':alkukirjain', $alkukirjain . '%');
$stmt->bindValue(':country', $country);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($results);

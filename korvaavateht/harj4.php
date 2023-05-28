<?php

require "dbconnection.php";

$dbcon = createDbConnection();




mysqli_begin_transaction($yhteys);

try {

  $sql1 = "INSERT INTO taulu1 (sarake1, sarake2) VALUES ('arvo1', 'arvo2')";
  $sql2 = "UPDATE taulu2 SET sarake1 = 'uusi_arvo' WHERE ehto = 'jokin_ehto'";

  mysqli_query($yhteys, $sql1);
  mysqli_query($yhteys, $sql2);

  mysqli_commit($yhteys);

  echo "Transaktio suoritettu onnistuneesti.";
} catch (Exception $e) {

  mysqli_rollback($yhteys);

  echo "Transaktion suorittaminen epäonnistui: " . $e->getMessage();
}





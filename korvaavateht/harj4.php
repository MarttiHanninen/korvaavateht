<?php

require "dbconnection.php";

$dbcon = createDbConnection();




mysqli_begin_transaction($yhteys);

try {

  $sql1 = "INSERT INTO artists (ArtistId, Name) VALUES ('278', 'pertti kurikan nimipäivät')";
  $sql2 = "UPDATE genres SET GenreId = '?' WHERE ehto = 'metal'";

  mysqli_query($yhteys, $sql1);
  mysqli_query($yhteys, $sql2);

  mysqli_commit($yhteys);

  echo "Transaktio suoritettu onnistuneesti.";
} catch (Exception $e) {

  mysqli_rollback($yhteys);

  echo "Transaktion suorittaminen epäonnistui: " . $e->getMessage();
}





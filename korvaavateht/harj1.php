<?php

require "dbconnection.php";

$dbcon = createDbConnection();

$sql = "INSERT INTO artists (ArtistId, Name) 
    VALUES ('276','eppu normaali'),('277', 'danny')";

$dbcon->exec($sql);


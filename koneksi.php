<?php
$conn = pg_connect ("host=localhost port=5432 dbname=perpus user=postgres password=kosong");
/* check connection */
if (!$conn) {
    echo "<h1>Doesn't work</h1>";
}
?>

<?php

$pgUser = 'postgrestest';
$pgPass = 'TestTest';

$db = pg_connect("host=dbpostgres port=5432 dbname=dbname user={$pgUser} password={$pgPass}");

$result = pg_query($db, "SELECT schema_name FROM information_schema.schemata");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

$arr = pg_fetch_all($result);
foreach ($arr as $row) {
    echo implode(' , ', $row) . '<br>';
}

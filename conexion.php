<?php

    function conexion(){

    $host = "host=dpg-d723d88ule4c73bhcut0-a.oregon-postgres.render.com";
    $port = "port=5432";
    $dbname = "dbname=test_d05m";
    $user = "user=test_d05m_user";
    $password = "password=JoJ1YOMa42Xh0NV89bpsRvgacpS4sQus";

    $db = pg_connect("$host $port $dbname $user $password");

    return $db;
}
?>
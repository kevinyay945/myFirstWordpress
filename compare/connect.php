<?php
    require_once("Database.php");

    function connect()
    {
        $database = new Database("127.0.0.1", "finance", "root", "");
        $conn = $database->getConn();

        return $conn;
    }
?>
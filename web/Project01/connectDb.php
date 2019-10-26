<?php

function getDb()
{
    try {
        $db = parse_url(getenv("DATABASE_URL"));
        
        $pdo = new PDO("pgsql:" . sprintf("host=%s;port=%s;user=%s;password=%s;dbname=%s", $db["host"], $db["port"], $db["user"], $db["pass"], ltrim($db["path"], "/")));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    
}

?>
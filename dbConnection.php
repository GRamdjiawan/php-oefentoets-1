<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=school",
        "root", "");
    } catch(PDOException $e) {
        die("Error!: " . $e->getMessage());
    }

?>
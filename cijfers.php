<?php
    include("dbConnection.php");
        
    $getName = $db->prepare("SELECT * FROM leerlingen WHERE id = :id");
    $getName->bindParam("id", $_GET['id']);
    $getName->execute();
    $results = $getName-> fetchAll (PDO::FETCH_ASSOC);

    foreach($results as $data) {
        echo "<h1>".$data['naam']."</h1>";

    }
    echo "<br> ";
        
    $getCijfers = $db->prepare("SELECT * FROM toets WHERE leerling_id = :id");
    $getCijfers->bindParam("id", $_GET['id']);
    $getCijfers->execute();
    $results = $getCijfers-> fetchAll (PDO::FETCH_ASSOC);

    foreach($results as $data) {

        echo $data['vak']. " ". $data['cijfer'];
        echo "<br> ";
            
            
    }
        
    echo "<br> ";

    $gemiddelde = $db->prepare("SELECT CAST(AVG(cijfer) AS DECIMAL(10,1))
    FROM toets WHERE leerling_id = :id");
    $gemiddelde->bindParam("id", $_GET['id']);
    $gemiddelde->execute();
    $gemiddelde = $gemiddelde->fetchAll(PDO::FETCH_ASSOC);

    echo "gemiddeld: ". $gemiddelde[0]['CAST(AVG(cijfer) AS DECIMAL(10,1))']. "<br>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cijfers</title>
</head>
<body>

    <a href="./index.php">Terug naar overzicht</a>
    
</body>
</html>
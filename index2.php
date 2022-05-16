<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gemiddelde</title>
</head>
<body>
    <?php
        try{
            $db = new PDO("mysql:host=localhost;dbname=school",
                "root", "");
        } catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
        
        
        $query = $db->prepare("SELECT * FROM leerlingen");
        $query->execute();
        $results = $query-> fetchAll (PDO::FETCH_ASSOC);
        
        
        echo "<table border='1'>";
        echo "<tr>";    
        echo "<td>Naam</td>";
        echo "<td>Gemiddelde</td>";
        
        echo "</tr>";
        
        foreach($results as $data) {
                $gemiddelde = $db->prepare("SELECT CAST(AVG(cijfer) AS DECIMAL(10,1))
                FROM toets WHERE leerling_id = :id");

                $gemiddelde->bindParam("id", $data['id']);
                $gemiddelde->execute();
                $gemiddelde = $gemiddelde->fetchAll(PDO::FETCH_ASSOC);

                echo "<tr>";    
                    echo "<td>".$data['naam']."</td>";
                    echo "<td>".$gemiddelde[0]['CAST(AVG(cijfer) AS DECIMAL(10,1))']."</td>";
                echo "</tr>";

            }

        echo "</table> <br>";
    
    ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="start-time" content="13:50">
    <meta name="end-time" content="15:09">

    <title>Home pagina</title>
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
        
        $counter = 0;


        echo "<table border='1'>";
            echo "<tr>";    
                echo "<td>Naam</td>";
                echo "<td>Klas</td>";
                echo "<td>Cijfer</td>";
                
            echo "</tr>";

            foreach($results as $data) {
                echo "<tr>";    
                    echo "<td>".$data['naam']."</td>";
                    echo "<td>".$data['klas']."</td>";
                    // het lukt mij niet om de naam in de url te krijgen
                    echo "<td> <a href='cijfers.php?id=".$data['id']."naam=".$data['naam']."'>cijfers</a></td>";
                echo "</tr>";

                $counter++;
            }

        echo "</table> <br>";

        echo "aantal leerlingen is ". $counter;

        echo "<br><br>";
        echo "<a href='./insert.php'>Leerling toevoegen<a>";
    
    
    
    ?>
    
</body>
</html>
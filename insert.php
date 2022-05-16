<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Voeg leerling</title>

    <style>
        label {
            float: left;
            width: 50px;
        }

        button {
            margin: 0 50px;
        }

    </style>
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

        $inKlas = false;
        
        
        if(isset($_POST['submit'])) {
            $naam =ucwords($_POST['naam']);
            $klas = strtoupper($_POST['klas']);
            
            foreach($results as $data) {
                if((strtolower($naam) == strtolower($data['naam'])) && (strtolower($klas) == strtolower($data['klas']))) {
                    $inKlas = true;
                }   
            }
            
        } else {
            $naam = '';
            $klas = '';
            
        }


    
    ?>

    <form action="" method="post">
        <label for="naam">Naam:</label>
        <input type="text" name="naam">
        
        <br>

        <label for="klas">Klas:</label>
        <input type="text" name="klas">

        <br>

        <button type="submit" name='submit'>Verzenden</button>

        
    </form>

    <?php
        if(($naam == '') || ($klas == '')) {
            echo "Geen leerling gegevens ingevoerd";
        }else if($inKlas) {
            echo "Leerling bestaat al!";

        }else {
            
            $query = $db->prepare("INSERT INTO leerlingen(naam, klas) 
            VALUES (:naam, :klas)");

            $query->bindParam("naam", $naam);
            $query->bindParam("klas", $klas);
            if($query->execute()) {
                echo $naam." in ". $klas. " is Toegevoegd";
            }

        }
    
    
    ?>
    <br><br>

    <a href="./index.php">Terug naar overzicht</a>
    
</body>
</html>
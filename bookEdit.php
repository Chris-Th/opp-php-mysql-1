<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>

    <?php
        require "./includes/db.php";

        // $_GET liefert die 'id' aus der URL 'bookView.php?id=$id'
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else {
            // id fehlt in der URL: abbrechen und php verlassen
            exit("Achtung: Der Identifikator 'id' fehlt.");
        }
        // echo "id = $id<br>";

        // SQL-Statement formulieren: alle Daten (Tabellenzeile)
        // zum Buch mit der erhaltenen $id
        $sqlStatement = $dbConnection->query("SELECT * FROM `books` WHERE `id` = $id");
        $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);

       // print_r($row);

        // Generiere die Tabelle: linke Spalte für Beschriftung / rechte Spalte für die Werte
       
    ?>

    <table class="table table-striped table-responsive-md">
        <thead class="table-success">
            <tr> 
                <th scope="col"><?php echo $row['isbn']; ?></th>
                <th scope="col"><?php echo $row['title']; ?> / <?php echo $row['author']; ?></th>
            </tr>
        </thead>

        <tbody>
            <?php
        // Generiere die Tabelle: linke Spalte für Beschriftung / rechte Spalte für die Werte
        foreach ($row as $columnName => $value) {
            $translatedColumnName = translateColumnName($columnName);

            echo 
            "<tr>
                <td style='width: 300px;'>$translatedColumnName</td>
                <td>$value</td>
            </tr>";
            
        }
        ?>

        </tbody>
    </table>
    <button type="button" class="btn btn-info" onclick="document.location='index.php';">back</button>

</body>
</html>
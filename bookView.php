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

    <form action="" method="post">
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

                        echo "<tr>";
                        echo "<td style='width: 300px;'>$translatedColumnName</td>";

                        /*
                            language: dropdown
                            genre: dropdown (<select><option>)
                            
                            used: checkbox
                            description: text area
                            price: 
                            currency: dropdown
                            soldout: checkbox
                            modification_date: date
                            mod...time: time
                        */

                        switch ($columnName) {
                            case "language":
                                //TODO
                                // dummy-Zeile
                                echo "<td>
                                <input list='lang' name='language'>
                                <datalist id='lang'>
                                <option value='english'>
                                <option value='german'>
                                </datalist>
                                </td>";
                                break;

                            case "genre":
                                //TODO
                                echo 
                                /*
                                "<td>
                                <input list='genre' name='genre'>
                                
                                <datalist id='genre'>
                                
                                <option value='crime'>
                                <option value='humor'>
                                <option value='biography'>
                                <option value='history'>
                                <option value='horror'>
                                <option value='sci-fi'>
                                <option value='novel'>
                                <option value='non-fiction'>
                                <option value='adventure'>

                                </datalist>

                                </td>";
                                */

                                "<td>
                                <select class='form-select' id='genre' name='genre'>
                                    <option>crime</option>
                                    <option>humor</option>
                                    <option>biography</option>
                                    <option>history</option>
                                    <option>horror</option>
                                    <option>sci-fi</option>
                                    <option>novel</option>
                                    <option>non-fiction</option>
                                    <option>adventure</option>
                                </select>
                                </td>";

                                break;

                            case "used":
                                //TODO
                                echo "<td>
                                <input type='checkbox' id='used' name='used'>
                                </td>";
                                break;

                            case "description":
                                //TODO
                                echo "<td>
                                <textarea name='description' rows='10' cols='30'>'$value'</textarea>
                                </td>";
                                break;

                            case "price":
                                //TODO
                                echo "<td>&nbsp;</td>";
                                break;
                            
                            case "currency":
                                //TODO
                                echo "<td>
                                <input list='currency' name='currency'>
                                <datalist id='currency'>
                                <option value='CHF'>
                                <option value='USD'>
                                </datalist>
                                </td>";
                                break;

                            case "soldout":
                                //TODO
                                echo "<td>&nbsp;</td>";
                                break;

                            case "modification_date":
                                //TODO
                                echo "<td>&nbsp;</td>";
                                break;

                            case "modification_time":
                                //TODO
                                echo "<td>&nbsp;</td>";
                                break;

                            default:
                                echo "<td><input type='text' name='$columnName' value='$value'></td>";
                        }

                        
                        
                        echo "</tr>";
                    }

                   
                ?>
            </tbody>
        </table>
    </form> 
    <button type="button" class="btn btn-info" onclick="document.location='index.php';">back</button>

</body>
</html>
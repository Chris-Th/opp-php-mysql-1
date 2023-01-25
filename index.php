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
    <table class="table table-info table-striped">
        <!-- Tabellenkopf mit Feldnamen -->
        <thead>
            <tr>
                <?php
                    require "./includes/db.php";

                        // Alle Daten zu den Büchern aus der Datenbank auslesen (SELECT)
                        $sqlStatement = $dbConnection->query("SELECT * FROM `books`");

                        // https://stackoverflow.com/questions/5428262/php-pdo-get-the-columns-name-of-a-table
                        // Tabellenkopf vollst. ausgeben
                        // siehe php.net/manual/en/pdostatement.columncount.php
                        $columnCount = $sqlStatement -> columnCount();


                        for ($c = 0; $c < $columnCount; $c++) {
                            // array mit Spalten-Matadaten holen
                            // php.net: getcolumnmeta
                            $columnMeta = $sqlStatement->getColumnMeta($c); 

                            // Aus den Spalten-Metadaten den Wert für 'name' auslesen u ausgeben.
                            $columnName = $columnMeta['name'];
                            echo "<th>$columnName</th>";
                        }
                        

                        // Falls $row === null wird die Bedingung in () von PHP als false interpretiert
                        // Damit kann die while-Schleife verlassen werden.
                        while ( $row = $sqlStatement -> fetch(PDO::FETCH_ASSOC) ) {
                                
                            echo "<tr>";

                            // Durch den Array hindurch die Angaben zu einem Buch in eine Tabellenzeile ausgeben.
                            foreach ($row as $columName => $value) {
                                if ($columName === 'title') {
                                    $id = $row['id'];
                                    echo "<td><a href='editBook.php?id=$id'>$value</a></td>";
                                }
                                else {
                                    echo "<td>$value</td>";
                                }

                            } 

                            echo "</tr>";

                        }

                ?>
            </tr>  
        </thead>

        <!-- Tabellenzellen mit Daten -->
        <tbody class="">
            <?php
                        // Falls $row === null wird die Bedingung in () von PHP als false interpretiert
                // Damit kann die while-Schleife verlassen werden.
                while ( $row = $sqlStatement->fetch(PDO::FETCH_ASSOC) ) {

                    echo "<tr>";

                    // Durch den Array hindurch die Angaben zu einem Buch in eine Tabellenzeile ausgeben.
                    foreach ($row as $columName => $value) {
                        echo "<td>$value</td>";
                    } 

                    echo "</tr>";

                }
            ?>

        </tbody>
    </table>
</body>
</html>
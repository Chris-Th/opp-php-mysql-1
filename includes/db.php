<?php

  // $dbConnection = new PDO("", $dbUser, $dbPassword);
   

  // connect to mySQL using PHP PDO Object

  $dbHost = getenv('DB_HOST');
  $dbName = getenv('DB_NAME');
  $dbUser = getenv('DB_USER');
  $dbPassword = getenv('DB_PASSWORD');


  $dbConnection = new PDO(
    "mysql:host=$dbHost;dbname=$dbName;charset=utf8", 
    $dbUser, 
    $dbPassword
);

// setzte den Fehlermodus für Web Devs
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Feldnamen übersetzen
define(
	"NAME_MAP", 
	array(
		"id" => "ID",
		"title" => "Titel",
		"author" => "Author",
		"language" => "Sprache",
		"genre" => "Genre",
		"used" => "gebraucht",
		"description" => "Beschreibung",
		"publisher" => "Verlag",
		"isbn" => "ISBN",
		"price" => "Preis",
		"currency" => "Währung",
		"soldout" => "vergriffen",
		"modification_date" => "Änderungsdatum",
		"modification_time" => "Änderungszeit",
		
	)
	);
	function translateColumnName($columnName) {
		return NAME_MAP[$columnName];

};



?>
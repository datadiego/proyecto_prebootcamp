<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hola mundo</title>
</head>
<body>
<p>Hola mundo</p>
<p>
<?php

$user = "datadiego";
$password = "666808Soundbwoi!";
$database = "test123";
$table = "usuarios";
$host = "192.168.0.31";

//include "config.php"
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  echo "<h2>Usuarios</h2><ol>";
  foreach($db->query("SELECT nombre FROM $table") as $row) {
    echo "<li>" . $row['nombre'] . "</li>";
  };
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
</p>
</body>
</html>

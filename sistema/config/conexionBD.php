<?php

    define('SERVER', 'localhost');
    define('DATABASE', 'tallerlabendicion');
    define('USERNAME', 'root');
    define('PASSWORD', '');

    try {
        $connection = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);
    } 
    catch (PDOException $e) {
         exit("Error: " . $e->getMessage() . "<br> No se pudo establecer conexion con la base de datos ❌⚠🤦‍♂️");
    }
    

?>
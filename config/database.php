<?php 

    function databaseConnection() {
        $localhost = "localhost";
        $dbname = "db_events";
        $username = "root";
        $password = "root";
        $dsn = "mysql:host=$localhost;dbname=$dbname";
    
        $config = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $connection = new PDO($dsn, $username, $password, $config);
            return $connection;
        }
        catch(Exception $error) {
            echo "Erro de conexão com o banco de dados: " . $error->getMessage();
        }
    }

?>
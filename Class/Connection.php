<?php

class Connection {
	public static function connect(){
        $server = "localhost";
        $username = "root";
        $password = "betel1234";
        $database = "marketplace_v3";
        $connection = new mysqli($server, $username, $password, $database);
        //$connection->query("SET NAMES 'utf8'");
        return $connection;
    }
    
    public function executeQuery($query) {
        $result = mysqli_query(Connection::connect(), $query);
        return $result;
    }
    
}

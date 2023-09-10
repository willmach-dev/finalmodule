<?php
//Connect to DataBase
 function conexao(){
    $dsn = 'mysql:dbname=progintegra2;host=localhost;charset=utf8';
    $user = 'root';
    $pass = '1234';
    
    //Return PDO
        try {
            $pdo = new PDO($dsn, $user, $pass); 
            return $pdo;
        } catch (PDOException $ex) {
            echo 'Erro '.$ex->getMessage(); 
        }
    }          
?>

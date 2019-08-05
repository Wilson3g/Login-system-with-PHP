<?php
    class Conexao{
        function getConnection(){
            $dsn = "mysql:host=localhost;dbname=login";
            $user = "root";
            $pass = "";
        
            try{
                $pdo = new PDO($dsn, $user, $pass);
                return $pdo;
            }catch(PDOException $ex){
                echo "ERRO: ".$ex->getMessage();
            }
        }
    }
?>
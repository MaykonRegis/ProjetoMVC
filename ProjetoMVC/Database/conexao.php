<?php
    namespace Database; // PARA REFERENCIAR A CLASSE CONNECTION

    abstract class Connection{
        private static $conn;

        public static function getConn(){
            //SE EXISTIR CONEXAO CONECTAR SE NAO RETORNA 
            if(!self::$conn){
                self::$conn = new \PDO('mysql: host=localhost; dbname=sistema_login', 'root','');
            }

            return self::$conn;
        }
    }


?>
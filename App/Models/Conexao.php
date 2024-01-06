<?php
    namespace App\Models;

    class Conexao {
        private static $instance;

        public static function getConn() {
            if(!isset(self::$instance)):
                //Busca dados nas variaveis de ambiente do sistema
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_NAME');
                $user = getenv('DB_USER');
                $pass = getenv('DB_PASS');

                self::$instance = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            endif;
            return self::$instance;
        }
    }
?>
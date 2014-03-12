<?php
class Conex{

    private static $instance;
    private $pdo;

    private function __construct()
    {

        $engine = 'mysql';
        // $host = 'mysql.midiaseducativas.com.br';
        // $database = '';
        // $user = '';
        // $pass = '';

        $host = '127.0.0.1';
        $database = 'saudenacopa';
        $user = 'root';
        $pass = '';

        try{
            $this->pdo = new PDO($engine.':dbname='.$database.';host='.$host, $user, $pass)or print (mysql_error());
        }catch(PDOException $e){
            echo 'Error: '.$e->getMessage();
        }
        
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    public function getPDO(){
        return $this->pdo;
    }

}

?>
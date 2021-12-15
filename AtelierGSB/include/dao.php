<?php

include_once('dbConfig.inc.php');
class Dao {
    private $maConnexion;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->maConnexion = $db;
    }

    public function executeRequete($sql) {
        try {
            $resu = $this->maConnexion->prepare($sql);
            $resu->execute();
            return $resu;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function disconnect() {
        $this->maConnexion = null;
    }
}
?>
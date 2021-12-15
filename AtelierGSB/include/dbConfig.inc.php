<?php
class database {
    private $serveur = "localhost";
    private $nombdd = "bddauthentification";
    private $username = "root";
    private $password = "root";
    private $dbh = null;

    public function connect() {
        $this->dbh=null;
        try {
            $dsn = "mysql:host=".$this->serveur.";dbname=".$this->nombdd;
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->exec("SET NAMES 'UTF8'");
        } catch (PDOException $exception) {
            echo "Connection error: ".$exception->getMessage();
        }
        return $this->dbh;
    }
}
?>
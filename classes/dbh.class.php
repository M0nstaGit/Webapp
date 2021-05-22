<?php

class dbh {

    #private $dbHost = "ID329040_sportbud.db.webhosting.be";
    #private $dbUsername = "ID329040_sportbud";
    #private $dbPassword = "SportBudG@ng2021";
    #private $dbName = "ID329040_sportbud";

    private $dbHost2 = "ID329040_sportbuddata.db.webhosting.be";
    private $dbUsername2 = "ID329040_sportbuddata";
    private $dbPassword2 = "SportBudG@ng2021";
    private $dbName2 = "ID329040_sportbuddata";

    #private $dbHost = "localhost:8889";
    #private $dbUsername = "root";
    #private $dbPassword = "root";
    #private $dbName = "testsportbud";

    #protected function connect(){
    #    $dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
    #    $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
    #    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
#
    #    return $pdo;
    #}

    protected function connect2(){
        $dsn = 'mysql:host=' . $this->dbHost2 . ';dbname=' . $this->dbName2;
        $pdo2 = new PDO($dsn, $this->dbUsername2, $this->dbPassword2);
        $pdo2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo2;
    }
 
}

?>
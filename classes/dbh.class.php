<?php

class dbh {

    private $dbHost = "ID329040_sportbud.db.webhosting.be";
    private $dbUsername = "ID329040_sportbud";
    private $dbPassword = "SportBudG@ng2021";
    private $dbName = "ID329040_sportbud";

    private $dbHostMessages = "ID329040_sportbuddata.db.webhosting.be";
    private $dbUsernameMessages = "ID329040_sportbuddata";
    private $dbPasswordMessages = "SportBudG@ng2021";
    private $dbNameMessages = "ID329040_sportbuddata";

    #private $dbHost = "localhost:8889";
    #private $dbUsername = "root";
    #private $dbPassword = "root";
    #private $dbName = "testsportbud";

    protected function connect(){
        $dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }

    protected function connectMessages(){
        $dsn = 'mysql:host=' . $this->dbHostMessages . ';dbname=' . $this->dbNameMessages;
        $pdoMessages = new PDO($dsn, $this->dbUsernameMessages, $this->dbPasswordMessages);
        $pdoMessages->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdoMessages;
    }
 
}

?>
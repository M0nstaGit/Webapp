
<?php
#test
class dbh {

    private $dbHost = "ID329040_sportbud.db.webhosting.be";
    private $dbUsername = "ID329040_sportbud";
    private $dbPassword = "SportBudG@ng2021";
    private $dbName = "ID329040_sportbud";

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
 
}

?>
<?php
class dbWorker
{
    private $name = '';
    private $password = '';
    private $dbName = '';
    private $connectionBd;

    function __construct($name, $password, $dbName){
        $this->name = $name;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function connectDb(){
        try{
            $this->connectionBd = new PDO('mysql:host=localhost;dbname='. $this->dbName, $this->name, $this->password);
        }
        catch (PDOException $e) {
            print "Error: " . $e->getMessage();
            die();
        }
    }
    public function getData(){
        $query = "SELECT Surname, Name, Secondname, Phone, Country FROM persontable
                  INNER JOIN coutries ON  persontable.Id_country = coutries.Id_country
                  WHERE coutries.Id_country = ?";
        $stmt = $this->connectionBd->prepare($query);
        $stmt->execute([5]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}
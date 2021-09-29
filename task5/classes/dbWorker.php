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
        $query = "SELECT Surname, Name, Secondname, Phone FROM persontable";
        $stmt = $this->connectionBd->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}
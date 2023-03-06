<?php

namespace App\Models;
use \PDO;


class Citys extends DB {

    public function getCitys()
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT * FROM citta');
        $stmt->execute();
        $city = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $city;
    }

    public function getCitybyId($id)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM citta WHERE id = $id");
        $stmt->execute();
        $city = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $city;        
    }




    public function updateCitys($name, $country ,$id){
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE citta SET nome = :nome, paese = :paese WHERE id = $id");
        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':paese', $country);
        $stmt->execute();
    }







    public function insertCitys($name, $country){
        // Recupero l'oggetto PDO dal container
        $conn = $this->connect();
        // Preparo la query SQL
        $stmt = $conn->prepare("INSERT INTO citta(nome, paese) VALUES (:nome, :paese)");
        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':paese', $country);
        // Eseguio la query con i dati preparati
        $stmt->execute();
    }
    






    public function deleteCitys($id )
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM citta WHERE id = $id");
        $stmt->execute();
        
    }


}
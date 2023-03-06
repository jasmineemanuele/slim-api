<?php

namespace App\Models;
use \PDO;

class Categorys extends DB {

    public function getCategorys()
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT * FROM categorie');
        $stmt->execute();
        $category = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    public function getCategorysbyId($id)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM categorie WHERE id = $id");
        $stmt->execute();
        $city = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $city;        
    }

    public function updateCategorys($name, $descrizione ,$id){
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE categorie SET descrizione = :descrizione, nome = :nome WHERE id = $id");
        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':descrizione', $descrizione);
        $stmt->execute();
    }





    public function insertCategorys($nome, $descrizione){
        // Recupero l'oggetto PDO dal container
        $conn = $this->connect();
        // Preparo la query SQL
        $stmt = $conn->prepare("INSERT INTO categorie(nome, descrizione) VALUES (:nome, :descrizione)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descrizione', $descrizione);
        // Eseguio la query con i dati preparati
        $stmt->execute();
    }





    public function deleteCategorys($id )
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM categorie WHERE id = $id");
        $stmt->execute();
        
    }




}
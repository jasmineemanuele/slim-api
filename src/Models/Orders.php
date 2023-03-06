<?php

namespace App\Models;
use \PDO;

class Orders extends DB
{
    public function getOrders()
    {
		$conn = $this->connect();
		$stmt = $conn->prepare('SELECT * FROM ordini');
		$stmt->execute();
		$orders = $stmt->fetchAll(PDO::FETCH_OBJ);

		return $orders;
    }


	public function getOrdersbyId($id)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM ordini WHERE id = $id");
        $stmt->execute();
        $order = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $order;        
    }




    public function updateOrders($id, $nome, $prodotto){
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE ordini SET Prodotto = :Prodotto, Nome  = :nome WHERE id = $id");
        $stmt->bindParam(':Prodotto', $prodotto);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }


    public function insertOrders($Prodotto, $nome, $idPuntoVendita){
        // Recupero l'oggetto PDO dal container
        $conn = $this->connect();
        // Preparo la query SQL
        $stmt = $conn->prepare("INSERT INTO ordini(Prodotto, Nome, idPuntoVendita) VALUES (:Prodotto, :nome, idPuntoVendita)");
        $stmt->bindParam(':Prodotto', $Prodotto);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam('idPuntoVendita', $idPuntoVendita);
        // Eseguio la query con i dati preparati
        $stmt->execute();
    }
    


    public function deleteOrders($id )
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM ordini WHERE id = $id");
        $stmt->execute();
        
    }




}
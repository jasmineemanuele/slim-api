<?php

namespace App\Models;
use \PDO;


class Articles extends DB {

    public function getArticles()
		{
			$conn = $this->connect();
			$stmt = $conn->prepare('SELECT * FROM articoli');
			$stmt->execute();
			$article = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $article;
		}

		public function getArticlebyId($id)
		{
			$conn = $this->connect();
			$stmt = $conn->prepare("SELECT * FROM articoli WHERE id = $id");
			$stmt->execute();
			$city = $stmt->fetchAll(PDO::FETCH_OBJ);
			return $city;        
		}

		
		public function updateArticles($giacenza, $descrizione,$nome ,$id){
			$conn = $this->connect();
			$stmt = $conn->prepare("UPDATE articoli SET giacenza = :giacenza, descrizione = :descrizione, nome = :nome WHERE id = $id");
			$stmt->bindParam(':giacenza', $giacenza);
			$stmt->bindParam(':descrizione', $descrizione);
			$stmt->bindParam(':nome', $nome);

			$stmt->execute();
		}
	






}
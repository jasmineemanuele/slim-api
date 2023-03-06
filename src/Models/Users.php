<?php

namespace App\Models;
use \PDO;

class Users extends DB
{
	public function registerUsers($email,$password)
	{
		// Recupero l'oggetto PDO dal container
		 $conn = $this->connect();
		 // Preparo la query SQL
		 $stmt = $conn->prepare("INSERT INTO users ( email, password ) VALUES ( :email, :password)");
		 $stmt->bindParam(':email', $email);
		 $stmt->bindParam(':password', $password);
		 
		 // Eseguio la query con i dati preparati
		 $stmt->execute();
	}

	public function checkUser($email, $password)
	{
		$conn = $this->connect();
		// Preparo la query SQL
		$stmt = $conn->prepare("SELECT * FROM users WHERE email='$email' AND password='$password' ");
		$stmt->execute();
		$user = $stmt->fetchAll(PDO::FETCH_OBJ);
		return count($user);
		
	}
	  



}
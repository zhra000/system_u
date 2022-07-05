<?php
namespace App\Model;

use App\Database\Db;

class User extends Db {

	public function checkUser($user) {
		$sql = "
			SELECT
				id,
				username,
				firstname,
				lastname,
				image,
				password
			FROM
				users
			WHERE
				users.username = ?
		";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$user['username']]);
		$data = $stmt->fetchAll();
		$userDB = $data[0];

		if(password_verify($user['password'], $userDB['password'])) {
			session_start();
			$_SESSION['id'] = $userDB['id'];
			$_SESSION['username'] = $userDB['username'];
			$_SESSION['firstname'] = $userDB['firstname'];
			$_SESSION['lastname'] = $userDB['lastname'];
			$_SESSION['image'] = $userDB['image'];
			$_SESSION['role'] = $userDB['role'];
			$_SESSION['login'] = true;	
			
			return true;
		} else {
			return false;
		}
	}

}
?>
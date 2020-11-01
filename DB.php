<?php

class DB{

	public function connect(){
		return $pdo = new PDO("mysql:dbname=php_exercise; host=localhost;", "root","mysql");
	}

	public function insert(){
		return "insert into login_mypage(name, mail, password, picture, comments)values
	(?,?,?,?,?)";
	}

	public function select(){
		return "SELECT * FROM login_mypage WHERE mail = ? && password = ?";
	}

	public function update(){
		return "UPDATE login_mypage SET name = ?, mail = ?, password = ?, comments = ? WHERE id = ?";
	}
}
?>
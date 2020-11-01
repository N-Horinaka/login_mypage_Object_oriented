<?php

mb_internal_encoding("utf8");

session_start();

//DBクラスの呼び出し
require "DB.php";

//インスタンス化
$db = new DB();

//connect()メソッドを参照
$pdo = $db ->connect();

//prepared statement
//update
$stmt = $pdo -> prepare( $db ->update() );

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $_POST['comments']);
$stmt->bindValue(5, $_SESSION['id']);

//クエリを実行
$stmt->execute();


//select
$stmt= $pdo->prepare( $db -> select() );

$stmt -> bindValue(1, $_POST['mail']);
$stmt -> bindValue(2, $_POST['password']);

//クエリを実行
$stmt->execute();
$pdo=NULL;


while($row=$stmt->fetch()){
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['mail'] = $row['mail'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['picture'] = $row['picture'];
	$_SESSION['comments'] = $row['comments'];
}


//マイページへ戻る
header("Location: http://localhost/login_mypage_object_oriented/mypage.php");
?>
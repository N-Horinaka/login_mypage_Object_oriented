<?php

mb_internal_encoding("utf8");

//DBクラスの呼び出し
require "DB.php";

//インスタンス化
$db = new DB();

$pdo = $db->connect();

//prepared statement
$stmt = $pdo->prepare ($db ->insert() );

$stmt -> bindValue (1, $_POST['name']);
$stmt -> bindValue (2, $_POST['mail']);
$stmt -> bindValue (3, $_POST['password']);
$stmt -> bindValue (4, $_POST['path_filename']);
$stmt -> bindValue (5, $_POST['comments']);

$stmt -> execute();
$pdo = NULL;

header ("Location: after_register.html");
?>
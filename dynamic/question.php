<?php
$name = $_GET["name"];
$comment = $_GET["comment"];

$pdo = new PDO(
    'mysql:dbname=koseidoi_test;host=157.112.187.131;charset=utf8',
    'koseidoi_admin',
    'kosei110622'
);

$sql = "INSERT INTO feedbacks (name,content,date) VALUES (:name,:comment,now())";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name' , $name );
$stmt->bindValue(':comment', $comment );

$stmt->execute();
?>

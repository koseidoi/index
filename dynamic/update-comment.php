<?php
$id = $_GET["id"];

$pdo = new PDO(
    'mysql:dbname=koseidoi_test;host=157.112.187.131;charset=utf8',
    'koseidoi_admin',
    'kosei110622'
);

$sql = "SELECT * FROM comments WHERE id > " . $id;

$stmt = $pdo->prepare($sql);
$stmt->execute();

foreach ($stmt as $row) {
    echo $row["name"] . " " . $row["comment"] . " " . $row["date"] . "#";
}
?>
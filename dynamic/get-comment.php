<?php
$name = $_GET["name"];

$pdo = new PDO(
    'mysql:dbname=koseidoi_test;host=157.112.187.131;charset=utf8',
    'koseidoi_admin',
    'kosei110622'
);

$sql = "SELECT * FROM comments ORDER BY id LIMIT 0, 100";

$stmt = $pdo->prepare($sql);
$stmt->execute();

foreach ($stmt as $row) {
    echo $row["name"] . " " . $row["comment"] . " " . $row["date"] . " left#";
}
?>
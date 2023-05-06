<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedbacks</title>
</head>
<body>
    <?php
    $name = $_GET["name"];
    $comment = $_GET["comment"];

    $pdo = new PDO(
        'mysql:dbname=koseidoi_test;host=157.112.187.131;charset=utf8',
        'koseidoi_admin',
        'kosei110622'
    );

    $sql = "SELECT * FROM feedbacks";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':name' , $name );
    $stmt->bindValue(':comment', $comment );

    $stmt->execute();

    foreach($stmt as $row){
        echo $row[0] . " " . $row[1] . " " . $row[2] . "<BR>";
    }

    ?>

</body>
</html>
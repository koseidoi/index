<?php
        $id = (int)$_GET["id"];
	$name  = $_GET["name"];
	$coins = (int)$_GET["coins"];
	$time  = $_GET["time"];
	$mode  = $_GET["mode"];
	$rank  = (int)$_GET["rank"];

	$pdo = new PDO(
            'mysql:dbname=koseidoi_test;host=157.112.187.131;charset=utf8',
            'koseidoi_admin',
            'kosei110622'
        );
        
        $sql = "INSERT INTO clients (name,coins,time,mode,rank,date) VALUES (:name,:coins,:time,:mode,:rank,now())";
 
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name' , $name );
        $stmt->bindValue(':coins', $coins );
        $stmt->bindValue(':time' , $time );
        $stmt->bindValue(':mode' , $mode );
        $stmt->bindValue(':rank' , $rank );

        $stmt->execute();


        $sql = "SELECT * FROM extra WHERE id = $id";
 
        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $coin = 0;
        $total_coins = 0;
        $times = "";        

        foreach($stmt as $row){
            $c = (int)$row[2];
            echo gettype($c);
            echo gettype($coins);
            if($c < $coins){
                $coin = $coins;
            }else{
                $coin = $row[2];
            }
            $total_coins = (int)$row[3] + $coins;

            $preTime = $row[4];
            $newTime = $time;

            $list = array($preTime,$newTime);

            sort($list);
            
            $times = $list[0];
        }

        $sql = "UPDATE extra SET coins = $coin,total_coins = $total_coins,time = '$times' WHERE id = $id";
 
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
?>

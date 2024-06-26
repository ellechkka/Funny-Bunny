<?php
    $id = $_POST["id"];
    $tk = $_POST["token"];
    $result = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=exitTheGame&p1=$id&p2=$tk");

    $result = json_decode($result);

    setcookie("roomId", $g, time() - 3600, '/~s314947/db/game');
?>
<?php
    $id = $_POST["id"];

    $result = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=checkerForWaiting&p1=$id");
    $result = json_decode($result);
    
    echo $result->gameIsStart[0];
?>
<?php
    $id = $_POST["id"];
    $idr = $_POST["idr"];
    $tk = $_POST["token"];
    $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=moveRabbit&p1=$id&p2=$idr&p3=$tk");
    $result = json_decode($result);

    if (isset($result->RESULTS[0]->ERROR[0])) { 
        echo json_encode(array('success' => 0, 'error' => $result->RESULTS[0]->ERROR[0]));
    }
    else {
        echo json_encode(array('success' => 1));
    }
?>
<?php
    $tk = $_POST["token"];
    // $l = $_POST["login"];
    $n = $_POST["number"];
    $t = $_POST["time"];
    // $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=createRoom&p1=$l&p2=$t&p3=$n");
    $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=createRoom&p1=$tk&p2=$t&p3=$n");
    $result = json_decode($result); 

    if (isset($result->RESULTS[0]->ERROR[0])) {
        $err = $result->RESULTS[0]->ERROR[0];
        echo json_encode(array('success' => 0, 'error' => $err));
    }
    else {
        $g = $result->RESULTS[1]->id[0];
        setcookie("roomId", $g, time() + 7200, '/~s314947/db/game');
        echo json_encode(array('success' => 1));
    }
?>

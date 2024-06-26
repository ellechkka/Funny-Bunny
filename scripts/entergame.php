<?php
    $tk = $_POST["token"];
    $g = $_POST["game"];
    // $l = $_POST["login"];
    // $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=joinRoom&p1=$l&p2=$g");
    $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=joinRoom&p1=$tk&p2=$g");
    $result = json_decode($result);
    
    if (isset($result->RESULTS[0]->ERROR[0])) {
        $err = $result->RESULTS[0]->ERROR[0];
        echo json_encode(array('success' => 0, 'error' => $err));
    }
    else {
        $start = $result->RESULTS[0]->gameIsStart[0];
        $arr = array('success' => 1, 'start' => $start);
        setcookie("roomId", $g, time() + 7200, '/~s314947/db/game');
        echo json_encode($arr);
    }
?>
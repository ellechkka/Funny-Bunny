<?php
    $id = $_POST["id"];
    $tk = $_POST["token"];
    $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=checker&p1=$id&p2=$tk");
    $result = json_decode($result); 

    $win = array($result->RESULTS[1]->WIN_0_PLAYERS[0]);

    $rabbits = array('count' => count($result->RESULTS[2]->RabbitId));
    for ($i = 0; $i < count($result->RESULTS[2]->RabbitId); $i++) {
        array_push($rabbits, $result->RESULTS[2]->Login[$i]);
        array_push($rabbits, $result->RESULTS[2]->RabbitId[$i]);
        array_push($rabbits, $result->RESULTS[2]->Color[$i]);
    }

    $where_rabbits = array('count' => count($result->RESULTS[3]->SpaсeNumber));
    for ($i = 0; $i < count($result->RESULTS[3]->SpaсeNumber); $i++) {
        array_push($where_rabbits, $result->RESULTS[3]->SpaсeNumber[$i]);
        array_push($where_rabbits, $result->RESULTS[3]->rabbit[$i]);
    }

    $holes = array('count' => count($result->RESULTS[4]->SpaсeNumber));
    for ($i = 0; $i < count($result->RESULTS[4]->SpaсeNumber); $i++) {
        array_push($holes, $result->RESULTS[4]->SpaсeNumber[$i]);
    }

    $action = array($result->RESULTS[5]->Action[0]);

    $whos_turn = array('player' => $result->RESULTS[6]->PLAYER[0], 'time' => $result->RESULTS[6]->TIME[0]);

    // $movement_order = array('count' => count($result->RESULTS[7]->PlayerId));
    // for ($i = 0; $i < count($result->RESULTS[7]->PlayerId); $i++) {
    //     array_push($movement_order, $result->RESULTS[7]->Login[$i]);
    // }
    
    $end = array($result->RESULTS[8]->END[0]);

    $time_end = array($result->RESULTS[9]->TIME_END[0]);

    $no_more_rabbits = array($result->RESULTS[10]->noRABBITS[0]);

    $jsonData = array(
        'win' => $win,
        'rabbits' => $rabbits,
        'where_rabbits' => $where_rabbits,
        'holes' => $holes,
        'action' => $action,
        'turn' => $whos_turn,
        // 'order' => $movement_order,
        'end' => $end,
        'time_end' => $time_end,
        'no_more_rabbits' => $no_more_rabbits,
    );
    $jsonString = json_encode($jsonData);
    echo $jsonString;
?>
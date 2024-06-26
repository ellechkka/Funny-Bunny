<?php
    $l = $_POST["login"];
    $result = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=activeGames&p1=$l");
    $result = json_decode($result);

    $arr = array('rooms_cnt' => count($result->RoomId));

    for ($i = 0; $i < count($result->RoomId); $i++) {
        array_push($arr, $result->RoomId[$i]);
        array_push($arr, $result->TimeOnMove[$i]);
        array_push($arr, $result->NumberOfPeople[$i]-$result->freePlaces[$i]);
        array_push($arr, $result->NumberOfPeople[$i]);
    }

    echo json_encode($arr);
?>
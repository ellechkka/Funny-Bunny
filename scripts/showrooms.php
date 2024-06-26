<?php
    $result = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=showRooms");
    $result = json_decode($result);

    if (isset($result->ERROR[0])) {
        $err = $result->ERROR[0];
        echo json_encode(array('success' => 0, 'error' => $err));
    }
    else {
        $arr = array('success' => 1, 'rooms_cnt' => count($result->RoomId));

        for ($i = 0; $i < count($result->RoomId); $i++) {
            array_push($arr, $result->RoomId[$i]);
            array_push($arr, $result->TimeOnMove[$i]);
            array_push($arr, $result->NumberOfPeople[$i]-$result->freePlaces[$i]);
            array_push($arr, $result->NumberOfPeople[$i]);
        }

        echo json_encode($arr);
    }
?>
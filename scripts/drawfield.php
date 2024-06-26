<?php
    $id = $_POST["id"];
    $result = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=fillField&p1=$id");
    $result = json_decode($result);

    $arr = array('players_cnt' => count($result->PlayerId));

    for ($i = 0; $i < count($result->PlayerId); $i++) {
        array_push($arr, $result->PlayerId[$i]);
        array_push($arr, $result->Login[$i]);
        array_push($arr, $result->MovmentNumber[$i]);
        array_push($arr, $result->Color[$i]);
    }
    echo json_encode($arr);
?>


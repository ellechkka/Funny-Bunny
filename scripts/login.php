<?php
    $l = $_POST["username"];
    $p = $_POST["password"];
    // $user = file_get_contents("https://mysql.lavro.ru/call.php?db=314947&pname=authorization&p1=$l&p2=$p");
    // $user = json_decode($user);

    // $token = $user->tk[0];

    // if (isset($user->ERROR[0])) {
    //     $err = $user->ERROR[0];
    //     echo json_encode(array('success' => 0, 'error' => $err));
    // }
    // else {
    //     setcookie("login", $l, time() + 7200, '/~s314947/db/game');
    //     setcookie("token", $token, time() + 7200, '/~s314947/db/game');

    //     echo json_encode(array('success' => 1));
    // }

    $result = file_get_contents("https://sql.lavro.ru/call.php?db=314947&pname=authorization&p1=$l&p2=$p");
    $result = json_decode($result);

    if (isset($result->RESULTS[0]->ERROR[0])) { 
        echo json_encode(array('success' => 0, 'error' => $result->RESULTS[0]->ERROR[0]));
    } else {
        $token = $result->RESULTS[0]->tk[0];

        setcookie("login", $l, time() + 7200, '/~s314947/db/game');
        setcookie("token", $token, time() + 7200, '/~s314947/db/game');

        echo json_encode(array('success' => 1));
    }
?>
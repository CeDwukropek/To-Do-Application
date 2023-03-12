<?php
    $conn = mysqli_connect('localhost', 'root', '', 'to-do-application');
    $querySend = $_POST['query'];
    $query = mysqli_query($conn, $querySend);

    if($query === true) {
        $response = array('status' => 'error', 'message' => 'Query error: ' . mysqli_error($conn));
        echo json_encode($response);
        echo "Dziala";
        echo $querySend;
    } else {
        echo "Nie dziala";
        echo $querySend;
        $response = array('status' => 'error', 'message' => 'Query error: ' . mysqli_error($conn));
        echo json_encode($response);
        //echo $querySend;
    };

    header('Content-Type: application/json');
    echo json_encode($response);
?>
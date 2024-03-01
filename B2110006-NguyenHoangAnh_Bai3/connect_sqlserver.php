<?php
    $serverName = "NHA_COMPUTER\HOANGANH";
    $connectionOptions = [
        "Database"=>"DBQLSINHVIEN",
        "Uid"=>"",
        "PWD"=>""
    ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
        die(print_r(sqlsrv_errors(), true)); 
    else echo "Connection Success". "<br>";
    $sql = "SELECT * FROM SINHVIEN";
    $result = sqlsrv_query($conn, $sql);
    if($result == false)
        echo "Khong";
    while($obj = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
        echo $obj['SV_Ma']." " . $obj['SV_Ten']."<br>";
    }
    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
?>
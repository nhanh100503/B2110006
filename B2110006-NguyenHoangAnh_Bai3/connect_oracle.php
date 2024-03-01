<?php
    $hostname = "localhost";
    $user = "sys";
    $pass = "orcl";
    $servicename = "orcl";
    $port = 1521;
    $con_tr = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $hostname)(PORT = $port))(CONNECT_DATA = (SERVICE_NAME = $servicename)))";
    $conn = oci_connect($user, $pass, $con_tr, "AL32UTF8", OCI_SYSDBA);
    if(!$conn){
        $e = oci_error();
    }
    else{
        echo "ORACLE DATABASE CONNECTED SUCCESSFULLY" . "<br>";
        $query = "SELECT * FROM b2110006.SINH_VIEN";
        $stmt = oci_parse($conn, $query);

        oci_execute($stmt);
        while ($row = oci_fetch_assoc($stmt)){
            print_r($row);
            echo '<br>';
        }
        oci_close($conn);
    } 
?>
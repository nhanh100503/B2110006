<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $majorID = $_POST["id"];
        $majorName = $_POST["name_major"];
        if(empty($majorID) || empty($majorName)){
            echo "Name va ID khong duoc de trong!";
        }
        else{
            $sql = "INSERT INTO major(id, name_major) VALUES ('$majorID','$majorName')";
            if($conn->query($sql) === TRUE){
                echo "Them du lieu thanh cong!";
            }
            else{
                echo "Loi!" . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();
?>

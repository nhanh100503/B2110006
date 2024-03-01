<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        print_r($result);
        echo "<br>";
        echo "<br>";

        while($row = $result->fetch_assoc()) {
            echo "id: " . $row['id']. " - Hoten: " . $row['fullname'] . " " .
            $row['email'] . " ngaysinh: " . $row['Birthday'] . "<br>";
        }
        echo "<br>";
        echo "<br>";
        $result->free_result();

        $result = $conn->query($sql);
        $result_all = $result->fetch_all();
        print_r($result_all);

        echo "<table border=1><tr><th>ID</th><th>Hoten</th><th>email</th><th>ngaysinh</th></tr>";
        foreach ($result_all as $row) {
        $date = date_create($row[3]);
        echo "<tr><td>" . $row[0]. "</td><td>" . $row[1].
        "</td><td>" . $row[2]. "</td><td>" .
        $date ->format('d-m-Y')
        . "</td></tr>";
        
        }
        echo "</table>";
        echo "<br>";
        echo "<br>";
        $result->free_result();

        $result = $conn->query($sql);
        while($row = $result->fetch_array()) {
            $date = date_create($row[3]);
            echo "ID: " . $row['id']. " - Hoten: " . $row['fullname'] . " - Email: " .
            $row['email'] . " - Ngaysinh: " . $date->format('d-m-Y') . "<br>";
        }
        echo "<br>";
        echo "<br>";
        $result->free_result();

        $result = $conn->query($sql);
        while($row = $result->fetch_row()) {
            $id = $row[0];
            $name = $row[1];
            $email = $row[2];
            $date = date_create($row[3]);
            echo "ID: " . $id . " - Hoten: " . $name . " - Email: " .
            $email . " - Ngaysinh: " . $date->format('d-m-Y') . "<br>";
        }
        echo "<br>";
        echo "<br>";
        $result->free_result();
    }
    else {
        echo "0 ket qua tra ve";
    }
    $conn->close();
?>
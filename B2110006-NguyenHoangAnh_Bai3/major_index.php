<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM major";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $result = $conn->query($sql);
        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
    ?>

    <h1>Bang du lieu Major</h1>
    <table border="1"><tr><th>ID</th><th>Ten chuyen nganh</th><th colspan="2">Hanh dong</th></tr>
    
    <?php
        foreach($result_all as $row){
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name_major'] . "</td><td>";
    ?>
        <form method="post" action="major_delete.php">
            <input type="submit" name="action" value="xoa"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
    <?php
        echo "</td><td>";
    ?>
        <form method="post" action="major_edit.php">
            <input type="submit" name="action" value="sua"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
    <?php
        echo "</td></tr>";
        }   
        echo "</table>";
    ?>
        <form method="post" action="major_form_add.php">
            <input type="submit" name="action" value="Add"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
    }
    else{
        echo "Khong ket qua tra ve";
    }
    $conn->close();
?>
<!DOCTYPE HTML>
<html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM major";
    $result = $conn->query($sql);
?>
<body>
    <form action="luu.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Birthday: <input type="date" name="birth"><br>
        Major: 
            <select name="major" id="" style="width: 200px; height: 25px; ">
                <?php
                    while ($major = $result->fetch_assoc()){
                        echo '<option value="' . $major['id'] . '">'
                         .$major['name_major'] .'</option>';
                    }
                ?>
            </select><br>
        <input type="submit">
    </form>
</body>
</html>



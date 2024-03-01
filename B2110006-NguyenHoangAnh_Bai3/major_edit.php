<!DOCTYPE html>
<html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }    
    $id = $_POST['id'];
    $sql = "SELECT * FROM major WHERE ID = '".$id."'";
?>
<body>
    <?php print_r($row)?>
    <form action="major_edit_save.php" method="post">
        ID: <input type="text" name="id" value="<?php echo $row['id']; ?>"> <br>
        Ten chuyen nganh: <input type="text" name="name_major" value="<?php echo $row['name_major'] ;?>"> <br>
        <input type="submit" value="update">
    </form>
</body>
</html>



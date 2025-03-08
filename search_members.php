<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['query'])){
    $query = $_POST['query'];

  
    $sql = "SELECT * FROM mem
            WHERE id = '$query' 
            OR name LIKE '%$query%' 
            OR phone = '$query'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="member" data-id="'.$row['id'].'">'.$row['id'].'-'.$row['name'].'-'.$row['phone'].'</div>';
            
        }
    } else {
        echo 'No member found.';
    }
}

$conn->close();
?>

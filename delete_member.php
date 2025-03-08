<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
       <header> 
                <h1>Welcome to Nanded fitnesss</h1>
                <nav>
                <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="new_member.php">New member</a></li>
                <li><a href="view_members.php">View Member</a></li>
                <li><a href="view_expiring_members.php">Expiring Member</a></li>
                <li><a href="search_members1.php">Bill</a></li>
                <li><a href="manage_membership.php">Manage</a></li>
            </ul>
                </nav>
       
        </header>
     
    
       
       <?php
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gym";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_GET['id'])){
            $memberId = $_GET['id'];

        
            $sql = "DELETE FROM `mem` WHERE `mem`.`id` = '$memberId'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Member record deleted successfully";
            } else {
                echo "Error deleting member record: " . $conn->error;
            }
        }

        $conn->close();
        ?>
    
</body>
</html>
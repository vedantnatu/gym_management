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
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="new_member.php">New member</a></li>
                    <li><a href="view_members.php">view member</a></li>
                    <li><a href="view_expiring_members.php">expiring member</a></li>
                    <li><a href="generate_bill.php">bill</a></li>
                    <li><a href="manage_membership.php">manage</a></li>
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

        
        $sql = "SELECT * FROM mem WHERE id = '$memberId'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            
            echo "<h2>Member Details:</h2>";
            echo "<p>ID: ".$row['id']."</p>";
            echo "<p>Name: ".$row['name']."</p>";
            echo "<p>Email: ".$row['email']."</p>";
            echo "<p>Phone: ".$row['phone']."</p>";
            echo "<p>Membershi type: ".$row['membershiptype']."</p>";
            echo "<p>Regestration Date: ".$row['dt']."</p>";
            echo "<p>Gender: ".$row['sex']."</p>";
            echo "<p>Amount paid: ".$row['fee']."</p>";
            echo "<p>Pacakage type: ".$row['pack']."</p>";
            echo "<p>Expiring on: ".$row['expiryDate']."</p>";
           

            echo '<a href="update_member.php?id='.$row['id'].'">Update Member</a>';
            echo nl2br("\n");
            echo nl2br("\n");
            echo '<a href="delete_member.php?id='.$row['id'].'">Delete Member</a>';
        } else {
            echo 'No member details found.';
        }
    }

    $conn->close();
    ?>

</body>
</html>
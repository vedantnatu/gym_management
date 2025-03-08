<!DOCTYPE html>
<html>
<head>
    <title>View Members Expiring Soon</title>
    <link rel="stylesheet" href="styles.css">

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
    <h2>Select Timeframe to View Members Whose Subscriptions Are Expiring</h2>
    <form action="view_expiring_members.php" method="post">
        <label for="timeframe">Select Timeframe:</label>
        <select name="timeframe" id="timeframe" required>
            <option value="7">Next 7 Days</option>
            <option value="30">Next 30 Days</option>
            <option value="365">Next Year</option>
           
        </select>
        <input type="submit" value="Submit">
    </form>
</body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["timeframe"])) {
    $selectedTimeframe = $_POST["timeframe"];

    
    $conn = new mysqli($servername, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $currentDate = date('Y-m-d'); 
    $futureDate = date('Y-m-d', strtotime("+$selectedTimeframe days")); 

    
    $sql = "SELECT * FROM mem WHERE expiryDate BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $currentDate, $futureDate);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Members whose subscription is expiring within the selected timeframe:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['name']} - {$row['email']} - Expiry Date: {$row['expiryDate']}</li>";
            
        }
        echo "</ul>";
    } else {
        echo "No members have subscriptions expiring within the selected timeframe.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please select a timeframe to view expiring members.";
}
?>

</html>

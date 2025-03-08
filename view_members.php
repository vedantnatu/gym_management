<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
  <header>
        <h1>View Member </h1>
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
    <br><br>
    <form action="view_members.php" method="get">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br><br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>


    <table>
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                 
            </tr>
        </thead>
      <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gym";

           
            $conn = new mysqli($servername, $username, $password, $database);

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $start_date = $_GET["start_date"];
                $end_date = $_GET["end_date"];

                
                $sql = "SELECT * FROM mem WHERE dt BETWEEN ? AND ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $start_date, $end_date);

                $stmt->execute();
                $result = $stmt->get_result();


                if ($result->num_rows > 0) {
                   
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo isset($row['id']) ? "<td>".$row['id']."</td>" : "<td>Unknown</td>";
                        echo isset($row['name']) ? "<td>".$row['name']."</td>" : "<td>Unknown</td>";
                        echo isset($row['email']) ? "<td>".$row['email']."</td>" : "<td>Unknown</td>";
                        echo isset($row['phone']) ? "<td>".$row['phone']."</td>" : "<td>Unknown</td>";
                       
                        echo "</tr>";
                    }
                    
                } else {
                    echo "No members found within the specified date range.";
                }

                $stmt->close();
            }

            $conn->close();
            ?>
        </tbody>
    </table>


    
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
    <title>Search Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        input[type="text"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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
        .member-link {
            text-decoration: none;
            color: #333;
            cursor: pointer;
        }
        .member-link:hover {
            color: blue;
        }
    </style>
    <script>
        function selectMember(memberId) {
            
            window.location = 'generate_receipt.php?id=' + memberId;
        }
    </script>
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
    
    <h2>Search Members</h2>
    <form action="" method="post">
        <label for="search">Search Members:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Search">
    </form>

    <?php
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gym";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['search'])){
        $searchTerm = $_POST['search'];

        
        $sql = "SELECT * FROM mem WHERE 
                name LIKE '%$searchTerm%' OR 
                id LIKE '%$searchTerm%' OR 
                phone LIKE '%$searchTerm%'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Search Results:</h3>";
            echo "<table>";
            echo "<tr><th>Member ID</th><th>Name</th><th>Email</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr onclick='selectMember(".$row['id'].")' class='member-link'>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo 'No members found.';
        }
    }

    $conn->close();
    ?>
</body>
</html>






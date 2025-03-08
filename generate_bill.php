<!DOCTYPE html>
<html>
<head>
    <title>Member Search and Bill Generation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search_input').on('keyup', function(){
                var query = $(this).val();
                if(query !== ''){
                    $.ajax({
                        url: 'search_members.php',
                        method: 'POST',
                        data: {query: query},
                        success: function(data){
                            $('#member_list').html(data);
                        }
                    });
                }
            });

            $(document).on('click', '.member', function(){
                var memberId = $(this).attr('data-id');
                $('#selected_member_id').val(memberId);
            });
        });
    </script>
</head>
<body>
    <h2>Search Members and Generate Bill</h2>
    <form action="generate_bill.php" method="post">
        <label for="search_input">Search Members:</label>
        <input type="text" name="search_input" id="search_input" autocomplete="off">
        <div id="member_list"></div>
        <input type="hidden" name="selected_member_id" id="selected_member_id">
        <input type="submit" value="Generate Bill">
    </form>

            <?php
        require_once 'dompdf/autoload.inc.php';
        use Dompdf\Dompdf;

        // Database connection and query to fetch member details based on selected_member_id
        // Replace with your actual database connection logic and query

        // Example code (modify as needed)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gym";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['selected_member_id'])){
            $selectedMemberId = $_POST['selected_member_id'];

            // Perform a database query to fetch member details based on $selectedMemberId
            // Replace this with your query logic, e.g., fetch member details by ID
            $sql = "SELECT * FROM mem WHERE id = $selectedMemberId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Retrieve member details
                $customerName = $row['name'];
                $receiptNumber = $row['id'];
                $totalAmount = $row['fee'];
                $paymentDate = $row['dt'];

                // Create PDF bill using Dompdf
                $html = "<h1>Bill for $customerName</h1>";
                $html .= "<p>Receipt Number: $receiptNumber</p>";
                $html .= "<p>Total Amount: $totalAmount</p>";
                $html .= "<p>Payment Date: $paymentDate</p>";

                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('bill.pdf', array('Attachment' => 1));
            } else {
                echo 'No member found with the selected ID.';
            }
        }

        $conn->close();
        ?>

</body>
</html>

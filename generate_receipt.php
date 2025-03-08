<?php

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if(isset($_GET['id'])){
    $memberId = $_GET['id'];

    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gym";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM mem WHERE id = '$memberId'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $html = '<style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .receipt {
                        border: 1px solid #333;
                        padding: 20px;
                        background-color: #f9f9f9;
                    }
                    .info {
                        margin-bottom: 15px;
                    }
                    .info label {
                        font-weight: bold;
                    }
                </style>';
        
        $html .= '<div class="header">
                    <h5>TAX INOVICE</h5>
                    <h1>Nanded fitnesss</h1>
                  </div>';
        
        $html .= '<div class="receipt">
                    <div class="info">
                     <label>Member id:</label> '.$row['id'].'
                    </div>
                    <div class="info">
                        <label>Name:</label> '.$row['name'].'
                    </div>
                    <div class="info">
                        <label>Email:</label> '.$row['email'].'
                    </div>
                    <div class="info">
                        <label>Phone:</label> '.$row['phone'].'
                    </div>
                    <div class="info">
                        <label>Joining Date:</label> '.$row['dt'].'
                    </div>
                    <div class="info">
                        <label>Expiry:</label> '.$row['expiryDate'].'
                    </div>
                    <div class="info">
                        <label>Amount Paid:</label> '.$row['fee'].'
                    </div>
                    </div>
                    <!-- Add more member details as needed -->
                  </div>';
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        
        $dompdf->setPaper('A4', 'portrait');
        
        
        $dompdf->render();
        
        
        $dompdf->stream('receipt_'.$row['id'].'.pdf', array("Attachment" => false));
    } else {
        echo 'No member details found.';
    }

    $conn->close();
}

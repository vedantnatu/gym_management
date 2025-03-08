<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>New Member Signup - XYZ Gym</title>
    <script>
        function validateForm() {
            var fullName = document.getElementById("full_name").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var membershipType = document.getElementById("membership_type").value;

            if (fullName.trim() === "") {
                alert("Please enter your full name.");
                return false;
            }

            

            if (email.trim() === "") {
                alert("Please enter your email address.");
                return false;
            }

            if (!isValidEmail(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (phone.trim() === "") {
                alert("Please enter your phone number.");
                return false;
            }

                
            if (!isValidPhone(phone)) {
              alert("Please enter a 10-digit phone number.");
              return false;
            }

            if (membershipType === "") {
                alert("Please select a membership type.");
                return false;
            }

            return true;
        }

        function isValidEmail(email) {
           
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailRegex.test(email);
        }
         
        function isValidPhone(phone) {
            var phoneRegex = /^\d{10}$/; 
            
            return phoneRegex.test(phone);
        }

       

    </script>
</head>
<body>
    <header>
        <h1>New Member Signup</h1>
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

    <section class="new-member">
        <h2>Join Nanded fitness Today</h2>
        <p>Welcome to Nanded fitness! We're excited to have you join our fitness community. Please fill out the form below to sign up as a new member.</p>

        <form action="#" method="POST" onsubmit="return validateForm();">
            
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="membership_type">Membership Type:</label>
            <select id="membership_type" name="membershiptype">
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="platinum">Platinum</option>
                
            </select>
            <label for="dt">Membership date:</label>
            <input type="date" id="dt" name="dt" required>
            <br/>
            <label for="sex">Sex:</label>
            <select id="sex" name="sex">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            

            <label for="fee">Amount:</label>
            <input type="int" id="fee" name="fee" required>

            <label for="pack">package:</label>
            <select id="pack" name="pack">
                <option value="yearly">yearly</option>
                <option value="monthly">monthly</option>
                <option value="quarterly">quarterly</option>
            </select>

            <input type="submit" value="Sign Up" class="cta-button" name="submit">
        </form>
    </section>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $membershiptype = $_POST['membershiptype'];
            $dt = $_POST['dt'];
            $sex=$_POST['sex'];
            $fee= $_POST['fee'];
            $pack=$_POST['pack'];

            $expiryDate = $dt; 

            switch ($pack) {
                case 'yearly':
                    $expiryDate = date('Y-m-d', strtotime($dt . '+1 year')); 
                    break;
                case 'monthly':
                    $expiryDate = date('Y-m-d', strtotime($dt . '+1 month')); 
                    break;
                case 'quarterly':
                    $expiryDate = date('Y-m-d', strtotime($dt . '+3 months')); 
                    break;
                
                
            }
        
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "gym";

      
        $conn = mysqli_connect($servername, $username, $password, $database);

        

        
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{ 
           
            $sql = "INSERT INTO `mem` (`name`, `email`, `phone`,`membershiptype`,`dt`,`sex`,`fee`,`pack`,`expiryDate`) VALUES ('$name', '$email', '$phone','$membershiptype','$dt','$sex','$fee','$pack','$expiryDate')";
            $result = mysqli_query($conn, $sql);
    
            if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>';
            }
            else{
              
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>';
            }

        }

        }

        
    ?>

</body>
</html>

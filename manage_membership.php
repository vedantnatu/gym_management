<!DOCTYPE html>
<html>
<head>
    <title>Member Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles.css">
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
                window.location = 'view_member.php?id=' + memberId;
            });
        });
    </script>
</head>
<body>
<header>
<h2>Search Members</h2>
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
    <br/>
    <form>
        <label for="search_input">Search Members:</label>
        <input type="text" name="search_input" id="search_input" autocomplete="off">
        <div id="member_list"></div>
    </form>
</body>
</html>

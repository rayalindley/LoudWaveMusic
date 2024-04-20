<?php
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

include 'connect.php';
$sqlOrg = "SELECT * FROM tblorganizer";
$resultOrg = mysqli_query($connection, $sqlOrg);

?>
<!-- no, i don't want another delete.php
just handle it in my -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LoudWave Music - My Profile</title>
    <link href="css/LoudWave.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Ojuju:wght@200..800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div> 
            <a href="index.php">LoudWave Music</a>
        </div>

        <div>
            <input type="text" placeholder="Search concerts, events, and artists" class="search-bar">
        </div>
        
        <div>
            <a>Welcome, <?php echo isset($user_account_data['username']) ? $user_account_data['username'] : ''; ?>!</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div id="menu">
        <a href="aboutus.php">About Us</a>
        <a href="contactus.php">Contact Us</a>
    </div>

        <h1> Profile </h1>

        <button onclick="showProfile()"> My Profile </button>
        <div id="myprofile" class="admin-section">
            <div>
                <label>First Name: </label>
                <?php echo isset($user_profile_data['firstname']) ? $user_profile_data['firstname'] : ''; ?>
            </div>

            <div>
                <label>Last Name: </label>
                <?php echo isset($user_profile_data['lastname']) ? $user_profile_data['lastname'] : ''; ?>
            </div>

            <div>
                <label>Email Address: </label>
                <?php echo isset($user_account_data['emailadd']) ? $user_account_data['emailadd'] : ''; ?>
            </div>

            <div>
                <label>Gender: </label>
                <?php echo isset($user_profile_data['gender']) ? $user_profile_data['gender'] : ''; ?>
            </div>

            <div>
                <label>Birthdate: </label>
                <?php echo isset($user_profile_data['birthdate']) ? $user_profile_data['birthdate'] : ''; ?>
            </div>

            <form method="post">
                <button type="submit" name="delete_account">Delete Account</button>
            </form>
        </div>
    
        <button onclick="showOtherOrganizers()"> Other Organizers </button>
        <div id="otherorganizers" class="admin-section">
                <h2>Organizers</h2>
                <ul>
                    <?php
                        while ($row = mysqli_fetch_assoc($resultOrg)) {
                            echo "<li>
                                ID: {$row['organizerid']}</br>
                                Lastname: {$row['lastname']}</br>
                                Firstname: {$row['firstname']}</br>
                                Role: {$row['org_role']}</br></br>
                            </li>";
                        }
                    ?>
                </ul>
        </div>
    
        <button onclick="showConcerts()"> Manage Concerts </button>
        <div id="otherorganizers" class="admin-section">
                <a href="#"> </a>
        </div>
    
</body>
</html>


<script src="js/LoudWave.js"></script>


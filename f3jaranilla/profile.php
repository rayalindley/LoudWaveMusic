<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connect.php';

$user_id = $_SESSION['id'];
// Query for user account data
$sql_account = "SELECT * FROM tbluseraccount WHERE userid_fk = '$user_id'";
$result_account = mysqli_query($connection, $sql_account);

// Query for user profile data
$sql_profile = "SELECT * FROM tbluserprofile WHERE userid = '$user_id'";
$result_profile = mysqli_query($connection, $sql_profile);


// Check if queries were successful
if ($result_account && $result_profile) {
    // Fetch user account data
    $user_account_data = mysqli_fetch_assoc($result_account);
    
    // Fetch user profile data
    $user_profile_data = mysqli_fetch_assoc($result_profile);
} else {
    // Handle errors
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>

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
            <!-- Display user profile information -->
            <a>Welcome, <?php echo isset($user_account_data['username']) ? $user_account_data['username'] : ''; ?>!</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div id="menu">
        <a href="aboutus.php">About Us</a>
        <a href="contactus.php">Contact Us</a>
    </div>

    <div class="container">
        <h1> Profile </h1>
        
        <div class="grid2container">  
            <div>
                <nav>
                    <ul>
                        <li>Profile</li>
                        <li>Subscriptions</li>
                    </ul>
                </nav>
            </div>

            <div>
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
            </div>
        </div>
    </div>
</body>
</html>
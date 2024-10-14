<?php
session_start(); 

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$db_username = "root";  
$db_password = "psw";  
$dbname = "las_db"; 

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM user_info WHERE id = '$id' AND username = '$username'";
$result = $conn->query($sql);

$phonenumber = $email = $photo_path = "Please add";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $phonenumber = !empty($row['phonenumber']) ? $row['phonenumber'] : "Please add";
    $email = !empty($row['email']) ? $row['email'] : "Please add";
    $photo_path = !empty($row['photo_path']) ? $row['photo_path'] : "Please add";
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>User Profile</h2>
    
    <form method="post" action="profile.php" enctype="multipart/form-data">
        <input type="hidden" name="edit_mode" value="1">  <!-- 隐藏字段保持编辑模式 -->
        
        <table border="1">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>ID</td>
                <td><?php echo htmlspecialchars($id); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo htmlspecialchars($username); ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>
                    
                        <?php echo htmlspecialchars($phonenumber); ?>
                   
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    
                        <?php echo htmlspecialchars($email); ?>
                   
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>
                    
                        Please upload a photo.
                    
                </td>
            </tr>
        </table>
        
    </form>
</body>
</html>

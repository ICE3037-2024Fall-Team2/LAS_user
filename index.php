<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        .welcome {
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>Welcome, <span class="welcome"><?php echo htmlspecialchars($username); ?></span>!</h2>
</body>
</html>

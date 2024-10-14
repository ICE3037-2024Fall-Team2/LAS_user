<?php
// link to mysql
$servername = "localhost";
$username = "root"; // mysql user root name
$password = "your_mysql_password"; // root psw
$dbname = "las_db"; // database name

$conn = new mysqli($servername, $username, $password, $dbname);

// check link
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // studentid
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // check student id
    if (preg_match("/^\d{10}$/", $id)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // 哈希密码

        // add item to table
        $sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Student ID must be exactly 10 digits!";
    }
}
?>



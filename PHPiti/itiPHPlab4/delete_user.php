<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iti_CMS";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $query);
}

header("Location: list_users.php");
exit();
?>

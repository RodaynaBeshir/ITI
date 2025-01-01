<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iti_CMS";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user details
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>User Details</h3>
        </div>
        <div class="card-body">
            <p>Name: <?= $user['name'] ?></p>
            <p>Email: <?= $user['email'] ?></p>
            <p>Gender: <?= $user['gender'] ?></p>
            <p>Mail Status: <?= $user['mail_status'] ?></p>
        </div>
        <div class="card-footer text-center">
            <a href="list_users.php" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>

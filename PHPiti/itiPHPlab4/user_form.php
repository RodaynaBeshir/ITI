<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iti_CMS";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $email = $gender = $mail_status = "";
$is_edit = false;

if (isset($_GET['id']) ) {
    // Edit : Fetch user details
    $is_edit = true;
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($result);
    $name = $user['name'];
    $email = $user['email'];
    $gender = $user['gender'];
    $mail_status = $user['mail_status'] === 'Yes' ? 'checked' : '';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mail_status = isset($_POST['mail_status']) ? 'Yes' : 'No';

    if ($is_edit) {
        $id = $_GET['id'];
        $query = "UPDATE users SET name = '$name', email = '$email', gender = '$gender', mail_status = '$mail_status' WHERE id = $id";
    } else {
        $query = "INSERT INTO users (name, email, gender, mail_status) VALUES ('$name', '$email', '$gender', '$mail_status')";
    }
    mysqli_query($conn, $query);
    header("Location: list_users.php");
    exit();
}
mysqli_close($conn);
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
        <h2 class="mb-4 text-center"><?= $is_edit ? 'Edit User' : 'Add User' ?></h2>
        <form method="POST" class="shadow p-4 rounded bg-light">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="<?= $name ?>" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="<?= $email ?>" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="Male" <?= $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" id="mail_status" name="mail_status" class="form-check-input" <?= $mail_status ?>>
                <label for="mail_status" class="form-check-label">Receive Mail</label>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <?= $is_edit ? 'Update User' : 'Add User' ?>
                </button>
                <a href="list_users.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

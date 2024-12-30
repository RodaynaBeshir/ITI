<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        .required { color: red; }
    </style>
</head>
<body>
    <?php
    $name = $email = $group = $classDetails = $gender = '';
    $courses = [];
    $nameError = '';
    $agree = false;  

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $group = $_POST['group'] ?? '';
        $classDetails = $_POST['classDetails'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $courses = $_POST['courses'] ?? [];
        $agree = isset($_POST['agree']);  // Check if the checkbox is checked

        // Validate the name field
        if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $nameError = "Name is required in correct way";
        }
    }
    ?>

    <h2>Form</h2>
    <form method="POST" action="">
        <label for="name">Name: <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="<?= $name ?>">
        <span class="error"><?= $nameError ?></span>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $email ?>">
        <br><br>

        <label for="group">Group:</label>
        <input type="text" id="group" name="group" value="<?= $group ?>">
        <br><br>

        <label for="classDetails">Class Details:</label><br>
        <textarea id="classDetails" name="classDetails" rows="5" cols="40"><?= $classDetails ?></textarea>
        <br><br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" <?= $gender === 'Male' ? 'checked' : '' ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?= $gender === 'Female' ? 'checked' : '' ?>>
        <label for="female">Female</label>
        <br><br>

        <label for="courses">Select Courses:</label>
        <select id="courses" name="courses[]" multiple>
            <option value="PHP" <?= in_array('PHP', $courses) ? 'selected' : '' ?>>PHP</option>
            <option value="JavaScript" <?= in_array('JavaScript', $courses) ? 'selected' : '' ?>>JavaScript</option>
            <option value="MySQL" <?= in_array('MySQL', $courses) ? 'selected' : '' ?>>MySQL</option>
            <option value="HTML/CSS" <?= in_array('HTML/CSS', $courses) ? 'selected' : '' ?>>HTML/CSS</option>
        </select>
        <br><br>

        <label for="agree">Agree to Terms:</label>
        <input type="checkbox" id="agree" name="agree" <?= $agree ? 'checked' : '' ?>>
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($nameError)): ?>
        <h3>Form Data:</h3>
        <p><label>Name:</label> <?= $name ?></p>
        <p><label>Email:</label> <?= $email ?></p>
        <p><label>Group:</label> <?= $group ?></p>
        <p><label>Class Details:</label> <?= nl2br($classDetails) ?></p>
        <p><label>Gender:</label> <?= $gender ?></p>
        <p><label>Courses:</label> <?= implode(', ', $courses) ?></p>
        <p><label>Agree to Terms:</label> <?= $agree ? 'Yes' : 'No' ?></p>
        
    <?php endif; ?>
</body>
</html>


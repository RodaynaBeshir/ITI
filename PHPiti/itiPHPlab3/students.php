<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        td, th { padding: 8px; text-align: left;}
        tr.cms { color: red; }
        table, td, th {  border: none; }
    </style>
</head>
<body>
    <table>
        <h1>Apprication registration</h1>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $students = [
                ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
                ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
                ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
                ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
                ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
            ];

            foreach ($students as $student) {
                $rowClass = $student['track'] === 'CMS' ? 'cms' : '';
                echo "<tr class='{$rowClass}'>";
                echo "<td>{$student['name']}</td>";
                echo "<td>{$student['email']}</td>";
                echo "<td>{$student['track']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

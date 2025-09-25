<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : '';
    $country = $_POST['country'];

    // Check password match
    if ($password !== $confirm_password) {
        echo "❌ Passwords do not match. <a href='index.html'>Go back</a>";
        exit();
    }

    // Check if username already exists
    $usersFile = "users.txt";
    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            $data = explode("|", $user);
            if ($data[2] === $username) {
                echo "❌ Username already taken. <a href='index.html'>Go back</a>";
                exit();
            }
        }
    }

    // Save user info to users.txt
    $userData = $fullname . "|" . $email . "|" . $username . "|" . $password . "|" . $gender . "|" . $hobbies . "|" . $country . PHP_EOL;
    file_put_contents($usersFile, $userData, FILE_APPEND);

    echo "✅ Registration successful! <a href='login.html'>Go to Login</a>";
}
?>

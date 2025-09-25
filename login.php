<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersFile = "users.txt";

    if (!file_exists($usersFile)) {
        echo "❌ No users registered yet. <a href='index.html'>Register here</a>";
        exit();
    }

    $users = file($usersFile, FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        $data = explode("|", $user);
        if ($data[2] === $username && $data[3] === $password) {
            $found = true;
            echo "✅ Welcome, " . htmlspecialchars($data[0]) . "! You have successfully logged in.";
            break;
        }
    }

    if (!$found) {
        echo "❌ Invalid username or password. <a href='login.html'>Try again</a>";
    }
}
?>

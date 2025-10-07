<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = trim($_POST['username'] ?? '');
    $Password = trim($_POST['password'] ?? '');

    if (empty($Username) || empty($Password)) {
        echo 'Username and Password are required!';
        exit;
    }

    // Prepare and execute
    $stmt = $dbConnection->prepare('SELECT * FROM sign_in_tbl WHERE User_Name = ? AND Password = ?');
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->execute();

    // ✅ Convert to result set
    $result = $stmt->get_result();

    // ✅ Now fetch all or just one
    $users = $result->fetch_all(MYSQLI_ASSOC);

    $count = count($users);

    if ($count > 0) {
        // No echo before header!
        
        header('Location: ../templates/index.html?id=');
        exit;
    } else {
        echo 'No user found with this username and password';
        header('Location: ../templates/log_in.html');
        exit;
    }
}
?>
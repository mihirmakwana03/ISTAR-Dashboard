<?php
// Start session
session_start();

// Database connection parameters
$host = 'localhost';
$db = 'istar';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required.";
        header("Location: index.html"); // Redirect back to the login page
        exit();
    }

    // Check user credentials
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        if ($remember) {
            setcookie("user_id", $user['id'], time() + (86400 * 30), "/");
            setcookie("username", $user['username'], time() + (86400 * 30), "/");
        }
        $_SESSION['modal_shown'] = false; // Initialize modal shown status
        header("Location: ../index.html"); // Redirect to a dashboard page
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: index.html");
        exit();
    }
}
?>

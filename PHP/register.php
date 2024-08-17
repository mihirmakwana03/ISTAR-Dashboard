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
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: pages-register.html"); // Redirect back to the registration page
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':username' => $username,
            ':password' => $hashed_password
        ]);
        $_SESSION['success'] = "Registration successful! Please log in.";
        header("Location: ../index.html"); // Redirect to login page
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Integrity constraint violation: duplicate entry
            $_SESSION['error'] = "Username or Email already exists.";
        } else {
            $_SESSION['error'] = "An error occurred. Please try again.";
        }
        header("Location: pages-register.html");
        exit();
    }
}
?>

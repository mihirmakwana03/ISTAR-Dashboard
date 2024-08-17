<?php
session_start();
$host = 'localhost';
$db = 'user_management';
$user = 'your_database_user';
$pass = 'your_database_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $_SESSION['error'] = "Email is required.";
        header("Location: ../forgot-password.php");
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $sql = "UPDATE users SET reset_token = :token, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':token' => $token, ':email' => $email]);

        $resetLink = "http://yourdomain.com/reset-password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $resetLink";
        $headers = "From: no-reply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            $_SESSION['success'] = "Password reset link has been sent to your email.";
        } else {
            $_SESSION['error'] = "Failed to send email.";
        }
    } else {
        $_SESSION['error'] = "No user found with that email address.";
    }

    header("Location: ../forgot-password.html");
}
?>

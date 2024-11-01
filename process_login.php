<?php
session_start();
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Здесь должна быть проверка логина и пароля
$result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: index.php"); // Перенаправление на главную
} else {
    echo "Неверный логин или пароль.";
}
?>

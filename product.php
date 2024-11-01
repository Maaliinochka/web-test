<?php
$conn = new mysqli("localhost", "username", "password", "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="shop.php">Магазин</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1><?php echo $product['name']; ?></h1>
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
        <p><?php echo $product['description']; ?></p>
        <p>Цена: <?php echo $product['price']; ?> руб.</p>
        <p>Количество в наличии: <?php echo $product['stock']; ?></p>
    </main>
    <footer>
        <p>Контактная информация: email@example.com</p>
        <p>&copy; 2024 Ваш Магазин</p>
    </footer>
</body>
</html>

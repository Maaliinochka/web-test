<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Магазин</title>
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
        <h1>Продукция</h1>
        <table>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Подробнее</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><img src='{$row['image']}' alt='{$row['name']}' /></td>
                        <td>{$row['name']}</td>
                        <td>{$row['price']} руб.</td>
                        <td><a href='product.php?id={$row['id']}'>Подробнее</a></td>
                      </tr>";
            }
            ?>
        </table>
    </main>
    <footer>
        <p>Контактная информация: email@example.com</p>
        <p>&copy; 2024 Ваш Магазин</p>
    </footer>
</body>
</html>

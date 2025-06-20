<?php
require 'config.php';
if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'owner'])) {
    die("ليس لديك صلاحية النشر.");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $stmt = $conn->prepare("INSERT INTO posts (title, content, category, author_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $content, $category, $_SESSION['user']['id']]);
    echo "تم نشر الخبر بنجاح.";
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة منشور - عين ليبيا</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>نشر خبر جديد</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="عنوان الخبر" required>
        <textarea name="content" placeholder="محتوى الخبر" required></textarea>
        <select name="category" required>
            <option value="أخبار ليبيا">أخبار ليبيا</option>
            <option value="الرياضة">الرياضة</option>
        </select>
        <button type="submit">نشر</button>
    </form>
</div>
</body>
</html>
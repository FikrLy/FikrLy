<?php
require 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - عين ليبيا</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>مرحبا، <?php echo $_SESSION['user']['name']; ?> | <a href="logout.php">خروج</a></nav>
<div class="container">
    <h2>أهلاً بك في لوحة تحكم عين ليبيا</h2>
    <?php if ($_SESSION['user']['role'] === 'owner'): ?>
        <p><a href="admin-panel/index.php">دخول لوحة تحكم المالك</a></p>
    <?php endif; ?>
    <p><a href="post.php">إضافة منشور جديد</a></p>
</div>
</body>
</html>
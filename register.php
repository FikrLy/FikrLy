<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass1 = $_POST["password"];
    $pass2 = $_POST["confirm_password"];
    if ($pass1 !== $pass2) {
        die("كلمات المرور غير متطابقة!");
    }
    $hashed = password_hash($pass1, PASSWORD_DEFAULT);
    $role = ($email === OWNER_EMAIL) ? 'owner' : 'user';
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $hashed, $role]);
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل حساب - عين ليبيا</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>إنشاء حساب جديد</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="الاسم الكامل" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <input type="password" name="confirm_password" placeholder="تأكيد كلمة المرور" required>
        <button type="submit">تسجيل</button>
    </form>
    <p>لديك حساب؟ <a href="login.php">سجّل الدخول من هنا</a></p>
</div>
</body>
</html>
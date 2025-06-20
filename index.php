<?php
require '../config.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== OWNER_EMAIL) {
    die("غير مصرح لك بدخول لوحة المالك.");
}
echo "<h2>لوحة تحكم المالك</h2>";
echo "<p>ستتم إضافة أدوات التحكم مثل تعيين الأدمن، حذف المستخدمين، حذف المنشورات قريباً.</p>";
?>
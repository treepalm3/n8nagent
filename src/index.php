<?php
echo "<h1>🚀 PHP 8.3 Server is running!</h1>";

// ดึงค่าตัวแปรจาก environment ที่เราตั้งใน docker-compose.yml
$host = getenv('DB_HOST');
$db   = getenv('DB_DATABASE');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    // ลองเชื่อมต่อฐานข้อมูล
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    echo "<h2>✅ Database Connection Successful!</h2>";
    echo "Connected to MySQL database '<b>$db</b>' on host '<b>$host</b>'.";

} catch (\PDOException $e) {
    // ถ้าเชื่อมต่อไม่ได้
    echo "<h2>❌ Database Connection Failed!</h2>";
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>
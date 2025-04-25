<?php
session_start();
$host = "MySQL-8.2";
$user = "root";
$pass = "";
$dbname = "dormitory";

// Подключение к базе данных
$conn = new mysqli($host, $user, $pass, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Защита от SQL-инъекций
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Проверяем пароль
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Қате логин немесе құпиясөз!'); window.location='vhod.html';</script>";
        }
    } else {
        echo "<script>alert('Пайдаланушы табылмады!'); window.location='vhod.html';</script>";
    }
    $stmt->close();
    $_SESSION['user_name'] = $row['name']; // имя
$_SESSION['user_surname'] = $row['surname']; // фамилия

}
$conn->close();
?>

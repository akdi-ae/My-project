<?php
$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "dormitory"; // Должно совпадать с login.php

// Подключаемся к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Қате қосылым: " . $conn->connect_error);
}

// Получаем данные из формы
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$patronymic = trim($_POST['patronymic']);
$phone = trim($_POST['phone']);
$faculty = trim($_POST['faculty']); // Но у тебя оба select называются "course"
$course = trim($_POST['course']);
$specialty = trim($_POST['specialty']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
//
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

if ($password !== $confirm_password) {
    die("Қате: Құпиясөздер сәйкес келмейді!");
}

// Проверяем, совпадают ли пароли
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);


// Проверяем, существует ли такой email или логин
$stmt_check = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
$stmt_check->bind_param("ss", $email, $username);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    die("Қате: Мұндай email немесе логин тіркелген!");
}
$stmt_check->close();

// Хешируем пароль
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Добавляем пользователя в базу
$sql = "INSERT INTO users 
    (surname, name, patronymic, phone, faculty, course, specialty, username, email, password)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
    "ssssssssss",      // ровно 10 букв s — по одной на каждый ?
    $surname,          // 1
    $name,             // 2
    $patronymic,       // 3
    $phone,            // 4
    $faculty,          // 5
    $course,           // 6
    $specialty,        // 7
    $username,         // 8
    $email,            // 9
    $hashed_password   // 10
  );
if ($stmt->execute()) {
    echo "Сәтті тіркелдіңіз! <a href='vhod.html'>Кіру</a>";
} else {
    echo "Қате: " . $stmt->error;
}

// Закрываем соединение
$stmt->close();
$conn->close();
?>

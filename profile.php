<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h1>

  <div class="profile">
    <p><strong>Имя:</strong> <?php echo $_SESSION['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>Комната:</strong> <?php echo $_SESSION['room']; ?></p>
    <!-- Добавь сюда другие данные при необходимости -->
  </div>

  <a href="index.html">Выйти</a>
</body>
</html>

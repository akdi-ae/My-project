<?php
session_start();
if (isset($_SESSION['user_name']) && isset($_SESSION['user_surname'])) {
  $name = $_SESSION['user_name'];
  $surname = $_SESSION['user_surname'];
  $initials = strtoupper(mb_substr($name, 0, 1) . mb_substr($surname, 0, 1));
  $fullName = $surname . " " . $name;
} else {
  $initials = "👤";
  
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЖОО жатақханасы</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .features {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .features ul {
            list-style: none;
            padding: 0;
        }
        .features li {
            background: #007BFF;
            color: white;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
        }
        .map-container {
            text-align: center;
            margin-top: 20px;
        }
        .map-container iframe {
            width: 100%;
            max-width: 800px;
            height: 400px;
            border-radius: 10px;
            border: none;
        }
        .btn {
            color: #f8f9fa;
        }
        .profile-button {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 8px;
            color: #333;
            font-size: 16px;
        }

        .profile-initials {
            width: 36px;
            height: 36px;
            background-color: #3498db;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
        }
        
              
    </style>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("profileDropdown");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
      }

      document.addEventListener("click", function(event) {
        const menu = document.getElementById("profileDropdown");
        const button = document.querySelector(".profile-button");
        if (!button.contains(event.target) && !menu.contains(event.target)) {
          menu.style.display = "none";
        }
      });
    </script>
</head>
<link href="favicon.png" rel="shortcut icon" type="image/png" />
<body>
    <header>
        <nav>
            <ul id="profileDropdown" class="menu">
                <li><a href="index.php">Басты бет</a></li>
                <li><a href="dorms.html">Жатақханалар тізімі</a></li>
                <li><a href="conditions.html">Орналасу үшін</a></li>
                <li><a href="https://atu.edu.kz/">Университет парақшасы</a></li>
                <li><a href="news.html">Жаңалықтар</a></li>
                <li><a href="#">Жеке кабинет</a>
                        <ul>
                        <li><a href="profile.php">Жеке кабинет</a></li>
                        <li><a href="settings.html">Баптаулар</a></li>
                        <li><a href="index.html">Шығу</a></li>
                              </ul></li>
        </nav>
        <img src="logo.png" alt="Логотип" class="logo">
    </header>
    <main>
        <section class="dormitory-container">
            <h1>✨ Студенттер үйі</h1>
            <p>Біздің университет жатақханасына қош келдіңіз!<br>Студенттік шақтың ортасында жүр.
            Біздің студенттер үйі тек ұйықтауға арналған орын емес, бұл нағыз
        студенттік отбасы. Бұл жерден жаңа дос, қолдау және сабаққа деген ыңгайлы жағдай
    мен демала аласың.</p>
            <br><br>
            <a href="dorms.html" class="btn">📌 Жатақханаларға шолу</a>
        </section>
        <br>
        <section class="features">
            <h2>🏆 Біздің артықшылықтар:</h2>
            <div class="tabs-container">
                <div class="tab">
                    <h3>✨ Комфортты жағдай</h3>
                    <p>2-ден бастап 4 адамға дейін бірге тұратын, жиһазбен жабдықталған ыңғайлы бөлмелер.</p>
                </div>
                <div class="tab">
                    <h3>Қолайлы</h3>
                    <p>Әр қабатта ас бөлмесі және кір жуу бөлмесімен қамтылған.</p>
                </div>
                <div class="tab">
                    <h3>Қауіпсіздік 24/7</h3>
                    <p>Бейнебақылау жүйесі, кезекші әкімшілік және турникет</p>
                </div>
                <div class="tab">
                    <h3>Тиімді баға</h3>
                    <p>Комфортты жағдайға сай баға</p>
                </div>
                <div class="tab">
                    <h3>Жақсы орта</h3>
                    <p>Мерекелер, кездесулер және белсенді студенттік өмір!</p>
                </div>
            </div>
            <p>📌Дәл қазір өтініш берде, біздің үлкен отбасының бөлшегі бол!</p>
            <a href="registration.html" class="btn btn-register">📢 Қазір өтініш беріңіз!</a>
        </section>
        <section class="map-container">
            <h2>📍 Біздің орналасқан жеріміз(өтініш беру үшін)</h2>
            <iframe src="https://www.google.com/maps/embed?..." allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 АТУ студенттер үйі.</p>
        <p>📞 Байланыс үшін: <a href="tel:+77474561232">+7 747 456 12 32</a></p>
    </footer>
</body>
</html>
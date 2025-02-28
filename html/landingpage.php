<?php
session_start();
include 'db.php';

$query = "SELECT * FROM users;";
$sql = mysqli_query($conn, $query);
$no = 0;
$loggedInUser  = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Industri Kreatif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000;
        }

        header {
            background-color: #000000;
            color: rgb(255, 255, 255);
            padding: 10px 20px;
        }

        .logo img {
            width: 40px;
            height: auto;
            vertical-align: middle; 
            border: #f4f4f4;
        }

        nav {
            background-color: transparent;
            display: flex;
            align-items: center;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            margin: 0; 
            flex-grow: 1; 
        }

        .nav-list li {
            margin: 0 15px;
            color: rgb(255, 255, 255);
        }

        .nav-item {
            text-decoration: none;
            color: rgb(255, 255, 255);
            padding: 10px 15px;
            position: relative; 
        }

        .nav-item:hover {
            color: #ffbd3a; 
        }

        .nav-item:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: #ffbd3a;
            transition: width 0.3s;
        }

        .nav-item:hover:after {
            width: 100%;
        }

        .nav-item:active:after {
            width: 100%;
        }

        .cta-button {
            background-color: #000000;
            color: #fff; 
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none; 
            transition: background 0.5s ease;
            border: 2px solid #b7980f;
        }

        .cta-button:hover {
            background-color: #b7980f;
            color: black; 
        }


        .hero {
            height: 50vh;
            color: #fcf9f9;
            padding: 100px 10px;
            text-align: center;
            background: #e9ecef;
            animation: fadeIn 1.5s ease-in-out;
            background-image: url(banner\ \ \(1\).png);
            background-size: cover; 
            background-position: center 20%; 
            margin-top: 0px;
            border-radius: 15px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
        }

        .hero h1 {
            font-size: 3em;
            margin: 0;
        }

        .hero p {
            font-size: 1.5em;
        }

        .services {
            padding: 40px 20px;
            text-align: center;
            position: relative;
        }

        .services h1 {
            margin-bottom: 20px;
            position: relative;
            text-size-adjust: 50px;
        }

        .service-item {
            background: #1A1A1A;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: calc(33% - 200px); 
        }

        .service-item:hover {
            background-color: #ffbd3a;
        }

        .service-item h3 {
            margin-top: 0;
            color: #f4f4f4;
        }

        footer {
            background-color: #1A1A1A; 
            color: #f4f4f4; 
            padding: 20px 0; 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start;
            height: auto; 
        }

        .social-media {
            flex: 1; 
            text-align: left; 
            margin-left: 20px;
        }

        .social-media h3 {
            margin-bottom: 10px;
        }

        .social-media a {
            color: #f4f4f4; 
            text-decoration: none;
            display: flex; 
            align-items: center; 
            margin-bottom: 10px; 
        }

        .social-media img {
            width: 40px; 
            height: auto; 
            margin-right: 10px; 
        }

        .contact-info {
            flex: 1; 
            text-align: justify; 
            margin-right: 20px;
        }

        .contact-info h3 {
            margin-bottom: 10px;
        }

        .contact-info a {
            color: #ffbd69; 
            text-decoration: none;
        }  
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            
            <img src="logo ukl 3 (1).png" alt="logo">
        </div>
        <ul class="nav-list">
            <li><a href="landingpage.html" class="nav-item">Home</a></li>
            <li><a href="about.html" class="nav-item">About</a></li>
            <li><a href="adukasi.html" class="nav-item">Edukasi</a></li>
            <li><a href="tokoh.html" class="nav-item">Tokoh</a></li>
        </ul>
        <?php if ($loggedInUser): ?>
            <a href="/ukl_fawwaz/login/dasbord.php" class="cta-button"><?php echo htmlspecialchars($loggedInUser); ?></a>
        <?php else: ?>
            <a href="/ukl_fawwaz/html/login.php" id="loginButton" class="cta-button">Login</a>
        <?php endif; ?>
    </nav>
</header>
    <br>
    <section class="hero">
        <h1 style="color: #f4f4f4;">Selamat Datang di EcoCreasi</h1>
        <p style="color: #f4f4f4;">Temukan inspirasi di dunia Ekonomi dan Industri Kreatif</p>
    </section>

    <section class="services">
        <h1 style="color: #f4f4f4; text-size-adjust: 50px;">Service</h1>
        <div class="service-item">
            <img src="3.png" alt="">
            <h3>Edukasi</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
        <div class="service-item">
            <img src="1.png" alt="">
            <h3>Materi</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
        <div class="service-item">
            <img src="2.png" alt="">
            <h3>Tokoh Inspiratif</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
    </section>

    <footer>
        <div class="social-media">
            <h3>Ikuti Kami di Media Sosial</h3>
            <a href="https://www.tiktok.com">
                <img src="logo tiktok.png" alt="Tiktok Logo"> Tiktok
            </a>
            <a href="https://www.instagram.com/pawassxac/profilecard/?igsh=dmY5ZWh3dHM0NnR3">
                <img src="logo ig.png" alt="Instagram Logo" style="width: 40px;"> Instagram
            </a>
            <a href="https://www.twitter.com">
                <img src="logo x.png" alt="Twitter Logo"> Twitter
            </a>
            <a href="https://www.facebook.com">
                <img src="logo fb.png" alt="Facebook Logo"> Facebook
            </a>
        </div>
        <div class="contact-info">
            <h3>Kontak Pribadi</h3>
            <p>Email: <a href="mailto:fawwazsetiawan02@gmail.com">fawwazsetiawan02@gmail.com</a></p>
            <p>Telepon: <a href="tel:+6285731593391">+62 857-3159-3391</a></p>
        </div>
    </footer>
</body>
</html>
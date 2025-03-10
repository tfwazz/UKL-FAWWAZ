<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #000000;
        }
        header {
            background-color: #000000;
            color: rgb(0, 0, 0);
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

        li {
            margin: 0 15px;
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
        
        .crud-button {
            background-color: #ffbd3a;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.5s ease;
            margin-left: 10px;
        }
        .crud-button:hover {
            background-color:rgb(0, 0, 0);
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: transparent; 
            border: 2px solid #ffbd3a; 
            border-radius: 5px;
        }
        td {
            padding: 20px;
            vertical-align: top;
            border: none; 
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
        img {
            max-width: 100%; 
            height: auto;
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

    <header>
    <nav>
        <div class="logo">
            
            <img src="logo ukl 3 (1).png" alt="logo">
        </div>
        <ul class="nav-list">
            <li><a href="landingpage.php" class="nav-item">Home</a></li>
            <li><a href="about.php" class="nav-item">About</a></li>
            <li><a href="edukasi.php" class="nav-item">Edukasi</a></li>
            <li><a href="tokoh.php" class="nav-item">Tokoh</a></li>
        </ul>
        <?php if ($loggedInUser): ?>
            <a href="/ukl_fawwaz/html/dashboard.php" class="cta-button"><?php echo htmlspecialchars($loggedInUser); ?></a>
            <a href="/ukl_fawwaz/html/user.php" class="crud-button">Profile</a>
        <?php else: ?>
            <a href="/ukl_fawwaz/html/login.php" id="loginButton" class="cta-button">Login</a>
        <?php endif; ?>
    </nav>
    </header>
    <br>
        <br>
    <br>
    <table>
        <tr>
            <td style="width: 20%; text-align: center;"> 
                <h2>Logo Website</h2>
                <img src="logo ukl 3 (1).png" alt="Logo Website">
            </td>
            <td style="width: 80%;">
                <h2 style="color: white;">Tentang Website Ini</h2>
                <p style="color: white;">Website ini dirancang untuk memberikan edukasi bagi pemula di bidang ekonomi dan industri kreatif. Di dalamnya, pengunjung dapat menemukan berbagai materi pembelajaran yang relevan, termasuk artikel dan panduan tentang kewirausahaan, serta profil tokoh sukses yang menginspirasi.</p>

                <p style="color: white;">Pengguna dapat menjelajahi berbagai topik yang mencakup:</p>
                
                <ul style="color: white;">
                    <li><strong>Edukasi Ekonomi:</strong>
                        <ul>
                            <li>Artikel dan video yang menjelaskan konsep dasar ekonomi, termasuk teori permintaan dan penawaran, inflasi, dan kebijakan moneter.</li>
                            <li>Panduan praktis untuk memulai bisnis, termasuk langkah-langkah untuk merencanakan dan mengelola usaha.</li>
                        </ul>
                    </li>
                    <li><strong>Industri Kreatif:</strong>
                        <ul>
                            <li>Materi tentang berbagai sektor industri kreatif, seperti desain grafis, seni, musik, dan film.</li>
                            <li>Tips dan trik untuk mengembangkan keterampilan kreatif dan memasarkan produk atau jasa.</li>
                        </ul>
                    </li>
                    <li><strong>Profil Tokoh Sukses:</strong>
                        <ul>
                            <li>Cerita inspiratif dari individu yang telah berhasil di bidang ekonomi dan industri kreatif.</li>
                            <li>Wawancara dan studi kasus yang menunjukkan perjalanan karir mereka, tantangan yang dihadapi, dan strategi yang digunakan untuk mencapai kesuksesan.</li>
                        </ul>
                    </li>
                </ul>

                <p style="color: white;">Website ini bertujuan untuk menjadi sumber daya yang berguna bagi siapa saja yang ingin belajar dan berkembang dalam bidang ekonomi dan industri kreatif, serta memberikan motivasi melalui kisah sukses tokoh-tokoh yang telah berpengalaman.</p>
            </td>
        </tr>
    </table>
    <br>
        <br>
    <br>
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
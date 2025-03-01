<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Ekonomi dan Industri Kreatif</title>
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

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        main {
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            border: 2px;
            border-color: #ffbd3a;
        }

        .column {
            flex: 1;
            margin: 0 10px;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid;
        }

        h2 {
            color: #ffffff;
        }

        ol {
            padding-left: 20px;
        }

        .edu-list li {
            margin: 10px 0;
            color: #ffffff; 
            background-color: rgba(0, 0, 0, 0.1); 
            border: 1px solid #ffbd3a; 
            border-radius: 5px; 
            padding: 10px; 
        }

        .video-container {
            margin: 20px 0;
            text-align: center; 
        }

        .video-container iframe {
            width: 100%;
            height: 400px; 
            border: none;
            border-radius: 5px; 
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
            <li><a href="adukasi.php" class="nav-item">Edukasi</a></li>
            <li><a href="tokoh.php" class="nav-item">Tokoh</a></li>
        </ul>
        <?php if ($loggedInUser): ?>
            <a href="/ukl_fawwaz/html/dashboard.php" class="cta-button"><?php echo htmlspecialchars($loggedInUser); ?></a>
            <a href="/ukl_fawwaz/html/user.php" class="crud-button">CRUD</a>
        <?php else: ?>
            <a href="/ukl_fawwaz/html/login.php" id="loginButton" class="cta-button">Login</a>
        <?php endif; ?>
    </nav>
    </header>

    <main>
        <div class="container" style="border: 2px;">
            <div class="column" id="ekonomi">
                <h2>Edukasi tentang Ekonomi</h2>
                <ol class="edu-list">
                    <li style="color: #ffffff;">Pahami Konsep Dasar Ekonomi: Mulailah dengan mempelajari konsep-konsep dasar ekonomi seperti permintaan dan penawaran, inflasi, dan kebijakan moneter. Buku teks ekonomi dasar bisa menjadi referensi yang baik.</li>
                    <li style="color: #ffffff;">Sumber Belajar: Buku dan Literatur: Bacalah buku-buku yang membahas teori ekonomi dan aplikasinya dalam kehidupan sehari-hari. Beberapa buku klasik seperti "The Wealth of Nations" oleh Adam Smith atau "Capital in the Twenty-First Century" oleh Thomas Piketty bisa menjadi titik awal yang baik. <br><br>
                        Podcast dan Berita: Dengarkan podcast yang membahas isu-isu ekonomi terkini dan baca artikel berita untuk tetap up-to-date dengan perkembangan terbaru dalam dunia ekonomi.
                    </li>
                    <li style="color: #ffffff;">Kursus Online: Banyak platform seperti Coursera, edX, dan Khan Academy menawarkan kursus gratis atau berbayar tentang ekonomi. Ini bisa membantu Anda memahami konsep-konsep dengan lebih mendalam.</li>
                    <li style="color: #ffffff;">Analisis Kasus Nyata: Pelajari bagaimana teori ekonomi diterapkan dalam kasus nyata. Analisis kebijakan ekonomi suatu negara atau dampak krisis ekonomi dapat memberikan wawasan yang lebih baik.</li>
                </ol>
            </div>

            <div class="column" id="industri-kreatif">
                <h2>Edukasi</h2> tentang Industri Kreatif</h2>
                <ol class="edu-list">
                    <li style="color: #ffffff;">Pahami Sektor Industri Kreatif: Industri kreatif mencakup berbagai sektor seperti seni, desain, musik, film, dan periklanan.</li>
                    <li style="color: #ffffff;">Kembangkan Keterampilan Kreatif: Belajar menggunakan perangkat lunak desain atau mengikuti kelas seni untuk mengembangkan keterampilan Anda.</li>
                    <li style="color: #ffffff;">Networking dan Komunitas: Bergabunglah dengan organisasi seni lokal dan hadiri acara komunitas untuk terhubung dengan orang-orang di industri kreatif.</li>
                    <li style="color: #ffffff;">Platform Online: Manfaatkan platform seperti Instagram dan Etsy untuk memamerkan karya Anda dan menjangkau audiens yang lebih luas.</li>
                    <li style="color: #ffffff;">Dukungan Pemerintah dan Organisasi Nonprofit: Cari tahu tentang hibah dan dukungan yang tersedia untuk seniman dan pengusaha kreatif.</li>
                    <li style="color: #ffffff;">Kursus dan Pelatihan: Ikuti kursus atau pelatihan yang berfokus pada keterampilan kreatif, seperti pemasaran digital atau manajemen seni.</li>
                </ol>
            </div>
        </div>

        <div class="video-container">
            <h2>Video Edukasi</h2>
            <iframe src="https://youtube.com/playlist?list=PLQIfdzOCCNS-E4RSx2hKpV9gxYHv-Cx9i&si=dPx7zj3o_BS31MuD" 
                    title="Video Edukasi" 
                    allowfullscreen>
            </iframe>
        
        </div>
        </section>
    </main>

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
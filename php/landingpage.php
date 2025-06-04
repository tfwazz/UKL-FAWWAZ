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
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <link rel="stylesheet" href="styles2.css">
    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">
            
            <img src="/ukl_fawwaz/image/logo ukl 3 (1).png" alt="logo">
        </div>
        <ul class="nav-list">
            <li><a href="landingpage.php" class="nav-item">Home</a></li>
            <li><a href="about.php" class="nav-item">About</a></li>
            <li><a href="edukasi.php" class="nav-item">Edukasi</a></li>
            <li><a href="tokoh.php" class="nav-item">Tokoh</a></li>
            <li><a href="reviewuser.php" class="nav-item">Review</a></li>
        </ul>
        <?php if ($loggedInUser): ?>
            <a href="/ukl_fawwaz/php/dashboard.php" class="cta-button"><?php echo htmlspecialchars($loggedInUser); ?></a>
            <a href="/ukl_fawwaz/php/user.php" class="crud-button">Profile</a>
        <?php else: ?>
            <a href="/ukl_fawwaz/php/login.php" id="loginButton" class="cta-button">Login</a>
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
        <div class="service-item" href="edukasi.php">
            <img src="/ukl_fawwaz/image/3.png" alt="">
            <h3>Edukasi</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
        <div class="service-item" href="edukasi.php">
            <img src="/ukl_fawwaz/image/1.png" alt="">
            <h3>Materi</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
        <div class="service-item" href="tokoh.php">
            <img src="/ukl_fawwaz/image/2.png" alt="">
            <h3>Tokoh Inspiratif</h3>
            <h3 style="color: #ffbd69;">____</h3>
        </div>
    </section>
    <br>

    <section class="info-section">
    <div class="info-container">
        <div class="info-image">
            <img src="/ukl_fawwaz/image/Loremipsum (3).png" alt="Gambar Ilustrasi">
        </div>
        <div class="info-text">
            <h2>Apa itu Ekonomi?</h2>
<p>
                Ekonomi adalah ilmu yang mempelajari bagaimana manusia mengelola sumber daya yang terbatas untuk memenuhi kebutuhan yang tidak terbatas. 
                Dalam konteks kehidupan sehari-hari, ekonomi membantu individu dan masyarakat mengambil keputusan terbaik dalam mengalokasikan uang, waktu, dan tenaga.
                <br><br>
                Ilmu ekonomi dibagi menjadi dua cabang utama: mikroekonomi, yang fokus pada perilaku individu dan perusahaan; serta makroekonomi, yang menganalisis aktivitas ekonomi secara keseluruhan seperti inflasi, pengangguran, dan pertumbuhan ekonomi.
                <br><br>
                Pemahaman dasar tentang ekonomi sangat penting dalam membangun pola pikir kritis terhadap isu-isu sosial dan kebijakan publik, serta mendukung pengambilan keputusan yang bijak dalam kehidupan pribadi maupun profesional.
            </p>

        </div>
    </div>
    <section class="info-section">
    <div class="info-container reverse">
        <div class="info-text">
            <h2>Industri Kreatif</h2>
            <p>
                Industri kreatif adalah sektor ekonomi yang berfokus pada penciptaan, produksi, dan distribusi barang dan jasa yang berasal dari ide, kreativitas, dan bakat individu. Industri ini mencakup berbagai bidang seperti seni, musik, desain, film, periklanan, mode, arsitektur, hingga pengembangan perangkat lunak dan konten digital.
                <br><br>
                Keunggulan utama industri kreatif terletak pada inovasi dan nilai tambah yang dihasilkan dari proses berpikir kreatif.

Industri kreatif berperan penting dalam mendorong pertumbuhan ekonomi, menciptakan lapangan kerja, serta meningkatkan citra budaya suatu bangsa.
                <br><br>
Dengan dukungan teknologi dan internet, pelaku industri kreatif dapat menjangkau pasar yang lebih luas dan memanfaatkan berbagai platform digital untuk mempromosikan karya mereka. Oleh karena itu, industri kreatif dianggap sebagai motor penggerak ekonomi baru yang berbasis pada pengetahuan dan kreativitas manusia.
            </p>
        </div>
        <div class="info-image">
            <img src="/ukl_fawwaz/image/Loremipsum (4).png" alt="Gambar Edukasi Ekonomi">
        </div>
    </div>
</section>

</section>

    <footer>
        <div class="social-media">
            <h3>Ikuti Kami di Media Sosial</h3>
            <a href="https://www.tiktok.com">
                <img src="/ukl_fawwaz/image/logo tiktok.png" alt="Tiktok Logo"> Tiktok
            </a>
            <a href="https://www.instagram.com/pawassxac/profilecard/?igsh=dmY5ZWh3dHM0NnR3">
                <img src="/ukl_fawwaz/image/logo ig.png" alt="Instagram Logo" style="width: 40px;"> Instagram
            </a>
            <a href="https://www.twitter.com">
                <img src="/ukl_fawwaz/image/logo x.png" alt="Twitter Logo"> Twitter
            </a>
            <a href="https://www.facebook.com">
                <img src="/ukl_fawwaz/image/logo fb.png" alt="Facebook Logo"> Facebook
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
<?php
session_start();
include 'db.php';

$query = "SELECT * FROM users;";
$sql = mysqli_query($conn, $query);
$no = 0;
$loggedInUser = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;

if (isset($_GET['skip-popup'])) {
    $_SESSION['skipPopup'] = true;
    header("Location: landingpage.php");
    exit();
}

$showPopup = !$loggedInUser && !isset($_SESSION['skipPopup']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Landing Page - Industri Kreatif</title>
  <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png"/>
  <link rel="stylesheet" href="style2.css"/>
  <style>
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(5px);
    background: rgba(0, 0, 0, 0.4);
    z-index: 1000;
  }
  .popup-notif {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    border-radius: 12px;
    padding: 30px 40px;
    max-width: 400px;
    width: 90%;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    text-align: center;
    z-index: 1001;
    animation: fadeIn 0.3s ease-in-out;
  }
  .popup-notif h3 {
    margin: 0;
    font-size: 22px;
    color: #333;
  }
  .popup-notif p {
    margin: 15px 0;
    color: #666;
  }
  .popup-notif .button {
    display: inline-block;
    margin: 5px;
    padding: 10px 20px;
    background-color: #ffbd3a;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background 0.3s ease;
  }
  .popup-notif .button:hover {
    background-color:rgb(0, 0, 0);
  }
  .popup-notif .button-secondary {
    background-color: #ccc;
    color: #333;
  }
  .popup-notif .button-secondary:hover {
    background-color: #bbb;
  }
</style>
</head>
<body>

<?php if ($showPopup): ?>
  <div class="popup-overlay"></div>
  <div class="popup-notif">
    <h3>🔐 Sudah punya akun?</h3>
    <p>Silakan login terlebih dahulu untuk mengakses semua fitur!</p>
    <div style="margin-top: 20px;">
      <a href="/ukl_fawwaz/php/login.php" class="button">Login Sekarang</a>
      <a href="?skip-popup=true" class="button button-secondary">Tidak, Teruskan</a>
    </div>
  </div>
<?php endif; ?>

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

<!-- Konten utama -->
<section class="hero">
    <h1 style="color: #f4f4f4;">Selamat Datang di EcoCreasi</h1>
    <p style="color: #f4f4f4;">Temukan inspirasi di dunia Ekonomi dan Industri Kreatif</p>
</section>

<section class="services">
    <h1 style="color: #f4f4f4;">Service</h1>
    <div class="service-item">
        <img src="/ukl_fawwaz/image/3.png" alt="">
        <h3>Edukasi</h3>
        <h3 style="color: #ffbd69;">____</h3>
    </div>
    <div class="service-item">
        <img src="/ukl_fawwaz/image/1.png" alt="">
        <h3>Materi</h3>
        <h3 style="color: #ffbd69;">____</h3>
    </div>
    <div class="service-item">
        <img src="/ukl_fawwaz/image/2.png" alt="">
        <h3>Tokoh Inspiratif</h3>
        <h3 style="color: #ffbd69;">____</h3>
    </div>
</section>

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
</section>

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

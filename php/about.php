<?php
session_start();
include 'db.php';

$loggedInUser  = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;
?>
<!DOCTYPE html>
<html lang="id">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <link rel="stylesheet" href="style2.css">
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
        <br>
    <br>
    <table>
        <tr>
            <td style="width: 20%; text-align: center;"> 
                <h2>Logo Website</h2>
                <img src="/ukl_fawwaz/image/logo ukl 3 (1).png" alt="Logo Website">
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
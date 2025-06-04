<?php
session_start();
include 'db.php';

$loggedInUser = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;

$query_mysql = mysqli_query($conn, "
SELECT m.*, s.id_sumber, s.nama_sumber, s.url_sumber, s.tipe_subjek
FROM materi m
LEFT JOIN sumber_belajar_tambahan s ON m.id_materi = s.id_materi
ORDER BY m.id_materi ASC
") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Edukasi - EcoCreasi</title>
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="/ukl_fawwaz/image/logo ukl 3 (1).png" alt="Logo EcoCreasi">
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
                <a href="/ukl_fawwaz/php/login.php" class="cta-button">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="hero">
        <h1>Selamat Datang di EcoCreasi</h1>
        <p>Temukan inspirasi di dunia Ekonomi dan Industri Kreatif</p>
    </section>

    <br>
    <h1 style="text-align: center; color: #f4f4f4">Materi</h1>
    <div class="package-content">
        <?php
        $current_id = null;
        while ($data = mysqli_fetch_array($query_mysql)) :
            if ($current_id !== $data['id_materi']) {
                if ($current_id !== null) echo '</ul></div>';
                $current_id = $data['id_materi'];
        ?>
            <div class="box" style="background-color: #1A1A1A; margin-bottom: 40px; border-radius: 12px; padding: 20px;">
                <h2 style="color: #ffffff;"><?php echo htmlspecialchars($data['materi']); ?></h2>
                <p style="color: #cccccc;"><?php echo nl2br(htmlspecialchars($data['konten_materi'])); ?></p>
                <a href="materi.php?id=<?php echo urlencode($data['id_materi']); ?>" class="btn-detail" style="background-color: #ffbd3a; color: black; padding: 8px 16px; border-radius: 6px; display: inline-block; margin-top: 10px;">Lihat Detail</a>

                <?php if (!empty($data['nama_sumber'])): ?>
                 <h3 style="margin-top: 20px; color: #ffbd3a;">📚 Sumber Belajar Tambahan:</h3>
                <?php endif; ?>
                <ul style="list-style: none; padding-left: 0;">
        <?php } ?>
            <?php if (!empty($data['nama_sumber'])): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($data['url_sumber']); ?>" target="_blank" style="color: #4da6ff; text-decoration: none;">
                        <?php echo htmlspecialchars($data['nama_sumber']); ?>
                    </a>
                    <span style="color: #888;">(<?php echo htmlspecialchars($data['tipe_subjek']); ?>)</span>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php if ($current_id !== null) echo '</ul></div>'; ?>
    </div>

    <br><br><br>

    <footer>
        <div class="social-media">
            <h3>Ikuti Kami di Media Sosial</h3>
            <a href="https://www.tiktok.com"><img src="/ukl_fawwaz/image/logo tiktok.png" alt="Tiktok Logo"> Tiktok</a>
            <a href="https://www.instagram.com/pawassxac/profilecard/?igsh=dmY5ZWh3dHM0NnR3">
                <img src="/ukl_fawwaz/image/logo ig.png" alt="Instagram Logo"> Instagram
            </a>
            <a href="https://www.twitter.com"><img src="/ukl_fawwaz/image/logo x.png" alt="Twitter Logo"> Twitter</a>
            <a href="https://www.facebook.com"><img src="/ukl_fawwaz/image/logo fb.png" alt="Facebook Logo"> Facebook</a>
        </div>
        <div class="contact-info">
            <h3>Kontak Pribadi</h3>
            <p>Email: <a href="mailto:fawwazsetiawan02@gmail.com">fawwazsetiawan02@gmail.com</a></p>
            <p>Telepon: <a href="tel:+6285731593391">+62 857-3159-3391</a></p>
        </div>
    </footer>
</body>
</html>

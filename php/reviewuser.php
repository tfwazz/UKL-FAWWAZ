<?php
session_start();
include 'db.php';

$loggedInUser  = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = intval($_POST['rating']);
    $tanggal = date("Y-m-d");

    $query = "INSERT INTO review (nama_pengguna, komentar, rating) VALUES ('$nama', '$komentar', '$rating')";
    mysqli_query($conn, $query);
}

$query = "SELECT * FROM review";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Review Pengguna</title>
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <link rel="stylesheet" href="styles2.css">
    <style>
        .form-review input,
        .form-review textarea,
        .form-review select,
        .form-review button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .review-box {
            background: #1e1e1e;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .review-box h3 {
            margin: 0;
            color: #f4f4f4;
        }
        .review-box p {
            color: #ccc;
        }
        .review-box small {
            color: #888;
        }
        .rating-stars {
            color: gold;
            font-size: 20px;
        }
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

<section class="hero">
    <h1 style="color: #f4f4f4;">Review Pengguna</h1>
    <p style="color: #f4f4f4;">Lihat dan berikan pendapat Anda tentang platform kami</p>
</section>

<section class="info-section">
    <div class="info-container">
        <div class="info-text">
            <h2>Tulis Review Anda</h2>
            <form method="POST" action="" class="form-review">
                <input type="text" name="nama" placeholder="Nama Anda" required>
                <textarea name="komentar" placeholder="Tulis komentar Anda..." rows="4" required></textarea>
                <select name="rating" required>
                    <option value="">Pilih Rating</option>
                    <option value="1">1 - Sangat Buruk</option>
                    <option value="2">2 - Buruk</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Bagus</option>
                    <option value="5">5 - Sangat Bagus</option>
                </select>
                <button type="submit" name="submit_review" class="cta-button">Kirim Review</button>
            </form>
        </div>
        <div class="info-image">
            <img src="/ukl_fawwaz/image/Loremipsum (4).png" alt="Review Illustration">
        </div>
    </div>
</section>

<section class="info-section">
    <div class="info-container">
        <div class="info-text">
            <h2>Ulasan dari Pengguna</h2>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="review-box">
                    <h3><?php echo htmlspecialchars($row['nama_pengguna']); ?></h3>
                    <div class="rating-stars">
                        <?php echo str_repeat('★', intval($row['rating'])) . str_repeat('☆', 5 - intval($row['rating'])); ?>
                    </div>
                    <p><?php echo nl2br(htmlspecialchars($row['komentar'])); ?></p>
                </div>
                <hr>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<footer>
    <div class="social-media">
        <h3>Ikuti Kami di Media Sosial</h3>
        <a href="https://www.tiktok.com"><img src="/ukl_fawwaz/image/logo tiktok.png" alt="Tiktok Logo"> Tiktok</a>
        <a href="https://www.instagram.com/pawassxac/profilecard/?igsh=dmY5ZWh3dHM0NnR3"><img src="/ukl_fawwaz/image/logo ig.png" alt="Instagram Logo"> Instagram</a>
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

<?php
session_start();
include 'db.php';

$loggedInUser  = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : null;

$query = "SELECT * FROM tokohh";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Tokoh Kreatif</title>
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

      <h1 style="text-align:center; color: #ffffff">Tokoh Kreatif</h1>

     <div class="container">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="profile">
            <img src="uploads/<?php echo htmlspecialchars($row['gambar_tokoh']); ?>" alt="<?php echo htmlspecialchars($row['nama_tokoh']); ?>">
            <div>
                <h2><?php echo htmlspecialchars($row['nama_tokoh']); ?></h2>
                <p><strong>Karya:</strong> <?php echo htmlspecialchars($row['karya_tokoh']); ?></p>
                <p><?php echo nl2br(htmlspecialchars($row['deskripsi_tokoh'])); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>

        
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
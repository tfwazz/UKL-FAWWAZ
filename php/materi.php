<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = mysqli_query($conn, "SELECT * FROM materi WHERE id_materi = $id") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Materi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Materi - EcoCreasi</title>
        <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <link rel="stylesheet" href="styles2.css">
</head>
<body>


    <main class="materi-detail-container">
        <h1><?php echo htmlspecialchars($data['materi']); ?></h1>

        <section class="materi-konten">
            <h3>Konten:</h3>
            <p><?php echo nl2br(htmlspecialchars($data['materi'])); ?></p>
        </section>

        <section class="materi-deskripsi">
            <h3>Deskripsi Video:</h3>
            <p><?php echo nl2br(htmlspecialchars($data['deskripsi_video'])); ?></p>
        </section>

        <section class="materi-video">
            <h3>Video:</h3>
                <iframe width="560" height="315" src="<?php echo htmlspecialchars($data['video_pembelajaran']); ?>" 
                        title="Video Materi" frameborder="0" allowfullscreen></iframe>
        </section>

        <a href="edukasi.php" class="btn-kembali">← Kembali ke Edukasi</a>
    </main>

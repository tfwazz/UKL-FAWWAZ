<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedInUser']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $materi = mysqli_real_escape_string($conn, $_POST['materi']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten_materi']);
    $video = mysqli_real_escape_string($conn, $_POST['video_pembelajaran']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_video']);

    $query = "INSERT INTO materi (materi, konten_materi, video_pembelajaran, deskripsi_video)
              VALUES ('$materi', '$konten', '$video', '$deskripsi')";
    mysqli_query($conn, $query);
    header("Location: tabelmateri.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int) $_POST['id_materi'];
    $materi = mysqli_real_escape_string($conn, $_POST['materi']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten_materi']);
    $video = mysqli_real_escape_string($conn, $_POST['video_pembelajaran']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_video']);

    $query = "UPDATE materi SET materi='$materi', konten_materi='$konten',
              video_pembelajaran='$video', deskripsi_video='$deskripsi'
              WHERE id_materi=$id";
    mysqli_query($conn, $query);
    header("Location: tabelmateri.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = (int) $_POST['id_materi'];
    $query = "DELETE FROM materi WHERE id_materi=$id";
    mysqli_query($conn, $query);
    header("Location: tabelmateri.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM materi");

$editData = null;
if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editResult = mysqli_query($conn, "SELECT * FROM materi WHERE id_materi=$editId");
    $editData = mysqli_fetch_assoc($editResult);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Materi</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        h2, h3 {
            margin-top: 0;
            color: #333;
        }
        .dropdown {
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .dropbtn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        .dropdown {
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .dropbtn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #ffffff;
            min-width: 160px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            vertical-align: top;
            text-align: left;
        }
        table th {
            background-color: #f8f8f8;
        }
        .form-section {
            margin-top: 30px;
        }
        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #bbb;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn {
            display: inline-block;
            padding: 7px 15px;
            margin-top: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            border: none;
        }
        .btn-create {
            background-color: #28a745;
            color: white;
        }
        .btn-edit {
            background-color: #f0ad4e;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .logout-button {
            display: inline-block;
            background: #333;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        img.thumb {
            max-width: 120px;
            max-height: 90px;
            display: block;
            margin-top: 6px;
            border-radius: 5px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="dropdown">
        <button class="dropdown-button">⋮</button>
        <div class="dropdown-content">
            <a href="admin.php">Kelola User</a>
            <a href="tabelmateri.php">Materi</a>
            <a href="tabeltokoh.php">Kelola Tokoh</a>
            <a href="reviewcrud.php">Review</a>
            <a href="sumbercrud.php">Sumber</a>
        </div>
    </div>

    <h2>Manajemen Materi Pembelajaran</h2>

    <div class="form-section">
        <h3><?= $editData ? "Edit Materi" : "Tambah Materi Baru" ?></h3>
        <form method="POST">
            <?php if ($editData): ?>
                <input type="hidden" name="id_materi" value="<?= $editData['id_materi'] ?>">
            <?php endif; ?>
            <label>Judul Materi:</label>
            <input type="text" name="materi" value="<?= $editData['materi'] ?? '' ?>" required>

            <label>Konten Materi:</label>
            <textarea name="konten_materi" required><?= $editData['konten_materi'] ?? '' ?></textarea>

            <label>URL Video Pembelajaran:</label>
            <input type="text" name="video_pembelajaran" value="<?= $editData['video_pembelajaran'] ?? '' ?>">

            <label>Deskripsi Video:</label>
            <textarea name="deskripsi_video"><?= $editData['deskripsi_video'] ?? '' ?></textarea>

            <br>
            <button type="submit" name="<?= $editData ? 'update' : 'create' ?>" class="btn btn-create">
                <?= $editData ? 'Perbarui Materi' : 'Tambah Materi' ?>
            </button>
            <?php if ($editData): ?>
                <a href="crud_materi.php" style="margin-left: 10px;">Batal</a>
            <?php endif; ?>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Materi</th>
            <th>Konten</th>
            <th>Video</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['id_materi']) ?></td>
                <td><?= htmlspecialchars($row['materi']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['konten_materi'])) ?></td>
                <td><?= htmlspecialchars($row['video_pembelajaran']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['deskripsi_video'])) ?></td>
                <td>
                    <a href="?edit=<?= $row['id_materi'] ?>" class="btn btn-edit">Edit</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id_materi" value="<?= $row['id_materi'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php" class="logout-button">Logout</a>
    <a href="landingpage.php" class="logout-button" style="background-color: #ffbd3a; color: black; margin-left: 10px;">Beranda</a>
</div>
</body>
</html>

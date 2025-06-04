<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedInUser']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: login.php");
    exit();
}

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

function uploadGambar($fileInputName, $uploadDir) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        $fileName = basename($_FILES[$fileInputName]['name']);
        $fileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $fileName);
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            return $fileName;
        }
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_tokoh']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_tokoh']);
    $karya = mysqli_real_escape_string($conn, $_POST['karya_tokoh']);
    $gambarFile = uploadGambar('gambar_tokoh', $uploadDir);

    $query = "INSERT INTO tokohh (nama_tokoh, deskripsi_tokoh, gambar_tokoh, karya_tokoh) 
              VALUES ('$nama', '$deskripsi', '" . ($gambarFile ? $gambarFile : '') . "', '$karya')";
    mysqli_query($conn, $query);
    header("Location: tabeltokoh.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int) $_POST['id_tokoh'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama_tokoh']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_tokoh']);
    $karya = mysqli_real_escape_string($conn, $_POST['karya_tokoh']);

    $oldGambar = '';
    $res = mysqli_query($conn, "SELECT gambar_tokoh FROM tokohh WHERE id_tokoh=$id");
    if ($res && $row = mysqli_fetch_assoc($res)) {
        $oldGambar = $row['gambar_tokoh'];
    }

    $newGambarFile = uploadGambar('gambar_tokoh', $uploadDir);
    $gambarToSave = $newGambarFile ? $newGambarFile : $oldGambar;
    if ($newGambarFile && $oldGambar && file_exists($uploadDir . $oldGambar)) {
        unlink($uploadDir . $oldGambar);
    }

    $query = "UPDATE tokohh SET 
                nama_tokoh='$nama',
                deskripsi_tokoh='$deskripsi', 
                gambar_tokoh='$gambarToSave', 
                karya_tokoh='$karya' 
              WHERE id_tokoh=$id";
    mysqli_query($conn, $query);
    header("Location: tabeltokoh.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = (int) $_POST['id_tokoh'];

    $res = mysqli_query($conn, "SELECT gambar_tokoh FROM tokohh WHERE id_tokoh=$id");
    if ($res && $row = mysqli_fetch_assoc($res)) {
        $oldGambar = $row['gambar_tokoh'];
        if ($oldGambar && file_exists($uploadDir . $oldGambar)) {
            unlink($uploadDir . $oldGambar);
        }
    }

    mysqli_query($conn, "DELETE FROM tokohh WHERE id_tokoh=$id");
    header("Location: tabeltokoh.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM tokohh");

$editData = null;
if (isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $editResult = mysqli_query($conn, "SELECT * FROM tokohh WHERE id_tokoh=$editId");
    $editData = mysqli_fetch_assoc($editResult);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Tokoh</title>
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
        .logout {
            margin-top: 25px;
            display: inline-block;
            background: #333;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
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
        <button class="dropbtn">⋮</button>
        <div class="dropdown-content">
            <a href="admin.php">Kelola User</a>
            <a href="tabelmateri.php">Materi</a>
            <a href="tabeltokoh.php">Kelola Tokoh</a>
            <a href="reviewcrud.php">Review</a>
            <a href="sumbercrud.php">Sumber</a>
        </div>
    </div>
    <h2><?= $editData ? "Edit Tokoh" : "Tambah Tokoh Baru" ?></h2>
    <form method="POST" enctype="multipart/form-data">
        <?php if ($editData): ?>
            <input type="hidden" name="id_tokoh" value="<?= $editData['id_tokoh'] ?>">
        <?php endif; ?>
        <label>Nama Tokoh:</label>
        <input type="text" name="nama_tokoh" required value="<?= $editData['nama_tokoh'] ?? '' ?>">

        <label>Deskripsi Tokoh:</label>
        <textarea name="deskripsi_tokoh" required><?= $editData['deskripsi_tokoh'] ?? '' ?></textarea>

        <label>Gambar Tokoh:</label>
        <?php if ($editData && $editData['gambar_tokoh']): ?>
            <img src="uploads/<?= htmlspecialchars($editData['gambar_tokoh']) ?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="gambar_tokoh" accept="image/*">

        <label>Karya Tokoh:</label>
        <textarea name="karya_tokoh" required><?= $editData['karya_tokoh'] ?? '' ?></textarea>

        <button type="submit" name="<?= $editData ? 'update' : 'create' ?>" class="btn btn-create">
            <?= $editData ? 'Perbarui Tokoh' : 'Tambah Tokoh' ?>
        </button>
        <?php if ($editData): ?>
            <a href="tabeltokoh.php" class="btn">Batal</a>
        <?php endif; ?>
    </form>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Karya</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id_tokoh'] ?></td>
                <td><?= htmlspecialchars($row['nama_tokoh']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['deskripsi_tokoh'])) ?></td>
                <td>
                    <?php if ($row['gambar_tokoh'] && file_exists($uploadDir . $row['gambar_tokoh'])): ?>
                        <img src="uploads/<?= htmlspecialchars($row['gambar_tokoh']) ?>" class="thumb">
                    <?php else: ?> -
                    <?php endif; ?>
                </td>
                <td><?= nl2br(htmlspecialchars($row['karya_tokoh'])) ?></td>
                <td>
                    <a href="?edit=<?= $row['id_tokoh'] ?>" class="btn btn-edit">Edit</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id_tokoh" value="<?= $row['id_tokoh'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>

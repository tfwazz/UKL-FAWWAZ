<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedInUser']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $rating = (int) $_POST['rating'];

    $query = "INSERT INTO review (nama_pengguna, komentar, rating) VALUES ('$nama', '$review', '$rating')";
    mysqli_query($conn, $query);
    header("Location: reviewcrud.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $rating = (int) $_POST['rating'];

    $query = "UPDATE review SET nama_pengguna='$nama', komentar='$review', rating=$rating WHERE id_review=$id";
    mysqli_query($conn, $query);
    header("Location: reviewcrud.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = (int) $_POST['id'];
    mysqli_query($conn, "DELETE FROM review WHERE id_review=$id");
    header("Location: reviewcrud.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM review");

$editData = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM review WHERE id_review=$id");
    $editData = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Review User</title>
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
            max-width: 1000px;
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
            top: 20px;
            right: 20px;
        }

        .dropdown-button {
            background: #444;
            color: white;
            font-size: 18px;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 40px;
            background-color: #fff;
            min-width: 180px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            border-radius: 6px;
            z-index: 1;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f4f4f4;
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
            text-align: left;
            vertical-align: top;
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

        input[type="text"],
        textarea,
        select {
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
        a {
            text-decoration: none;
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

    <h2>Manajemen Review Pengguna</h2>

    <div class="form-section">
        <h3><?= $editData ? "Edit Review" : "Tambah Review Baru" ?></h3>
        <form method="POST">
            <?php if ($editData): ?>
                <input type="hidden" name="id" value="<?= $editData['id_review'] ?>">
            <?php endif; ?>
            <label>Nama Pengguna:</label>
            <input type="text" name="nama" value="<?= $editData['nama_pengguna'] ?? '' ?>" required>
        
            <label>Isi Review:</label>
            <textarea name="review" required><?= $editData['komentar'] ?? '' ?></textarea>
        
            <label>Rating (1-5):</label>
            <select name="rating" required>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($editData && $editData['rating'] == $i) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>
        
            <br>
            <button type="submit" name="<?= $editData ? 'update' : 'create' ?>" class="btn btn-create">
                <?= $editData ? 'Perbarui Review' : 'Tambah Review' ?>
            </button>
            <?php if ($editData): ?>
                <a href="reviewcrud.php" style="margin-left: 10px;">Batal</a>
            <?php endif; ?>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id_review'] ?></td>
                <td><?= htmlspecialchars($row['nama_pengguna']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['komentar'])) ?></td>
                <td><?= $row['rating'] ?></td>
                <td>
                    <a href="?edit=<?= $row['id_review'] ?>" class="btn btn-edit">Edit</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id_review'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus review ini?')">Hapus</button>
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

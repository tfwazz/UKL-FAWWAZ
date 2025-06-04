<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "revisiukl";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_sumber'];
    $url = $_POST['url_sumber'];
    $tipe = $_POST['tipe_subjek'];
    $id_materi = $_POST['id_materi'];
    $conn->query("INSERT INTO sumber_belajar_tambahan (nama_sumber, url_sumber, tipe_subjek, id_materi) VALUES ('$nama', '$url', '$tipe', '$id_materi')");
    header("Location: sumbercrud.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $cek_relasi = $conn->query("SELECT * FROM sumber_belajar_tambahan WHERE id_sumber = $id");
    if ($cek_relasi->num_rows > 0) {
        echo "<script>alert('Gagal menghapus: Sumber ini masih digunakan di materi pembelajaran.'); window.location='sumbercrud.php';</script>";
        exit;
    }
    $conn->query("DELETE FROM sumber_belajar_tambahan WHERE id_sumber = $id");
    header("Location: sumbercrud.php");
}


if (isset($_POST['edit'])) {
    $id = $_POST['id_sumber'];
    $nama = $_POST['nama_sumber'];
    $url = $_POST['url_sumber'];
    $tipe = $_POST['tipe_subjek'];
    $id_materi = $_POST['id_materi'];
    $conn->query("UPDATE sumber_belajar_tambahan SET nama_sumber='$nama', url_sumber='$url', tipe_subjek='$tipe', id_materi='$id_materi' WHERE id_sumber=$id");
    header("Location: sumbercrud.php");
}

$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM sumber_belajar_tambahan WHERE id_sumber=$id");
    $edit_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Sumber Belajar Tambahan</title>
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

<h2>Tambah Sumber Belajar</h2>
<form method="POST">
    <input type="hidden" name="id_sumber" value="<?= $edit_data['id_sumber'] ?? '' ?>">

    <label>Pilih Materi:</label>
    <select name="id_materi" required>
        <option value="">-- Pilih Materi --</option>
        <?php
        $materi = $conn->query("SELECT * FROM materi");
        while ($m = $materi->fetch_assoc()):
        ?>
            <option value="<?= $m['id_materi'] ?>" <?= isset($edit_data['id_materi']) && $edit_data['id_materi'] == $m['id_materi'] ? 'selected' : '' ?>>
                <?= $m['materi'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label>Nama Sumber:</label>
    <input type="text" name="nama_sumber" value="<?= $edit_data['nama_sumber'] ?? '' ?>" required>

    <label>URL Sumber:</label>
    <input type="text" name="url_sumber" value="<?= $edit_data['url_sumber'] ?? '' ?>" required>

    <label>Tipe Subjek:</label>
    <input type="text" name="tipe_subjek" value="<?= $edit_data['tipe_subjek'] ?? '' ?>" required>

    <button class="btn btn-create" type="submit" name="<?= $edit_data ? 'edit' : 'tambah' ?>">
        <?= $edit_data ? 'Update Data' : 'Tambah Sumber' ?>
    </button>
</form>

<h2>Daftar Sumber Belajar Tambahan</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>URL</th>
        <th>Tipe Subjek</th>
        <th>Materi Terkait</th>
        <th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM sumber_belajar_tambahan");
    while ($row = $result->fetch_assoc()):
        $id_materi = (int)$row['id_materi'];
        $get_materi = $conn->query("SELECT materi FROM materi WHERE id_materi = $id_materi");
        $materi_row = $get_materi->fetch_assoc();
        $materi_nama = $materi_row['materi'] ?? 'Tidak ditemukan';
    ?>
    <tr>
        <td><?= $row['id_sumber'] ?></td>
        <td><?= htmlspecialchars($row['nama_sumber']) ?></td>
        <td><a href="<?= htmlspecialchars($row['url_sumber']) ?>" target="_blank"><?= $row['url_sumber'] ?></a></td>
        <td><?= htmlspecialchars($row['tipe_subjek']) ?></td>
        <td><?= htmlspecialchars($materi_nama) ?></td>
        <td>
            <a href="?edit=<?= $row['id_sumber'] ?>" class="btn btn-edit">Edit</a>
            <a href="?hapus=<?= $row['id_sumber'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</div>
</body>
</html>

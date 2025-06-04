<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedInUser']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!empty($username) && !empty($password)) {
        $username = mysqli_real_escape_string($conn, $username);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $insertQuery);
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Username dan password harus diisi!');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'] ?? null;
    $username = $_POST['username'] ?? '';
    if ($id && !empty($username)) {
        $id = mysqli_real_escape_string($conn, $id);
        $username = mysqli_real_escape_string($conn, $username);
        $updateQuery = "UPDATE users SET username='$username' WHERE id_users='$id'";
        mysqli_query($conn, $updateQuery);
        header("Location: admin.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id_users'] ?? null;
    if ($id) {
        $id = mysqli_real_escape_string($conn, $id);
        $deleteQuery = "DELETE FROM users WHERE id_users='$id'";
        mysqli_query($conn, $deleteQuery);
        header("Location: admin.php");
        exit();
    }
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

$editUser = null;
if (isset($_GET['edit'])) {
    $editId = mysqli_real_escape_string($conn, $_GET['edit']);
    $editQuery = "SELECT * FROM users WHERE id_users='$editId'";
    $editResult = mysqli_query($conn, $editQuery);
    $editUser = mysqli_fetch_assoc($editResult);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola User</title>
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        h2 {
            margin: 0;
            display: inline-block;
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
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .delete-button, .edit-button {
            background-color: #c00;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        .edit-button {
            background-color: #f90;
        }
        .logout-button {
            display: inline-block;
            background: #333;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .form-section {
            margin-top: 20px;
        }
        .form-section input {
            padding: 8px;
            margin: 5px;
        }
        .form-section button {
            padding: 8px 12px;
            margin: 5px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        a.cancel {
            text-decoration: none;
            color: red;
            margin-left: 10px;
        } 
</style>
</head>
<body>
<div class="container">
    <h2>Admin - Kelola User</h2>
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

    <div class="form-section">
        <h3><?= $editUser ? 'Edit User' : 'Tambah User' ?></h3>
        <form method="POST">
            <?php if ($editUser): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($editUser['id_users']); ?>">
                <input type="text" name="username" value="<?= htmlspecialchars($editUser['username']); ?>" required>
                <button type="submit" name="update">Update</button>
                <a href="admin.php" class="cancel">Batal</a>
            <?php else: ?>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="create">Tambah</button>
            <?php endif; ?>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['id_users']); ?></td>
                <td><?= htmlspecialchars($row['username']); ?></td>
                <td>
                    <a href="admin.php?edit=<?= htmlspecialchars($row['id_users']); ?>" class="edit-button">Edit</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id_users']); ?>">
                        <button type="submit" name="delete" class="delete-button" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="logout.php" class="logout-button">Logout</a>
</div>
</body>
</html>

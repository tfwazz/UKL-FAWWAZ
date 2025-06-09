<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedInUser']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['loggedInUser'];

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $new_username = mysqli_real_escape_string($conn, $_POST['username']);
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $update_query = "UPDATE users SET username = '$new_username', password = '$new_password' WHERE username = '$username'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['loggedInUser'] = $new_username;
        echo "<script>alert('Berhasil update!'); window.location.href='landingpage.php';</script>";
    } else {
        echo "<script>alert('Gagal update!');</script>";
    }
}

if (isset($_POST['delete'])) {
    $delete_query = "DELETE FROM users WHERE username = '$username'";
    if (mysqli_query($conn, $delete_query)) {
        session_destroy();
        echo "<script>alert('Akun berhasil dihapus!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus akun!');</script>";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: landingpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Pengguna</title>
    <link rel="icon" href="/ukl_fawwaz/image/logo ukl 3 (1).png">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #f9f9f9, #d7e1ec);
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            font-size: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .update-btn {
            background-color: #28a745;
            color: white;
        }
        .delete-btn {
            background-color: #ffc107;
            color: black;
        }
        .back-btn, .logout-btn {
            background-color: #007bff;
            color: white;
            margin-top: 20px;
        }
        .logout-btn {
            background-color: #dc3545;
        }
        button:hover {
            opacity: 0.9;
        }
        .actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h2>Edit Profil Pengguna</h2>
        <form method="post">
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <input type="password" name="password" placeholder="Masukkan Password Baru" required>
            <div class="actions">
                <button type="submit" name="update" class="update-btn">Update</button>
                <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus akun?');">Hapus Akun</button>
                <a href="landingpage.php"><button type="button" class="back-btn">← Kembali ke Beranda</button></a>
                <a href="?logout=true"><button type="button" class="logout-btn">Logout</button></a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

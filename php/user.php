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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fefefe;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            max-width: 90%;
            padding: 30px;
        }
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        button.delete {
            background-color: #ffbd3a;
            margin-top: 10px;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Profil</h2>
        <form method="post">
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <input type="password" name="password" placeholder="Masukkan Password Baru" required>
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus akun?');">Hapus Akun</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil pengguna</title>
</head>
<body>
  <div class="container">
    <h1>Selamat Datang, <?php echo htmlspecialchars($user['name']); ?></h1>
    <p>Email Anda: <?php echo htmlspecialchars($user['email']); ?></p>
    <a href="index.php" class="btn btn-primary">Kembali</a>
  </div>
</body>
</html>
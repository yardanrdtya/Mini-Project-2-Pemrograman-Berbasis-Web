<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Yardan Raditya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav>
    <div class="logo">yardanrdtya</div>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#certificates">Certificates</a></li>
    </ul>
</nav>

<!-- Hero -->
<section id="home" class="hero">
    <div class="hero-text">
        <h2>Halo Semua👋 saya</h2>
        <h1><?= $data['nama']; ?></h1>
        <p><?= $data['deskripsi']; ?></p>
    </div>
    <img src="img/yardan.png" alt="Foto Gue">
</section>

<!-- About -->
<section id="about" class="about">
    <h2>About Me</h2>
    <p>Saya adalah mahasiswa Sistem Informasi dari Universitas Mulawarman yang memiliki minat untuk memulai karier sebagai Analis Data dan Ilmuwan Data.</p>

<!-- Skills -->
<h3>Skills</h3>

<?php
$skills = mysqli_query($conn, "SELECT * FROM skills");
while ($row = mysqli_fetch_assoc($skills)) {
?>

<div class="skill">
    <div class="skill-head">
        <span><?= $row['nama_skill']; ?></span>
        <span><?= $row['persen']; ?>%</span>
    </div>
    <div class="bar">
        <div class="fill" style="width: <?= $row['persen']; ?>%;"></div>
    </div>
</div>

<?php } ?>

<!-- Experiences -->
<h3>Experience</h3>
<ul>
<?php
$exp = mysqli_query($conn, "SELECT * FROM experience");
while ($row = mysqli_fetch_assoc($exp)) {
?>
    <li><?= $row['pengalaman']; ?></li>
<?php } ?>
</ul>

</section>

<!-- Certificates -->
<section id="certificates" class="certificates">
    <h2>Certificates</h2>

    <div class="card-container">

<?php
$cert = mysqli_query($conn, "SELECT * FROM certificates");
while ($row = mysqli_fetch_assoc($cert)) {
?>

        <div class="card">
            <img src="img/<?= $row['gambar']; ?>" alt="Sertifikat">
            <h3><?= $row['judul']; ?></h3>
            <p><?= $row['deskripsi']; ?></p>
        </div>

<?php } ?>

    </div>
</section>

<footer>
    <p>© 2026 Yardan Raditya Portfolio</p>
</footer>

</body>
</html>
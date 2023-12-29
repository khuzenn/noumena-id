<!DOCTYPE html>
<html lang="en">
<head>
<title>Noumena.id</title>
<!-- Logo Web-->
<link rel="icon" type="image/x-icon" href="<?php echo base_url("assets/public/") ?>logo-bulat.png" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/") ?>dashboard.css" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
  <div class="container">
    <nav>
      <div class="navbar">
        <div class="logo">
          <img src="assets/public/logo-fix-2.png" alt="Logo">
        </div>
        <ul>
          <li><a href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-user"></i>
            <span class="nav-item">Selasar</span>
          </a>
          </li>
          <li><a href="<?= base_url('pangkalan-artikel'); ?>">
            <i class="fab fa-dochub"></i>
            <span class="nav-item">Pangkalan Artikel</span>
          </a>
          </li>
          <li><a href="<?= base_url('laman-kerja'); ?>">
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Laman Kerja</span>
          </a>
          </li>
          <li><a href="<?= base_url('Admin/logout');?>" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Keluar</span>
          </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="main">
      <div class="main-top">
        <p>BERBUAT BAIK ADALAH ALASAN!</p>
      </div>
      <div class="main-body">
        <h1>Selasar Publikasi</h1>
      <div class="main-card">
      <div class="job_card">
          <div class="job_details">
            <h2>Total Artikel :</h2>
            <p><?= $total ?></p>
          </div>
        </div>
        <div class="job_card">
          <div class="job_details">
            <h2>Ulasan</h2>
            <span>Jumlah Artikel</span>
            <p><?= $ulasan ?></p>
          </div>
        </div>
        <div class="job_card">
          <div class="job_details">
            <h2>Catatan Sipil</h2>
            <span>Jumlah Artikel</span>
            <p><?= $catatan_sipil ?></p>
          </div>
        </div>
        <div class="job_card">
          <div class="job_details">
            <h2>Keluh Kasih</h2>
            <span>Jumlah Artikel</span>
            <p><?= $keluh_kasih ?></p>
          </div>
        </div>
        <div class="job_card">
          <div class="job_details">
            <h2>Misuh-Misuh</h2>
            <span>Jumlah Artikel</span>
            <p><?= $misuh_misuh ?></p>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>

</body>
</html>
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
          <img src="<?= base_url('assets/public/')?>logo-fix-2.png" alt="Logo">
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
        <h1 class="">Detail Pangkalan Artikel</h1>
        <div class="main-card">
            <table>
                <tr>
                    <td>Judul :</td>
                    <td><?= $judul ?></td>
                </tr>
                <tr>
                    <td>Segmen :</td>
                    <td><?= $segmen ?></td>
                </tr>
                <tr>
                    <td>Nama Penulis :</td>
                    <td><?= $nama ?></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <td>No HP :</td>
                    <td><?= $no_hp ?></td>
                </tr>
                <tr>
                    <td>Instagram :</td>
                    <td><?= $instagram ?></td>
                </tr>
                <tr>
                    <td>Biografi Singkat :</td>
                    <td><?= $biografi_singkat ?></td>
                </tr>
                <tr>
                    <td>Artikel :</td>
                    <td><a href="<?= base_url('pangkalan-artikel/download/'. $id) ?>"><?= $isi ?></a></td>
                </tr>
                <tr>
                    <td>Foto :</td>
                    <td>
                      <img src="<?= base_url('./upload/photo/' . $foto) ?>">
                      <a href="<?= base_url('pangkalan-artikel/downloadFoto/'. $id) ?>"><?= $foto ?></a>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal :</td>
                    <td><?= $upload_at ?></td>
                </tr>
            </table>
            <center>
                <a href="<?= $url ?>" class="hapus mt-32">
                    Kembali
                </a>
            </center>
        </div>
    </div>
    </section>
  </div>
</body>
</html>
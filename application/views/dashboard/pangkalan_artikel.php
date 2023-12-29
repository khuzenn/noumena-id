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
      <div class="main-body-artikel">
        <h1 class="">Pangkalan Artikel</h1>
        <main class="table">
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Segmen</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($list_artikel as $key => $artikel) {
                      ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $artikel->segmen; ?></td>
                            <td><?= $artikel->judul; ?></td>
                            <td><img src="<?= base_url('./upload/photo/' . $artikel->foto) ?>"></td>
                            <td><?= $artikel->nama; ?></td>
                            <td><a href="<?= base_url('pangkalan-artikel/download/'. $artikel->id) ?>"><?= $artikel->isi; ?></a></td>
                            <td class="d-flex align-items-center">
                                <a href="<?php echo site_url('pangkalan-artikel/detail/' . encrypt_url($artikel->id)); ?>" class="detail">Detail</a>
                                <a href="<?php echo site_url('pangkalan-artikel/delete/' . encrypt_url($artikel->id)); ?>" class="hapus" onclick="return confirm('Apakah anda yakin untuk menghapus artikel ini?')">Hapus</a>
                            </td>
                        </tr>
                      <?php
                      $no++;
                      }
                      ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    </section>
  </div>
</body>
</html>
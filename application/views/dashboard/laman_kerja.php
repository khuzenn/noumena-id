<!DOCTYPE html>
<html lang="en">
<head>
<title>Noumena.id</title>
<!-- Logo Web-->
<link rel="icon" type="image/x-icon" href="<?php echo base_url("assets/public/") ?>logo-bulat.png" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/") ?>dashboard.css" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<!-- TEXT EDITOR  -->
<script src="https://cdn.tiny.cloud/1/c9l7o9x4fkwycd9fk0p2u4e0lppk8ck9eu9fupfcb7td6x5n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
        <h1>Laman Kerja</h1>
        <!-- Bagian di dalam view 'laman-kerja' -->
        <?php $error_message = $this->session->flashdata('message'); ?>
            <?php if ($error_message): ?>
                <div role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif; ?>
        <div class="main-card">
            <form action="<?= base_url('Laman_Kerja'); ?>" method="POST" enctype="multipart/form-data">
              <div class="input-control">
                <label for="judul">Judul Artikel<span style="color:red">*</span> :</label>
                  <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul...">
              </div>
              <div class="input-control">
                <label for="segmen">Segmen<span style="color:red">*</span> :</label>
                  <select name="segmen" id="segmen" class="form-control">
                  <option value="">Pilih Segmen</option>
									<?php
									foreach ($list_segmen as $segmen) {
										if ($segmen->id_segmen == $selected_segmen) {
											?>
											<option value="<?php echo encrypt_url($segmen->id_segmen); ?>" selected><?php echo $segmen->segmen; ?></option>
										<?php } else { ?>
											<option value="<?php echo encrypt_url($segmen->id_segmen); ?>"><?php echo $segmen->segmen; ?></option>
											<?php
										}
									}
									?>
                </select>
              </div>
              <div class="input-control">
                <label for="nama">Nama Penulis<span style="color:red">*</span> :</label>
                  <input type="text" name="nama" id="nama" placeholder="Masukkan Nama...">
              </div>
              <div class="input-control">
                <label for="email">Email<span style="color:red">*</span> :</label>
                  <input type="text" name="email" id="email" placeholder="Masukkan Email...">
              </div>
              <div class="input-control">
                <label for="no_hp">No HP<span style="color:red">*</span> :</label>
                  <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan No HP...">
              </div>
              <div class="input-control">
                <label for="instagram">Instagram<span style="color:red">*</span> :</label>
                  <input type="text" name="instagram" id="instagram" placeholder="Masukkan Instagram...">
              </div>
              <div class="input-control">
                <label for="biografi_singkat">Biografi Singkat<span style="color:red">*</span> :</label>
                  <textarea rows="5" cols="172" name="biografi_singkat" id="biografi_singkat" placeholder="Masukkan Biografi Singkat..."></textarea>
              </div>
              <div class="input-control">
                <label for="sinopsis">Sinopsis Artikel<span style="color:red">*</span> :</label>
                  <textarea rows="5" cols="172" type="text" name="sinopsis" id="sinopsis" placeholder="Masukkan Sinopsis..."></textarea>
              </div>
              <div class="input-control">
                <label for="isi">Artikel<span style="color:red">*</span> :</label>
                  <textarea rows="15" cols="172" name="isi" id="isi" placeholder="Masukkan Artikel..."></textarea>
              </div>
              <div class="input-control">
                <label for="foto">Foto<span style="color:red">*</span> :</label>
                  <input type="file" name="foto" id="foto" accept="image/*" placeholder="Pilih Foto...">
              </div>
              <div class="input-control">
                <label for="image">Artikel Image<span style="color:red">*</span> :</label>
                <p>
                    <input type="file" name="image" id="image" accept="image/*" placeholder="Pilih Image...">
                    <span style="color:red">*</span>Masukkan gambar dengan ukuran 1920px x 1080px
                </p>
              </div>
              
              <div class="input-control">
                <button type="submit">Simpan</button>
              </div>
              
            </form>
        </div>
    </div>
    </section>
  </div>
</body>
</html>

<!-- HIDE ALERT MESSAGE  -->
<script>
  // Cari elemen dengan class .alert-success
var successAlert = document.querySelector('.alert-success');

// Sembunyikan pesan setelah 5 detik
setTimeout(function() {
  successAlert.style.opacity = '0'; // Mengatur opasitas menjadi 0
}, 5000); // 5000 milidetik (5 detik)

</script>

<script>
    tinymce.init({
      selector: 'textarea#isi',
      height: 600,
      width: 600,
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
</script>
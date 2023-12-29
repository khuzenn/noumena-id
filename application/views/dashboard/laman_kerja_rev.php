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
    <!-- SIDEBAR -->
    <div id="nav-bar">
        <input id="nav-toggle" type="checkbox"/>
        <div id="nav-header"><a id="nav-title" href="https://codepen.io" target="_blank">
            <img src="<?= base_url('assets/public/logo-fix-2.png') ?>" style="width: 110px; padding-left: 20px" alt=""></a>
            <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
            <hr/>
        </div>
    <div id="nav-content">
        <div class="nav-button">
            <a href="<?= base_url('dashboard'); ?>"><i class="fa fa-palette"></i><span>Selasar</span></a>
        </div>
        <div class="nav-button">
            <a href="<?= base_url('pangkalan-artikel'); ?>"><i class="fa fa-folder"></i><span>Pangkalan Artikel</span></a>
        </div>
        <div class="nav-button">
            <a href="<?= base_url('laman-kerja'); ?>"><i class="fa fa-briefcase"></i><span>Laman Kerja</span></a>
        </div>
        <div id="nav-content-highlight"></div>
    </div>
    <input id="nav-footer-toggle" type="checkbox"/>
        <div id="nav-footer">
            <div id="nav-footer-heading">
                <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547"/></div>
                    <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank">uahnbu</a><span id="nav-footer-subtitle">Admin</span></div>
                        <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
                    </div>
                <div id="nav-footer-content">
            <Lorem>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</Lorem>
            </div>
        </div>
    </div>

    <!-- FORM CONTAINER  -->
    <div class="input-container">
        <form>
            <label for="input-text">Nama:</label>
            <input type="text" id="input-text" name="nama" placeholder="Masukkan nama Anda" required>

            <label for="input-email">Email:</label>
            <input type="email" id="input-email" name="email" placeholder="Masukkan alamat email Anda" required>

            <label for="input-message">Pesan:</label>
            <textarea id="input-message" name="pesan" placeholder="Tulis pesan Anda" required></textarea>

            <button type="submit">Kirim</button>
        </form>
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
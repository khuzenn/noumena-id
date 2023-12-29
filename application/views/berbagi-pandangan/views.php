<body>
    <div class="head">
        <h1 class="fade-in-down">Berbagi Pandangan</h1>
        <p class="fade-in-down">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia sequi iusto rem vitae enim adipisci.</p>
    </div>
    <div class="footer-container">
        <p class="pt-12">
            Anda dapat berkontribusi dengan mengirim artikel kepada kami. Adapun hal yang perlu diperhatikan adalah sebagai berikut:
        </p>
        <ul>
            <li><strong>Misuh-Misuh</strong> adalah rubrik yang berisikan kekesalan, uneg-uneg, dan perasaan-perasaan yang nyempil dalam hati tapi susah buat diucapkan. Buat kamu yang merasa dipecundangi oleh pahitnya dunia, rubrik ini siap menemani hidupmu.</li>
            <li><strong>Keluh Kasih</strong> buat kamu yang introvert, bingung mau curhat kemana, tidak ada teman buat cerita, dan lainnya yang bersifat subjektif. Rubrik ini siap untuk menerima ceritamu dan mendengar suara hatimu. Eits, jangan takut untuk bercerita atau privasimu akan diketahui piblik. Kita akan jaga privasimu jika itu yang kamu inginkan. Karena, tidak semua perasaan bisa diceritakan. Tapi semua cerita bisa dituliskan.</li>
            <li><strong>Catatan Sipil</strong> Rubrik ini akan menyuguhimu info-info masyarakat kelas menengah-bawah. Merekam kegiatan, karya, dan segala bentuk aktifitas masyarakat sipil lainnya. Silahkan sajikan kegiatanmu secara menarik dan tentunya berbeda dengan berita para kaum elit, apalagi gosip selebriti.</li>
            <li><strong>Ulasan</strong> berisikan essai, opini, ulasan buku, dan artikel yang menurutmu layak untuk diketahui oleh orang banyak.'Diusahakan' perpektif yang dibuat untuk menerjemahkan hal yang terjadi dibalik sebuah peristiwa. sebuah noumena yang sering luput dari pandangan banyak orang.</li>
            <li>Format berkas doc atau docx</li>
            <li>Berkas dapat diunggah dengan mengisi kolom yang telah disediakan</li>
            <li>Kami tidak memberikan honorarium kepada kontributor</li>
            <li>Tulisan akan disunting oleh tim redaksi sebelum dipublikasikan</li>
            <li>Kami akan mengirim surel pemberitahuan apabila telah berhasil melakukan submisi di laman kirim tulisan. Surel akan dikirim maksimal 2 hari, apabila penulis tidak menerima surel dari Nomena.id selama tempo hari yang disebutkan, penulis bisa menghubungi alamat surel kami.</li>
        </ul>
        <form method="POST" action="" enctype="multipart/form-data">
            <!-- Tampilkan pesan kesalahan jika ada -->
            <?php $error_message = $this->session->flashdata('message'); ?>
            <?php if ($error_message): ?>
                <div role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif; ?>
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
                <label for="nama">Nama<span style="color:red">*</span> :</label>
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
                <label for="isi">Artikel<span style="color:red">*</span> :</label>
                <input type="file" name="isi" id="isi" accept=".docx">
              </div>
              <div class="input-control">
                <label for="foto">Foto<span style="color:red">*</span> :</label>
                  <input type="file" name="foto" id="foto" accept="image/*" placeholder="Pilih Foto...">
              </div>
              <div class="input-control">
                <button type="submit-artikel">Unggah</button>
              </div>
        </form>
    </div>
</body>

<!-- HIDE ALERT MESSAGE  -->
<script>
  // Cari elemen dengan class .alert-success
var successAlert = document.querySelector('.alert-success');

// Sembunyikan pesan setelah 5 detik
setTimeout(function() {
  successAlert.style.opacity = '0'; // Mengatur opasitas menjadi 0
}, 5000); // 5000 milidetik (5 detik)

</script>
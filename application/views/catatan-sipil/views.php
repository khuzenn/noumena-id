<body>
    <div class="head">
        <h1 class="fade-in-down">Catatan Sipil</h1>
        <p class="fade-in-down">Merekam kegiatan, karya, dan segala bentuk aktifitas masyarakat sipil lainnya. Silahkan sajikan kegiatanmu secara menarik dan tentunya berbeda dengan berita para kaum elit, apalagi gosip selebriti.</p>
    </div>
    <div class="ulasan">
        <div class="card-display-artikel">
            <?php foreach ($list_artikel as $artikel) {?>
                <div class="artikel-terbaru">
                    <div class="gambar-misuh">
                        <a href="<?php echo site_url('catatan-sipil/detail/' . encrypt_url($artikel->id_artikel)); ?>"><img src="<?= base_url('./upload/image/' . $artikel->image) ?>"></a>
                    </div>
                    <div class="segmen">
                        <a href="<?php echo site_url('catatan-sipil/detail/' . encrypt_url($artikel->id_artikel)); ?>"><p><?= $artikel->segmen; ?></p></a>
                    </div>
                    <div class="judul">
                        <a href="<?php echo site_url('catatan-sipil/detail/' . encrypt_url($artikel->id_artikel)); ?>"><h4><?= $artikel->judul; ?></h4></a>
                    </div>
                    <div class="penulis">
                        <h6><?= $artikel->nama; ?></h6>
                    </div>
                    <div class="isi">
                        <p style="white-space: pre-line"><?= $artikel->isi; ?></p>
                    </div>
                    <div class="upload">
                        <i class='bx bxs-calendar'></i>
                        <h6><?= $artikel->upload_at; ?></h6>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-button">
        <div class="load-more">
                <button id="load-more-catatan" data-offset="3">Lebih Banyak</button>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
    $("#load-more-catatan").click(function() {
        var offset = $(this).data("offset");
        var limit = 3; // Jumlah artikel yang akan dimuat setiap kali tombol "Load More" ditekan

        $.ajax({
            url: "<?php echo base_url('catatan-sipil/load_more'); ?>",
            method: "POST",
            data: { offset: offset, limit: limit },
            success: function(data) {
                if (data) {
                    $(".card-display-artikel").append(data);
                    offset += limit; // Tingkatkan offset untuk mengambil artikel selanjutnya
                    $("#load-more-catatan").data("offset", offset);
                } else {
                    $("#load-more-catatan").prop("disabled", true).text("No More Articles");
                }
            }
        });
    });
});
</script>
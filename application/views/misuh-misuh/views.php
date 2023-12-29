<body>
    <div class="head">
        <h1 class="fade-in-down">Misuh-Misuh</h1>
        <p class="fade-in-down">Rubrik yang berisikan kekesalan, uneg-uneg, dan perasaan-perasaan yang nyempil dalam hati tapi susah buat diucapkan. Buat kamu yang merasa dipecundangi oleh pahitnya dunia, rubrik ini siap menemani hidupmu.</p>
    </div>
    <div class="ulasan">
        <div class="card-display-artikel">
            <?php foreach ($list_artikel as $artikel) {?>
                <div class="artikel-terbaru">
                    <div class="gambar-misuh">
                        <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>"><img src="<?= base_url('./upload/image/' . $artikel->image) ?>"></a>
                    </div>
                    <div class="segmen">
                        <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>"><p><?= $artikel->segmen; ?></p></a>
                    </div>
                    <div class="judul">
                        <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>"><h4><?= $artikel->judul; ?></h4></a>
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
                <button id="load-more-misuh" data-offset="3">Lebih Banyak</button>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
    $("#load-more-misuh").click(function() {
        var offset = $(this).data("offset");
        var limit = 3; // Jumlah artikel yang akan dimuat setiap kali tombol "Load More" ditekan

        $.ajax({
            url: "<?php echo base_url('misuh-misuh/load_more'); ?>",
            method: "POST",
            data: { offset: offset, limit: limit },
            success: function(data) {
                if (data) {
                    $(".card-display-artikel").append(data);
                    offset += limit; // Tingkatkan offset untuk mengambil artikel selanjutnya
                    $("#load-more-misuh").data("offset", offset);
                } else {
                    $("#load-more-misuh").prop("disabled", true).text("No More Articles");
                }
            }
        });
    });
});
</script>
<?php foreach ($list_artikel as $artikel) { ?>
    <div class="artikel-terbaru">
        <div class="gambar-misuh">
            <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>">
                <img src="<?= base_url('./upload/image/' . $artikel->image) ?>">
            </a>
        </div>
        <div class="segmen">
            <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>">
                <p><?= $artikel->segmen; ?></p>
            </a>
        </div>
        <div class="judul">
            <a href="<?php echo site_url('misuh-misuh/detail/' . encrypt_url($artikel->id_artikel)); ?>">
                <h4><?= $artikel->judul; ?></h4>
            </a>
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

<body>
<div class="slideshow-container">
    <?php foreach ($slideshow as $slideshow) {?>
        <div class="mySlides fade">
            <img src="<?= base_url('./upload/image/' . $slideshow->image) ?>" style="width:100%; opacity:0.6">
            <div class="text">
                <a href="<?php echo site_url('home/detail/' . encrypt_url($slideshow->id_artikel)); ?>"><h4><?= $slideshow->judul; ?></h4></a>
                <h6><?= $slideshow->nama; ?></h6>
            </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    <?php } ?>
</div>
<div class="main">
    <div class="left">
        <h3>Keluh Kasih Hari Ini</h3>
        <div class="left-card">
            <?php foreach ($keluh_kasih as $keluh_kasih) {?>
                <div class="left-artikel">
                    <div class="left-gambar">
                        <a href="<?php echo site_url('home/detail/' . encrypt_url($keluh_kasih->id_artikel)); ?>"><img src="<?= base_url('./upload/image/' . $keluh_kasih->image) ?>"></a>
                    </div>
                    <div class="left-judul">
                        <a href="<?php echo site_url('home/detail/' . encrypt_url($keluh_kasih->id_artikel)); ?>"><h4><?= $keluh_kasih->judul; ?></h4></a>
                        <h6><?= $keluh_kasih->nama; ?></h6>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="right">
        <!-- <h3>Artikel Terbaru</h3> -->
        <div class="card">
            <?php foreach ($artikel as $artikel) {?>
                <div class="artikel-terbaru">
                    <div class="gambar">
                        <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel->id_artikel)); ?>"><img src="<?= base_url('./upload/image/' . $artikel->image) ?>"></a>
                    </div>
                    <div class="segmen">
                        <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel->id_artikel)); ?>"><p><?= $artikel->segmen; ?></p></a>
                    </div>
                    <div class="judul">
                        <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel->id_artikel)); ?>"><h4><?= $artikel->judul; ?></h4></a>
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
            <div class="load-more">
                <button id="load-more-artikel-all" data-offset="6">Lebih Banyak</button>
            </div>
    </div>
</div>
<div class="main-slide">
    <div class="gambar-slide">
        <?php foreach ($artikel_populer as $artikel_populer) {?>
            <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel_populer->id_artikel)); ?>"><img src="<?= base_url('./upload/image/' . $artikel_populer->image) ?>"></a>
            </div>
    <div class="info">
        <div class="info-judul-artikel">
            <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel_populer->id_artikel)); ?>"><h3><?= $artikel_populer->segmen ?></h3></a>
        </div>
        <div class="info-judul-artikel">
            <a href="<?php echo site_url('home/detail/' . encrypt_url($artikel_populer->id_artikel)); ?>"><h1><?= $artikel_populer->judul ?></h1></a>
        </div>
        <div class="info-isi-artikel">
            <p style="white-space: pre-line"><?= $artikel_populer->isi ?></p>
        </div>
        <div class="info-judul-artikel">
            <div class="upload">
                <i class='bx bxs-calendar'></i>
                <h6><?= $artikel_populer->upload_at; ?></h6>
            </div>
        </div>
    </div>
        <?php } ?>
</div>
<div class="main">
    <h1>Jangan Lewatkan Artikel Terbaru!!!</h1>
</div>
<div class="tentang-kami">
    <div class="kami">
        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/1ie5eaelrfU0lrd4aRVWhp?utm_source=generator" width="600" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>
    <div class="tentang">
        <h1>Podcast</h1>
        <p>Podcast ini dibangun diatas perasaan yang resah, dan juga segudang kekosongan. Selamat menikmati, semoga bisa dinikmati !!!</p>
    </div>
</div>
</body>

<!-- TAMPILKAN LEBIH BANYAK ARTIKEL  -->
<script>
    $(document).ready(function() {
    $("#load-more-artikel-all").click(function() {
        var offset = $(this).data("offset");
        var limit = 2; // Jumlah artikel yang akan dimuat setiap kali tombol "Load More" ditekan

        $.ajax({
            url: "<?php echo base_url('home/load_more'); ?>",
            method: "POST",
            data: { offset: offset, limit: limit },
            success: function(data) {
                if (data) {
                    $(".card").append(data);
                    offset += limit; // Tingkatkan offset untuk mengambil artikel selanjutnya
                    $("#load-more-artikel-all").data("offset", offset);
                } else {
                    $("#load-more-artikel-all").prop("disabled", true).text("No More Articles");
                }
            }
        });
    });
});
</script>

<!-- SLIDESHOW CONTAINER  -->
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
</script>
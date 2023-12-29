<body>
    <div class="footer-container-header">
        <h3><?= $segmen ?></h3>
        <h1 class="pt-80 fade-in-down"><?= $judul ?></h1>
        <p><?= $sinopsis ?></p>
        <img class="fade-in-down"src="<?= base_url('./upload/image/' . $image); ?>">
    </div>
    <div class="footer-container-detail">
        <div class="bagian-kiri">
            <!-- <h2>Info Penulis</h2> -->
            <div class="info-penulis">
                <div class="foto-penulis">
                    <img src="<?= base_url('./upload/foto/' . $foto) ?>" alt="">
                </div>
                <div class="nama-penulis">
                    <h6><?= $nama; ?></h6>
                </div>
                <div class="biografi-penulis">
                    <p><?= $biografi_singkat ?></p>
                </div>
                <div class="upload-at">
                    <h6><?= $upload_at; ?></h6>
                    <i class='bx bxs-calendar'></i>
                </div>
                <div class="sosial-penulis">
                    <h6><?= $instagram; ?></h6>
                    <i class='bx bxl-instagram'></i>
                </div>
            </div>
        </div>
        <div class="main-artikel">
            <div class="auto-scroll-mobile">
                <button id="scroll-down-button-mobile"><i class='bx bx-receipt'></i>Auto Scroll</button>
                <p>"Fitur ini tersedia bagi kalian yang malas menggerakkan jempol atau anggota jari lainnya."</p>
            </div>
            <p style="white-space: pre-line"><?= $isi ?></p>
        </div>
        <div class="bagian-kanan">
            <div class="auto-scroll">
                <button id="scroll-down-button"><i class='bx bx-receipt'></i>Auto Scroll</button>
                <p>"Fitur ini tersedia bagi kalian yang malas menggerakkan jempol atau anggota jari lainnya."</p>
            </div>
            <div class="bagian-kiri-mobile">
            <!-- <h2>Info Penulis</h2> -->
            <div class="info-penulis">
                <div class="foto-penulis">
                    <img src="<?= base_url('./upload/foto/' . $foto) ?>" alt="">
                </div>
                <div class="nama-penulis">
                    <h6><?= $nama; ?></h6>
                </div>
                <div class="biografi-penulis">
                    <p><?= $biografi_singkat ?></p>
                </div>
                <div class="upload-at">
                    <h6><?= $upload_at; ?></h6>
                    <i class='bx bxs-calendar'></i>
                </div>
                <div class="sosial-penulis">
                    <h6><?= $instagram; ?></h6>
                    <i class='bx bxl-instagram'></i>
                </div>
            </div>
        </div>
            <div class="bagikan-artikel">
                <h4>Sebarkan Lagi!</h4>
              </div>
              <div class="icon-share">
              <div class="whatsapp-icon">
                <a href="#" onclick="shareToWhatsApp()"><i class='bx bxl-whatsapp' ></i></a>
              </div>
              <div class="instagram-icon">
                <a href="#" onclick="shareToInstagram()"><i class='bx bxl-instagram' ></i></a>
              </div>
              <div class="facebook-icon">
                <a href="#" onclick="shareToFacebook()"><i class='bx bxl-facebook' ></i></a>
              </div>
              <div class="twitter-icon">
                <a href="#" onclick="shareToTwitter()"><i class='bx bxl-twitter' ></i></a>
              </div>
              <div class="telegram-icon">
                <a href="#" onclick="shareToTelegram()"><i class='bx bxl-telegram' ></i></a>
              </div>
              <div class="tiktok-icon">
                <a href="#" onclick="shareToTiktok()"><i class='bx bxl-tiktok' ></i></a>
              </div>
            </div>
        </div>
    </div>
</body>
<!-- AUTOSCROLL BUTTON  -->
<script>
    const scrollDownButton = document.getElementById('scroll-down-button');
    const scrollDownButtonMobile = document.getElementById('scroll-down-button-mobile');
    let isAutoScrolling = false;
    let isScrollingManually = false;

    scrollDownButton.addEventListener('click', () => {
        scrollToBottom();
    });

    scrollDownButtonMobile.addEventListener('click', () => {
        scrollToBottom();
    });

    function scrollToBottom() {
        if (isAutoScrolling || isScrollingManually) return;

        isAutoScrolling = true;
        const scrollDuration = 500000;
        const startTime = performance.now();
        const initialScrollY = window.scrollY;

        function animateScroll(currentTime) {
            if (isScrollingManually) {
                // Hentikan pergerakan otomatis jika pengguna melakukan scroll manual
                isAutoScrolling = false;
                return;
            }

            const elapsedTime = currentTime - startTime;
            const scrollProgress = Math.min(elapsedTime / scrollDuration, 1);
            const newY = initialScrollY + scrollProgress * (document.body.scrollHeight - window.innerHeight);

            window.scroll(0, newY);

            if (scrollProgress < 1) {
                requestAnimationFrame(animateScroll);
            } else {
                isAutoScrolling = false;
            }
        }

        requestAnimationFrame(animateScroll);
    }

    window.addEventListener('wheel', () => {
        if (isAutoScrolling) {
            isScrollingManually = true;
            isAutoScrolling = false;
        }
    });
</script>

<!-- SHARE ARTIKEL  -->
<script>
  function shareToWhatsApp() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(articleLink), '_blank');
  }
  function shareToInstagram() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://www.instagram.com/?url=' + encodeURIComponent(articleLink), '_blank');
  }
  function shareToFacebook() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://www.facebook.com/sharer.php?u=' + encodeURIComponent(articleLink), '_blank');
  }
  function shareToTwitter() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(articleLink), '_blank');
  }
  function shareToTelegram() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://t.me/share/url?url=' + encodeURIComponent(articleLink), '_blank');
  }
  function shareToTiktok() {
    var articleLink = '<?= site_url('home/detail.' . $id_artikel) ?>';

    window.open('https://www.tiktok.com/share?url=' + encodeURIComponent(articleLink), '_blank');
  }
</script>
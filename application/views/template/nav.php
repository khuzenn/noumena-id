<header id="myHeader">
    <a href="<?= base_url('home'); ?>" class="logo">
        <img src="<?= base_url("assets/public/") ?>logo-fix-2.png" width="100px" alt="Logo">
    </a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar">
        <i class='bx bx-menu' id="menu-icon"></i>
        <i class='bx bx-x' id="close-icon"></i>
    </label>

    <nav class="navbar">
    <ul>
        <li><a href="<?php echo site_url('home') ?>" id="beranda">Beranda</a></li>
        <li><a  href="#" id="artikel">Artikel<i class='bx bxs-down-arrow'></i></a>
            <ul>
                <li><a href="<?php echo site_url('ulasan') ?>">Ulasan</a></li>
                <li><a href="<?php echo site_url('catatan-sipil') ?>">Catatan Sipil</a></li>
                <li><a href="<?php echo site_url('keluh-kasih') ?>">Keluh Kasih</a></li>
                <li><a href="<?php echo site_url('misuh-misuh') ?>">Misuh-Misuh</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url('tentang-kami')?>" id="tentang-kami">Tentang Kami</a></li>
        <li><a href="<?php echo site_url('berbagi-pandangan') ?>" id="berbagi-pandangan">Berbagi Pandangan</a></li>
    </ul>
    </nav>
</header>

<!-- HIDDEN NAVBAR  -->
<script>
    window.addEventListener("scroll", () => {
    const header = document.querySelector("header .logo img");
    const navbar = document.querySelector("header .navbar ul");

    if (window.scrollY > 600) {
        navbar.style.display = "none"; /* Menampilkan menu navbar saat scroll ke bawah */
    } else {
        navbar.style.display = "block"; /* Menyembunyikan menu navbar saat scroll ke atas ke atas */
    }
});
</script>

<!-- REMOVE MENU BAR  -->
<script>
    window.addEventListener("scroll", function() {
    var header = document.getElementById("myHeader");
    if (window.scrollY > 600) { // Ubah angka sesuai dengan tinggi scroll yang Anda inginkan
        header.classList.add("header-scroll");
    } else {
        header.classList.remove("header-scroll");
    }
});
</script>

<!-- LINK ACTIVE MENU  -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan URL saat ini
    var currentURL = window.location.href;
    
    // Mendapatkan semua tautan menu
    var menuLinks = document.querySelectorAll(".navbar a");

    // Loop melalui tautan menu
    menuLinks.forEach(function(link) {
        // Membandingkan URL saat ini dengan URL tautan menu
        if (link.href === currentURL) {
            // Menambahkan kelas "active" ke tautan yang sesuai
            link.classList.add("active");
        }
    });
});
</script>
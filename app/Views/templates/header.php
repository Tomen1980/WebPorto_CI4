  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?= base_url(); ?>/img/logo.png" alt=""> -->
        <!-- <i class="bi bi-camera"></i> -->
        <h1>PortoFolio</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url('/') ?>" class="<?php if($title == "Home"):?> active <?php endif; ?>">Home</a></li>
          <li><a href="<?= base_url('/about') ?>" class="<?php if($title == "About"):?> active <?php endif; ?>">About</a></li>
          <li class="dropdown"><a href="<?= base_url('/gallery') ?>" class="<?php if($title == "Gallery"):?> active <?php endif; ?>"><span>Gallery</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <?php foreach($nav as $ctg): ?>
              <li><a href="<?= base_url("/detail/category/").$ctg["id"] ?>"><?= $ctg['kategori'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <!-- <li><a href="<?= base_url('/services') ?>" class = "<?php if($title == "Services"):?> active <?php endif; ?>">Services</a></li> -->
            
          <li><a href="<?= base_url('/contact') ?>" class="<?php if($title == "Contact"):?> active <?php endif; ?>">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="<?= base_url('/login') ?>" class="twitter"><i class="bi bi-box-arrow-in-right"></i></a>
        <!-- <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> -->
        <a href="https://www.instagram.com/agung.juman/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/agung-jumantoro-andrian/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
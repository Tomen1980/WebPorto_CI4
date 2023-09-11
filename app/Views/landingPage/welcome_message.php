<?= $this->extend("templates/index") ?>

<?= $this->section('page-content') ?>
<!-- content -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
  <div class="container">
    <div class="row justify-content-center">
   
    <div class="col-lg-6 text-center">
        <h2>I'm <span><?= $profile["name"] ?></span> a <?= $profile["passion"] ?> From <?= $profile["city"] ?></h2>
        <p><?= $profile["deskripsi_singkat"] ?></p>
        <a href="<?= base_url("/contact") ?>" class="btn-get-started">Available for hire</a>
      </div>
    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container-fluid">

      <div class="row gy-4 justify-content-center">
        <?php foreach ($porto as $prt) : ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="<?= base_url("/img/portofolio/") . $prt->img_porto ?>" class="img-fluid" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?= base_url("/img/portofolio/") . $prt->img_porto ?>" title="<?= $prt->judul ?>" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                <a href="<?= base_url("detail/portofolio/") . $prt->id ?>" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Gallery Item -->
        <?php endforeach; ?>
      </div>

    </div>
  </section><!-- End Gallery Section -->

</main><!-- End #main -->
<!-- content -->

<?= $this->endSection() ?>
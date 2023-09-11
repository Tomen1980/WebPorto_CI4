<?= $this->extend("templates/index") ?>

<?= $this->section('page-content') ?>

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2><?= $judul ?></h2>
          <p>Total image in <?= $judul ?> (<?=count($porto) ?>)</p>

          <a class="cta-btn" href="<?= base_url("/contact") ?>">Available for hire</a>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

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

<?= $this->endSection() ?>
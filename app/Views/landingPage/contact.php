<?= $this->extend("templates/index") ?>

<?= $this->section('page-content') ?>

<main id="main" data-aos="fade" data-aos-delay="1500">

<!-- ======= End Page Header ======= -->
<div class="page-header d-flex align-items-center">
  <div class="container position-relative">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 text-center">
        <h2>Contact</h2>
        <!-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> -->

      </div>
    </div>
  </div>
</div><!-- End Page Header -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="row gy-4 justify-content-center">

      <div class="col-lg-3">
        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h4>Location:</h4>
            <p><?= $contact["city"] ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3">
        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4>Email:</h4>
            <p><?= $contact["email"] ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3">
        <div class="info-item d-flex">
          <i class="bi bi-phone flex-shrink-0"></i>
          <div>
            <h4>Call:</h4>
            <p><?= $contact["phone"] ?></p>
          </div>
        </div>
      </div><!-- End Info Item -->

    </div>

    <div class="row justify-content-center mt-4">
       <?php if(session()->get("success")): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get("success"); ?>
          </div>
        <?php endif ?>
    
        <div class="row justify-content-center mt-4">
       <?php if(session()->get("error")): ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->get("error"); ?>
          </div>
        <?php endif ?>

      <div class="col-lg-9">
        <form action="<?= base_url("sendMail") ?>" method="post" role="form">
        <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
       
          <div class="text-center "><button class="btn btn-success" type="submit">Send Message</button></div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection() ?>
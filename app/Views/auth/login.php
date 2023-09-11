<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>



  <!-- content -->
  <div class="container">
    <div class="row">
      <div class="col-8">

        <?php if(session()->get("error")): ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->get("error"); ?>
          </div>
        <?php endif ?>
        <form action="<?= base_url('/auth') ?>" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>


  <?= $this->endSection(); ?>
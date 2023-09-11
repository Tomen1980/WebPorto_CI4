<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="card" style="width: 18rem; ">
                <img src="<?= base_url("img/") . $auth["img_profile"] ?>" class="card-img-top" alt="..." style="width: 288px; height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">My Account</h5>
                    <p class="card-text">
                    <ul class="list-group">
                        <li class="list-group-item">id : <?= $auth["authId"]; ?></li>
                        <li class="list-group-item">Username : <?= $auth["username"]; ?></li>
                        <li class="list-group-item">Email : <?= $auth["email"]; ?></li>
                        <li class="list-group-item">Password : <?= $auth["password"]; ?></li>
                    </ul>
                    </p>
                    <a href="<?= base_url("admin/account") ?>" class="btn btn-primary">Update Account</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
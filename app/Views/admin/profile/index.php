<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="card-body" style="width: 50rem;">
                <h5 class="card-title">My Profile</h5>
                <img src=<?= base_url("img/") . $profile['img_profile']; ?> class="card-img-top" alt="..." style="width: 288px; height: 300px;">
                <p class="card-text">
                <ul class="list-group">
                    <li class="list-group-item">id : <?= $profile['id']; ?></li>
                    <li class="list-group-item">name : <?= $profile['name']; ?></li>
                    <li class="list-group-item">passion : <?= $profile['passion']; ?></li>
                    <li class="list-group-item">bod : <?= $profile['bod']; ?></li>
                    <li class="list-group-item">website : <?= $profile['website']; ?></li>
                    <li class="list-group-item">phone : <?= $profile['phone']; ?></li>
                    <li class="list-group-item">city : <?= $profile['city']; ?></li>
                    <li class="list-group-item">age : <?= $profile['age']; ?></li>
                    <li class="list-group-item">degree : <?= $profile['degree']; ?></li>
                    <li class="list-group-item">freelance : <?= $profile['freelance']; ?></li>
                </ul>
                </p>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Long Description</h5>
                        <hr>
                        <?= $profile["deskripsi"]; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Short Description</h5>
                        <hr>
                        <?= $profile["deskripsi_singkat"]; ?>
                    </div>
                </div>
                <a href="<?= base_url("admin/formUpdateProfile") ?>" class="btn btn-primary">Update Account</a>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
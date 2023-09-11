<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Update Account</h2>


            <form action="<?= base_url("admin/updateProfile") ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $profile["id"] ?>">
                <input type="hidden" name="id_profile" value="<?= $profile["id_profile"] ?>">
                <input type="hidden" name="oldImage" value="<?= $profile["img_profile"] ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control " id="name" name="name" autofocus value="<?= old('name', $profile['name']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["name"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["name"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="passion" class="form-label">passion</label>
                    <input type="text" class="form-control " id="passion" name="passion" autofocus value="<?= old('passion', $profile['passion']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["passion"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["passion"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="bod" class="form-label">bod</label>
                    <input type="date" class="form-control " id="bod" name="bod" autofocus value="<?= old('bod', $profile['bod']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["bod"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["bod"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">website</label>
                    <input type="text" class="form-control " id="website" name="website" autofocus value="<?= old('website', $profile['website']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["website"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["website"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input type="text" class="form-control " id="phone" name="phone" autofocus value="<?= old('phone', $profile['phone']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["phone"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["phone"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control " id="city" name="city" autofocus value="<?= old('city', $profile['city']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["city"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["city"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">age</label>
                    <input type="text" class="form-control " id="age" name="age" autofocus value="<?= old('age', $profile['age']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["age"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["age"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="degree" class="form-label">degree</label>
                    <input type="text" class="form-control " id="degree" name="degree" autofocus value="<?= old('degree', $profile['degree']); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["degree"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["degree"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="Freelance" class="form-label">Freelance</label>
                    <select class="form-select" aria-label="Default select example" name="freelance">
                        <!-- <option selected>Open this select menu</option> -->
                        <option value="Available" <?php if ($profile["freelance"] == "Available") : ?> selected <?php endif; ?>>Available</option>

                        <option value="Not Available" <?php if ($profile["freelance"] == "Not Available") : ?> selected <?php endif; ?>>Not Available</option>

                    </select>
                    <?php if (!empty(session()->get("_ci_validation_errors")["freelance"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["freelance"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="img_profile" class="form-label "><?= $profile['img_profile']; ?></label>
                    <div class="col-sm-2">
                        <img src="<?= base_url("img/") . $profile['img_profile']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <input class="custom-file-label" type="file" for="img_profile" id="img_profile" name="img_profile" onchange="previewImg()">

                    <?php if (!empty(session()->get("_ci_validation_errors")["img_profile"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["img_profile"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="deskripsi"><?= old('deskripsi', $profile['deskripsi']); ?></textarea>
                    <?php if (!empty(session()->get("_ci_validation_errors")["deskripsi"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["deskripsi"]; ?>
                        </div>
                    <?php  } ?>
                </div>
               
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="deskripsi_singkat"><?= old('deskripsi_singkat', $profile['deskripsi_singkat']); ?></textarea>
                    <?php if (!empty(session()->get("_ci_validation_errors")["deskripsi_singkat"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["deskripsi_singkat"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Account</h2>

            <form action="<?= base_url("admin/addPortofolio") ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control " id="judul" name="judul" autofocus value="<?= old('judul'); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["judul"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["judul"]; ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="mb-3">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="kategori">
                        <?php foreach ($category as $ctg) : ?>
                            <option value="<?= $ctg["id"] ?>"> <?= $ctg["kategori"] ?></option>
                        <?php endforeach; ?>
                    </select>
                      <?php if (!empty(session()->get("_ci_validation_errors")["kategori"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["kategori"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="deskripsi"><?= old('deskripsi'); ?></textarea>
                    <?php if (!empty(session()->get("_ci_validation_errors")["deskripsi"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["deskripsi"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" class="form-control" id="client" name="client" value="<?= old('client'); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["client"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["client"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?= old('date'); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["date"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["date"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Url</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?= old('url'); ?>" required>
                    <?php if (!empty(session()->get("_ci_validation_errors")["url"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["url"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="img_porto" class="form-label "></label>
                    <input class="custom-file-label" type="file" for="img_porto" id="img_porto" name="img_porto">
                    <?php if (!empty(session()->get("_ci_validation_errors")["img_porto"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["img_porto"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
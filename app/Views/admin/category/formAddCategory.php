<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Add Category</h2>

            <form action="<?= base_url("admin/addCategory") ?>" method="post">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control " id="kategori" name="kategori" autofocus value="<?= old('kategori'); ?>">
                    <?php if (!empty(session()->get("_ci_validation_errors")["kategori"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["kategori"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
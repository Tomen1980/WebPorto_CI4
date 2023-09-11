<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Add Category</h2>

            <form action="<?= base_url("admin/updateCategory") ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $category["id"]; ?>">
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control " id="kategori" name="kategori" autofocus value="<?= old('kategori',$category["kategori"]); ?>">
                    <?php if (!empty(session()->get("_ci_validation_errors")["kategori"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get("_ci_validation_errors")["kategori"]; ?>
                        </div>
                    <?php  } ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
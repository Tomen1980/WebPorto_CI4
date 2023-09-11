<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">



            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($category as $ctg) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $ctg['kategori']; ?></td>
                            <td>
                                <a href="/admin/formUpdateCategory/<?= $ctg['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="/admin/deleteCategory/<?= $ctg['id'] ?>" method="POST" class='d-inline'>
                                 <?= csrf_field(); ?>    
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete </button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-4" >
                    <a href="<?= base_url("/admin/formAddCategory") ?>" class="btn btn-primary">Add Category</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
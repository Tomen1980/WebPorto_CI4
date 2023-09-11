<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">

            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                </div>
            </form>

            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Client</th>
                        <th scope="col">Date</th>
                        <th scope="col">URL</th>
                        <th scope="col">Img</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($portofolio as $porto) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $porto["judul"] ?></td>
                            <td><?= $porto["deskripsi"] ?></td>
                            <td><?= $porto["kategori"] ?></td>
                            <td><?= $porto["client"] ?></td>
                            <td><?= $porto["date"] ?></td>
                            <td><?= $porto["url"] ?></td>
                            <td><img src="<?= base_url("/img/portofolio/" . $porto["img_porto"]) ?>" style="width:100px;"></td>
                            <td>
                                <a href="/admin/formUpdatePortofolio/<?= $porto["portId"] ?>" class="btn btn-success">Edit</a>
                                <form action="/admin/deletePortofolio/<?= $porto["portId"] ?>" method="POST" class='d-inline'>
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
                <div class="col-4">
                    <a href="<?= base_url("/admin/formAddPortofolio") ?>" class="btn btn-primary">Add Portofolio</a>
                </div>
            </div>
            <?= $pager->links("portofolio","pagination") ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
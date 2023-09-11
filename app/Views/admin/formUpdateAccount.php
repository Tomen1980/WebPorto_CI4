<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Update Account</h2>

            

            <form action="<?= base_url("admin/updateAccount") ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $auth["id"] ?>">


                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control " id="username" name="username" autofocus value="<?= old('username', $auth['username']); ?>" required>
                    <?php if(!empty(session()->get("_ci_validation_errors")["username"])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->get("_ci_validation_errors")["username"]; ?>
                      </div>
                  <?php  } ?>
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value='<?= old('email', $auth['email']); ?>' required>
                    <?php if(!empty(session()->get("_ci_validation_errors")["email"])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->get("_ci_validation_errors")["email"]; ?>
                      </div>
                  <?php  } ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>" required>
                    <?php if(!empty(session()->get("_ci_validation_errors")["password"])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->get("_ci_validation_errors")["password"]; ?>
                      </div>
                  <?php  } ?>
                </div>
                <div class="mb-3">
                    <label for="passwordVerify" class="form-label">Password Verify</label>
                    <input type="password" class="form-control" id="passwordVerify" name="passwordVerify" value="<?= old('passwordVerify'); ?>" required>
                    <?php if(!empty(session()->get("_ci_validation_errors")["passwordVerify"])){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->get("_ci_validation_errors")["passwordVerify"]; ?>
                      </div>
                  <?php  } ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>
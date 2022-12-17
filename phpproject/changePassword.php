<?php
include_once("./header.php");
userAccount::changePass();
?>
<div class="container">
    <div class="row p-5">
        <div class="col-md-4 m-auto">
            <?= userAccount::$err['insert'] ?? null ?>
            <h2 class="mb-3">Change Password</h2>
            <form action="" method="post">
                <div class="mb-3 input-group">
                    <input type="password" class="form-control form-control-sm <?= (isset(userAccount::$err['opass'])) ? 'is-invalid' : null ?>" placeholder="Old password" name="opass" value="<?= userAccount::$opass ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['opass'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="password" class="form-control form-control-sm <?= (isset(userAccount::$err['pass'])) ? 'is-invalid' : null ?>" placeholder="New password" name="pass" value="<?= userAccount::$pass ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['pass'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="password" class="form-control form-control-sm <?= (isset(userAccount::$err['cpass'])) ? 'is-invalid' : null ?>" placeholder="Confirm password" name="cpass" value="<?= userAccount::$cpass ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['cpass'] ?? null ?>
                    </div>
                </div>
                <input type="submit" class="btn btn-sm btn-primary" value="Change password" name="cp123">
            </form>
        </div>
    </div>
</div>
<?php
include_once("./footer.php");
?>
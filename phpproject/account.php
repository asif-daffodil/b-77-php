<?php
include_once("./header.php");
userAccount::registrationValidation();
echo (isset($_SESSION['user'])) ? "<script>location.href='./?success=true'</script>" : null;
?>
<div class="container">
    <div class="row d-flex justify-content-center py-5">
        <div class="col-md-4">
            <?= userAccount::$err['sinsert'] ?? null ?>
            <h2 class="mb-3">Sign-in</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control form-control-sm <?= (isset(userAccount::$err['suemail'])) ? 'is-invalid' : null ?>" placeholder="Email Address" name="suemail" value="<?= userAccount::$suemail ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['suemail'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control-sm <?= (isset(userAccount::$err['supass'])) ? 'is-invalid' : null ?>" placeholder="Password" name="supass" value="<?= userAccount::$supass ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['supass'] ?? null ?>
                    </div>
                </div>
                <input type="submit" class="btn btn-sm btn-primary" value="Sign-in" name="signin123">
            </form>
        </div>
        <div class="col-md-4">
            <?= userAccount::$err['insert'] ?? null ?>
            <h2 class="mb-3">Sign-up</h2>
            <form action="" method="post">
                <div class="mb-3 input-group">
                    <input type="text" class="form-control form-control-sm <?= (isset(userAccount::$err['uname'])) ? 'is-invalid' : null ?>" placeholder="Your Name" name="uname" value="<?= userAccount::$uname ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['uname'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control form-control-sm <?= (isset(userAccount::$err['uemail'])) ? 'is-invalid' : null ?>" placeholder="Your Email" name="uemail" value="<?= userAccount::$uemail ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['uemail'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <div class="form-control form-control-sm border-0 <?= (isset(userAccount::$err['gndr'])) ? 'is-invalid' : null ?>">
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">Gender :</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label"><input type="radio" class="form-check-input" value="Male" name="gndr" <?= (isset(userAccount::$gndr) && userAccount::$gndr === "Male" ? "checked" : null) ?>>Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label"><input type="radio" class="form-check-input" value="Female" name="gndr" <?= (isset(userAccount::$gndr) && userAccount::$gndr === "Female" ? "checked" : null) ?>>Female</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= userAccount::$err['gndr'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="password" class="form-control form-control-sm <?= (isset(userAccount::$err['pass'])) ? 'is-invalid' : null ?>" placeholder="Your password" name="pass" value="<?= userAccount::$pass ?? null ?>">
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
                <input type="submit" class="btn btn-sm btn-primary" value="Sign-up" name="signup123">
            </form>
        </div>
    </div>
</div>
<?php
include_once("footer.php");
?>
<?php
include_once("./header.php");
userAccount::profileUpdate();
userAccount::updateUser();
?>
<div class="container">
    <div class="row d-flex justify-content-center flex-wrap py-5">
        <div class="col px-3" style="max-width: max-content;">
            <form action="" method="post" enctype="multipart/form-data" id="imgUploadForm">
                <input type="hidden" name="email" value="<?= $_SESSION['user']['email'] ?>">
                <label for="ppimg" class="text-center">
                    <img src="<?= $_SESSION['user']['img'] ?? './images/pp.png' ?>" alt="" class="img-fluid rounded-circle" style="width:200px; height:200px; object-fit: cover;">
                    <h6>Click to change the image!</h6>
                    <div class="text-danger">
                        <?= userAccount::$errImg ?? null ?>
                    </div>
                    <div class="text-success">
                        <?= userAccount::$successImgUpload ?? null ?>
                    </div>
                </label>
                <input type="file" id="ppimg" name="ppimg" class="d-none">
            </form>
        </div>
        <div class="col px-3" style="max-width: max-content;">
            <?= userAccount::$err['userUpdate'] ?? null ?>
            <h2>Update Previous Data</h2>
            <form action="" method="post">
                <div class="mb-3 input-group">
                    <input type="text" class="form-control form-control-sm <?= (isset(userAccount::$err['uname'])) ? 'is-invalid' : null ?>" placeholder="Your Name" name="uname" value="<?= userAccount::$uname ?? $_SESSION['user']['name'] ?? null ?>">
                    <div class="invalid-feedback">
                        <?= userAccount::$err['uname'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control form-control-sm <?= (isset(userAccount::$err['uemail'])) ? 'is-invalid' : null ?>" placeholder="Your Email" name="uemail" value="<?= userAccount::$uemail ?? $_SESSION['user']['email'] ?? null ?>">
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
                            <label for="" class="form-check-label"><input type="radio" class="form-check-input" value="Male" name="gndr" <?= (isset(userAccount::$gndr) && userAccount::$gndr === "Male" ? "checked" : null) ?> <?= (!isset(userAccount::$gndr) && $_SESSION['user']['gender'] === "Male" ? "checked" : null) ?>>Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label"><input type="radio" class="form-check-input" value="Female" name="gndr" <?= (isset(userAccount::$gndr) && userAccount::$gndr === "Female" ? "checked" : null) ?> <?= (!isset(userAccount::$gndr) && $_SESSION['user']['gender'] === "Female" ? "checked" : null) ?>>Female</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= userAccount::$err['gndr'] ?? null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Update Your Data" class="btn btn-primary btn-sm" name="upuser123">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const ppimg = document.getElementById("ppimg");
    const imgUploadForm = document.getElementById("imgUploadForm");
    ppimg.addEventListener("change", () => {
        imgUploadForm.submit();
    })
</script>
<?php
include_once("./footer.php");
?>
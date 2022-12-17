<?php
include_once("./header.php");
if (isset($_POST['sub123'])) {
    $name = $_POST['name'];
    if (empty($name)) {
        $errName = "Please write your name";
    } else {
        $crrName = $name;
    }
}

?>
<div class="container">
    <div class="row min-vh-100">
        <div class="col-md-5 m-auto border shadow rounded p-4">
            <h2 class="mb-3">Add Student</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" placeholder="Your Name" name="name" class="form-control <?= (isset($errName)) ? 'is-invalid' : null; ?> <?= (isset($crrName)) ? 'is-valid' : null; ?>" value="<?= $name ?? null; ?>">
                    <div class="valid-feedback"><?= $crrName ?? null; ?></div>
                    <div class="invalid-feedback"><?= $errName ?? null; ?></div>
                </div>
                <div class="mb-3">
                    Gender :
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="Male" class="form-check-input"><label for="" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" value="Female" class="form-check-input"><label for="" class="form-check-label">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="Mobile Number" class="form-control">
                </div>
                <div class="mb-3">
                    <select name="city" class="form-select">
                        <option value="">--SELECT CITY--</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Joypurhat">Joypurhat</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Noyakhali">Noyakhali</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="mb-3">
                    <textarea name="dtls" id="" rows="3" placeholder="Student Details" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Sigup" name="sub123" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once("./footer.php") ?>
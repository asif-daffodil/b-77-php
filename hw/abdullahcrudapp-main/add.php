<?php include_once("header.php");
$conn = mysqli_connect("localhost", "root", "", "students");
if ($conn) {
    if (isset($_POST['sub1'])) {
        $first = $_POST['first'] ?? null;
        $last = $_POST['last'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $gender = $_POST['gender'] ?? null;
        if (empty($first)) {
            $errmsgf = "Please Write Your First Name";
        }
        if (empty($last)) {
            $errmsgl = "Please Write Your Last Name";
        }
        if (empty($phone)) {
            $errmsgp = "Please Write Your Phone Number";
        }
        if ($first && $last && $phone && $gender) {
            $insert_query = "INSERT INTO `students`(`first`, `last`, `phone`, `gender`) VALUES ('$first', '$last', $phone, '$gender')";
            $insert = $conn->query($insert_query);
            if ($insert) {
                echo "<script>alert('Student Added Successfully');location.href = 'index.php'</script>";
            }
        }
    }
}
?>
<h2 class="text-uppercase text-center py-3" style="background: #00ff5573">php complete crud app</h1>
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h3 class="mt-4">Add New Student</h3>
        <span class=" text-secondary">Complete the form below to add a new student</span>
        <a href="./index.php" class="my-4"><button class="btn btn-primary">All Student list</button></a>
        <form method="post" style="width : 50vw; min-width: 300px">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3 has-validation">
                        <label for="first">First Name</label>
                        <input type="text" class="form-control <?= isset($errmsgf) ? 'is-invalid' : null ?>" id="first" aria-describedby="emailHelp" name="first" placeholder="Enter Student's First Name" autocomplete="off" value="<?= $first ?? null ?>">
                        <div class="invalid-feedback">
                            Please choose a first name.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="last">Last Name</label>
                        <input type="text" class="form-control  <?= isset($errmsgl) ? 'is-invalid' : null ?>" id="last" aria-describedby="emailHelp" name="last" placeholder="Enter Student's Last Name" autocomplete="off" value="<?= $last ?? null ?>">
                        <div class="invalid-feedback">
                            Please choose a last name
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="phone">Phone Number</label>
                        <div class="d-flex">
                            <select>
                                <option selected>+880</option>
                            </select>
                            <input type="number" class="form-control <?= isset($errmsgp) ? 'is-invalid' : null ?>" id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter Student's Phone Number" autocomplete="off" value="<?= $phone ?>">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        Please choose a phone number
                    </div>

                </div>
                <div class="col">
                    <div class="mb-4">
                        <label for="" class="me-4 mb-2">Gender:</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success mt-4" name="sub1">Submit</button>
            </div>
        </form>
    </div>


    </div>
    <?php include_once("footer.php") ?>
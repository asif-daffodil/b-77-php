<?php include_once("header.php");
$conn = mysqli_connect("localhost", "root", "", "students");
if ($conn) {
    $id = $_GET['id'];

    if (!isset($id)) {
        header("loaction: header.php");
    } else {
        $select_query = "SELECT * from `students` WHERE `id` = $id";
        $select = $conn->query($select_query);
        $data = $select->fetch_assoc();
    }
}
?>
<h2 class="text-uppercase text-center py-3" style="background: #00ff5573">php complete crud app</h1>
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h3 class="mt-4">Update Student Details</h3>
        <span class=" text-secondary">Complete the form below to update student details</span>
        <a href="./index.php" class="my-4"><button class="btn btn-primary">All Student list</button></a>
        <form method="post" style="width : 50vw; min-width: 300px">
        <input type="hidden" name="id" value="<?=$id?>">
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3 has-validation">
                        <label for="first">First Name</label>
                        <input type="text" class="form-control <?= isset($errmsgf) ? 'is-invalid' : null ?>" id="first" aria-describedby="emailHelp" name="first" placeholder="Enter Student's First Name" autocomplete="off" value="<?=$data['first']?>">
                        <div class="invalid-feedback">
                            Please choose a first name.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="last">Last Name</label>
                        <input type="text" class="form-control  <?= isset($errmsgl) ? 'is-invalid' : null ?>" id="last" aria-describedby="emailHelp" name="last" placeholder="Enter Student's Last Name" autocomplete="off" value="<?=$data['last']?>">
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
                            <input type="number" class="form-control <?= isset($errmsgp) ? 'is-invalid' : null ?>" id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter Student's Phone Number" autocomplete="off" value="<?=$data['phone']?>">
                        </div>
                        <div class="invalid-feedback">
                            Please choose a phone number
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="mb-4">
                        <label for="" class="me-4 mb-2">Gender:</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" <?= (!isset($_POST['gender']) && $data['gender'] == 'Male') ? 'checked' : null?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" <?= (!isset($_POST['gender']) && $data['gender'] == 'Female') ? 'checked' : null?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="sub1">Submit</button>
        </form>
    </div>


    </div>
    
    <?php
    if (isset($_POST['sub1'])) {
        $eid = $_POST['id'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        if (!empty($eid) && !empty($first) && !empty($last) && !empty($phone) && !empty($gender)) {
            $update_query = "UPDATE `students` SET `first`='$first',`last`='$last',`phone`=$phone, `gender`='$gender' WHERE `id`= $eid";
            $update = $conn->query($update_query);
            if ($update) {
                echo "<script>alert('Student Updated Successfully');location.href = 'index.php'</script>";
            }
        }
    }

    include_once("footer.php") ?>
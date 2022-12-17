<?php
include_once("./header.php");
if(isset($_POST['addpro123'])){
    $name = $_POST['name'];
    $rprice = $_POST['rprice'];
    $dprice = $_POST['dprice'];
    $description = $_POST['description'];

    $userFileName = $_FILES["proImg"]["name"];
    $tempName = $_FILES["proImg"]["tmp_name"];

    $x = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $ext = pathinfo($userFileName, PATHINFO_EXTENSION);
    (!is_dir("../images/products")) ? mkdir("../images/products") : null;
    $uniqueName = uniqid() . rand(100000, 999999) . substr(str_shuffle($x), 0, 6) . date("hismdYDfla") . "." . $ext;
    $destination = "./images/products/$uniqueName";
    $adminDestination = "../images/products/$uniqueName";
    $move = move_uploaded_file($tempName, $adminDestination);

    if (!$move) {
        echo "<script>toastr.error('Image upload fail')</script>";
    } else {
        if(!empty($name) && !empty($rprice) && !empty($dprice) && !empty($description)){
            $insert = $conn->query("INSERT INTO `products` ( `name`, `rprice`, `dprice`, `img`, `description`) VALUES ('$name', '$rprice', '$dprice', '$destination', '$description')");
        if (!$insert) {
            echo "<script>toastr.error('Database problem')</script>";
        } else {
            echo "<script>toastr.success('Product added successfully')</script>";
            $name = $rprice = $dprice = $description = null;
        }
        }
    }
}   
?>
<div class="container-fluid">
    <div class="row min-vh-100">
        <?php
        include_once("./sidebar.php");
        ?>
        <div class="col-md-10">
            <?php include_once("./navbar.php") ?>
            <h4>Add Product</h4>
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" placeholder="Product Name" name="name" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="number" placeholder="Regular Price" name="rprice" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="number" placeholder="Discount Price" name="dprice" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Short Description" name="description" required autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" id="ppimg" name="proImg" required  accept="image/png, image/jpeg, image/jpg, image/gif">
                        </div>
                        <button type="submit" name="addpro123" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>
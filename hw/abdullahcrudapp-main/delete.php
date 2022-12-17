<?php include_once("header.php");
$id = $_GET['id'];

if (!isset($id)) {
    header("loaction: header.php");
} else {
    $conn = mysqli_connect("localhost", "root", "", "students");
    $select_query = "SELECT * from `students` WHERE `id` =$id";
    $select = $conn->query($select_query);

?>
    <h2 class="text-uppercase text-center py-3" style="background: #00ff5573">php complete crud app</h1>

        <div class="d-flex flex-column my-5 container ">
            <div class="bg-light card4 p-4">
                <h2 class="mb-2">Are you sure you want to delete this Student's Details?</h2>
                <div class="d-flex">
                    <a href="./index.php" class="btn btn-danger me-2">No</a>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="submit" name="sub" value="Yes" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    <?php
    if ($select->num_rows != 1) {
        header("location: index.php");
    } else {
        if (isset($_POST['sub'])) {
            $uid = $_POST['id'];
            $delete_query = "DELETE FROM `students` WHERE `id` = $uid";
            $delete = $conn->query($delete_query);
            if ($delete) {
                echo "<script>alert('Student Delete succuessful');location.href='index.php'</script>";
            } else {
                echo "<script>alert('Student Delete Succuessful');</script>";
            }
        }
    }
}

    ?>

    <?php include_once("footer.php") ?>
<?php
if (!isset($_GET['id'])) {
    header("location: read.php");
} else {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "b77practice");
    $try_to_select_query = "SELECT * FROM `students` WHERE `id` = $id";
    $try_to_select = $conn->query($try_to_select_query);
    if ($try_to_select->num_rows != 1) {
        header("location: read.php");
    } else {
?>
        <h2>Do you realy want to delete the data?</h2>
        <a href="./read.php">
            <button>No</button>
        </a>
        <form action="" method="post" style="display: inline;">
            <input type="hidden" value="<?= $id ?? null ?>" name="id">
            <input type="submit" value="Yes" name="del123">
        </form>
<?php
    }
}

if (isset($_POST['del123'])) {
    $uid = $_POST['id'];
    $delete_query = "DELETE FROM `students` WHERE `id` = $uid";
    $del = $conn->query($delete_query);
    if (!$del) {
        echo "ha ha ha";
    } else {
        echo "<script>alert('student deleted successfully');location.href='read.php'</script>";
    }
}

<!-- delte advance system -->


<?php
include_once("./header.php");

if(!isset($_GET['id'])){
   header('location:read.php');
}else{
    $id = $_GET['id'];
    $try_to_select_query = "SELECT * FROM `user_data` WHERE `id` = $id";
    $try_to_select = $connet->query($try_to_select_query);
    if($try_to_select->num_rows != 1){
        header('location : ./read.php');
    }else{
        ?>


<div class="container">
    <div class="row min-vh-100">
        <div class="m-auto text-center">
            <div class="h3">
                Do you really want to delete the data of Register ID No. <span
                    class="text-danger underline"><?= $id ?? null ?></span>?
            </div>
            <div class="mt-4">
                <a href="./read.php"><button class="btn btn-dark">No</button></a>
                <form action="" method="POST" class="d-inline ms-2">
                    <input type="hidden" value="<?= $id ?? null ?>" name="id">
                    <input type="submit" name="dlt123" value="Yes" class="btn btn-danger">
                </form>
            </div>
        </div>

    </div>
</div>


<?php
}
}

if(isset($_POST['dlt123'])){
    $userId = $_POST['id'];
    $delete_query = "DELETE FROM `user_data` WHERE `id` = $userId";
    $delete = $connet->query($delete_query);
    if(!$delete){
        echo "<span>hahaha</span>";
    }else{
        echo "<script>alert('Data deleted succsessfully.');location.href='./read.php'</script>";
    }
}


?>



<?php
include_once("./footer.php");
?>
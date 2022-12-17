<?php
include_once("./header.php");
?>
<div class="container-fluid">
    <div class="col-12">
        <img src="./images/banner.jpg" alt="" class="img-fluid">
    </div>
</div>

<?php
if (isset($_GET['success'])) {
?>
    <script>
        toastr.success('Login Successfull');
        setTimeout(() => {
            location.href = "index.php";
        }, 5000)
    </script>
<?php
}
?>
<?php
include_once("./homeProducts.php");
include_once("./homeContact.php");
include_once("./footer.php");
?>
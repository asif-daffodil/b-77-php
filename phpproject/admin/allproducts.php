<?php
include_once("./header.php");
?>
<div class="container-fluid">
    <div class="row min-vh-100">
        <?php
        include_once("./sidebar.php");
        $selectProducts = $conn->query("SELECT * FROM `products`");

        $pageNo = isset($_GET['pageNo']) ? $_GET['pageNo']:header("location: $pageName?pageNo=1");
        $totalResult = $selectProducts->num_rows;
        $productPerPage = 5;
        $totalPage = ceil($totalResult / $productPerPage);
        $startPont = ($pageNo - 1) * $productPerPage;

        $showPro = $conn->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT $startPont, $productPerPage");
        ?>
        <div class="col-md-10">
            <?php include_once("./navbar.php") ?>
            <h4>All Products</h4>
            <?php
            if ($selectProducts->num_rows > 0) {
            ?>
                <table class="table">
                    <tr>
                        <th>S.N.</th>
                        <th>Product Img</th>
                        <th>Product Name</th>
                        <th>Regular Price</th>
                        <th>Descount Price</th>
                        <th>Action</th>
                    </tr>
                    <?php $sn = $startPont + 1;
                    while ($data = $showPro->fetch_object()) { ?>
                        <tr>
                            <td><?= $sn ?></td>
                            <td><img src=".<?= $data->img ?>" alt="" style="height: 50px"></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->rprice ?></td>
                            <td><?= $data->dprice ?></td>
                            <td>
                                <a href="" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $sn++;
                    } ?>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <?php for ($i=1; $i <= $totalPage ; $i++) {  ?>
                            <li class="page-item <?= ($i == $pageNo)? 'active':null ?> "><a class="page-link" href="<?= "./$pageName?pageNo=$i" ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>
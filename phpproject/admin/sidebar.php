<div class="col-md-2 border-end border-dark bg-primary text-light">
    <h4 class="py-3"><a href="./" class="text-white text-decoration-none">Admin Pannel</a></h4>
    <!-- Example single danger button -->
    <div class="">

        <div class="text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
            Action
        </div>
        <ul class="dropdown-menu <?= $pageName == 'allproducts.php' || $pageName == 'addnewproduct.php' ? 'show' : null ?>">
            <li><a class="dropdown-item <?= $pageName == "allproducts.php" ? 'active' : null ?>" href="./allproducts.php">All Products</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item <?= $pageName == "addnewproduct.php" ? 'active' : null ?>" href="./addnewproduct.php">Add New Products</a></li>
        </ul>
        <ul class="dropdown-menu show">
            <li><a class="dropdown-item <?= $pageName == "allproducts.php" ? 'active' : null ?>" href="./allproducts.php">All Products</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item <?= $pageName == "addnewproduct.php" ? 'active' : null ?>" href="./addnewproduct.php">Add New Products</a></li>
        </ul>
    </div>
</div>
<!-- demo comment -->
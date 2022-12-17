<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="./">
            <img src="./images/logo.png" alt="" style="max-height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-phone"></i> +8801955517560 |
            <i class="fa-solid fa-envelope"></i> asif@dti.ac
        </a>
        <div class="collapsed">
            <ul class="navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./account.php">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>
                <?php } else {
                    include_once("./classes/db.php");
                    $email = $_SESSION['user']['email'];
                    $check_user_img_query = "SELECT * FROM `users` WHERE `email` = '$email'";
                    $check_user_img = db::$conn->query($check_user_img_query);
                    $user_img = $check_user_img->fetch_object();
                ?>
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= (empty($_SESSION['user']['img'])) ? './images/pp.png' : $user_img->img  ?>" alt="" class="img-fluid rounded-circle" style="height:20px; width:20px; object-fit: cover">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./profileSettings.php">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="./changePassword.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Log Out</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($_SESSION['user']['role'] === 'admin') { ?>
                                <li><a class="dropdown-item" href="./admin">Admin</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                <form class="d-flex input-group" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="input-group-text" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </ul>
        </div>
    </div>
</nav>
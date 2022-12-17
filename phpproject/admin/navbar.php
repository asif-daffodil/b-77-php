<nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-3">
    <div class="container-fluid">
        <div class="collapsed">
            <ul class="navbar-nav">
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../account.php">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>
                <?php } else {
                    include_once("../classes/db.php");
                    $email = $_SESSION['user']['email'];
                    $check_user_img_query = "SELECT * FROM `users` WHERE `email` = '$email'";
                    $check_user_img = db::$conn->query($check_user_img_query);
                    $user_img = $check_user_img->fetch_object();
                ?>
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= (empty($_SESSION['user']['img'])) ? './images/pp.png' : '../' . $user_img->img  ?>" alt="" class="img-fluid rounded-circle" style="height:20px; width:20px; object-fit: cover">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../profileSettings.php">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="../changePassword.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php">Log Out</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../">Home</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- hellow world -->
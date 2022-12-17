<?php

if (isset($_POST['sub123'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    if (empty($uname)) {
        $errUname = "<span style='color: red'>Please provide the user name</span>";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $uname)) {
        $errUname = "<span style='color: red'>Invalid user name</span>";
    }

    if (empty($uemail)) {
        $errUemail = "<span style='color: red'>please provide the email address</span>";
    } elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
        $errUemail = "<span style='color: red'>Invalid email address</span>";
    }
}
?>
<form action="" method="POST">
    <input type="text" name="uname" placeholder="User Name" value="<?= $uname ?? null ?>">
    <?= $errUname ?? null; ?>
    <br><br>

    <input type="text" name="uemail" placeholder="Email Address" value="<?= $uemail ?? null ?>">
    <?= $errUemail ?? null; ?>
    <br><br>
    <input type="submit" name="sub123">
</form>
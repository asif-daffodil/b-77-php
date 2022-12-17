<?php
include_once("./navbar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_pre_data_query = "SELECT * FROM `students` WHERE `id` = $id";
    $get_pre_data = $conn->query($get_pre_data_query);
    if ($get_pre_data->num_rows != 1) {
        echo "<h2>No Data Found</h2>";
    } else {
        $pre_data = $get_pre_data->fetch_assoc();
?>
        <form action="" method="post">
            <input type="text" placeholder="Your Name" name="name" value="<?= $pre_data['name'] ?? $name ?? null ?>"><br><br>
            Gender :
            <input type="radio" name="gender" value="Male" <?= (!isset($gender) && $pre_data['gender'] == 'Male') ? "checked" : null ?> <?= (isset($gender) && $gender == 'Male') ? "checked" : null ?>>Male
            <input type="radio" name="gender" value="Female" <?= (!isset($gender) && $pre_data['gender'] == 'Female') ? "checked" : null ?> <?= (isset($gender) && $gender == 'Female') ? "checked" : null ?>>Female
            <br><br>
            <input type="text" name="phone" placeholder="Mobile Number" value="<?= $pre_data['phone'] ?? $name ?? null ?>">
            <br><br>
            <select name="city">
                <option value="<?= (!isset($city)) ? $pre_data['city'] : "--SELECT CITY--" ?>"><?= (!isset($city)) ? $pre_data['city'] : "--SELECT CITY--" ?></option>
                <option value="Dhaka">Dhaka</option>
                <option value="Joypurhat">Joypurhat</option>
                <option value="Barishal">Barishal</option>
                <option value="Noyakhali">Noyakhali</option>
                <option value="Others">Others</option>
            </select>
            <br><br>
            <textarea name="dtls" id="" cols="30" rows="10" placeholder="Student Details"><?= $pre_data['dtls'] ?? $dtls ?? null ?></textarea>
            <br><br>
            <input type="submit" value="update" name="sub123">
        </form>
<?php
    }
}

if (isset($_POST['sub123'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'] ?? null;
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $dtls = $_POST['dtls'];

    if (!empty($name) && !empty($gender) && !empty($phone) && !empty($city) && !empty($dtls)) {
        $update_query = "UPDATE `students` SET `name`='$name',`gender`='$gender',`phone`=$phone,`city`='$city',`dtls`='$dtls' WHERE `id` = $id";
        $update = $conn->query($update_query);
        if (!$update) {
            echo "ha ha ha";
        } else {
            echo "<script>alert('Student updated successfully');location.href='read.php'</script>";
        }
    }
}

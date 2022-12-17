<?php
include_once("./navbar.php");
if (isset($_POST['sub123'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'] ?? null;
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $dtls = $_POST['dtls'];

    if (!empty($name) && !empty($gender) && !empty($phone) && !empty($city) && !empty($dtls)) {
        $insert_query = "INSERT INTO `students`(`name`, `gender`, `phone`, `city`, `dtls`) VALUES ('$name', '$gender', $phone, '$city', '$dtls')";
        $insert = $conn->query($insert_query);
        if (!$insert) {
            echo "ha ha ha";
        } else {
            echo "<script>alert('Student added successfully')</script>";
        }
    }
}

?>

<form action="" method="post">
    <input type="text" placeholder="Your Name" name="name"><br><br>
    Gender :
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br><br>
    <input type="text" name="phone" placeholder="Mobile Number">
    <br><br>
    <select name="city">
        <option value="">--SELECT CITY--</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Joypurhat">Joypurhat</option>
        <option value="Barishal">Barishal</option>
        <option value="Noyakhali">Noyakhali</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    <textarea name="dtls" id="" cols="30" rows="10" placeholder="Student Details"></textarea>
    <br><br>
    <input type="submit" value="Sigup" name="sub123">
</form>
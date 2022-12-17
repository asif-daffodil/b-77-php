<?php   
include_once("./header.php");

  if(isset($_POST['sub123'])){
    $id =  $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $date_of_birth = $_POST['date_of_birth'];
    
    // user name 
    if(empty($name)){
        $errorName = "<span class='text-danger'>Enter your name.</span>";   
    }elseif(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errorName = "<span class='text-danger'>Invalid Username.</span>";
    }else{
        $correctName = $name;
    }
    
    // email
    if(empty($email)){
        $errorEmail = "<span class='text-danger'>Enter your email address.</span>";   
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errorEmail = "<span class='text-danger'>Invalid email address.</span>";
    }else{
        $correctEmail = $email;
    }

    // password
    if(empty($password)){
        $errorPassword = "<span class='text-danger'>Enter email password.</span>";   
    }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z]).{8,}$/',$password)){
        $errorPassword = "<span class='text-danger'>Enter a strong password.</span>";
    }else{
        $correctPassword = $password;
    }

    // gender 
    if(empty($gender)){
        $errorGender = "<span class='text-danger'>Checked your gender please.</span>";
    }else {
        $correctGender = $_POST['gender'];
    }
    
    // city
    if(empty($city)){
        $errorCity = "<span class='text-danger'>Select your town.</span>";   
    }else{
        $correctCity = $city;
    }
    
    // date_of_birth
    if(empty($date_of_birth)){
        $errordate_of_birth = "<span class='text-danger'>Enter your birthday.</span>";   
    }else{
        $correctdate_of_birth = $date_of_birth;
    }
    

    if(!empty($correctName) && !empty($correctEmail)  && !empty($correctPassword) && !empty($correctGender) && !empty($correctCity) && !empty($correctdate_of_birth)){
        $update_query = "UPDATE `user_data` SET `name`='$name',`email`='$email',`password`='$password',`date_of_birth`='$date_of_birth',`city`='$city',`gender`='$gender' WHERE `id` = $id";
        $update = $connet->query($update_query);

        if($update){
            echo "<script>alert('Data updated Succsessully.');location.href='./read.php?'</script>";
}
}
}



if (isset($_GET['id'])){
$id =  $_GET['id'];
$get_pre_data_query = "SELECT * FROM `user_data` WHERE `id`= $id";
$get_pre_data= $connet->query($get_pre_data_query);

if($get_pre_data->num_rows != 1){
    echo "<span>No data found.</span>";
}else{
    $pre_data = $get_pre_data->fetch_assoc();
    ?>


<div class="container">
    <div class="row min-vh-100">
        <div class="col-11 col-md-5 col-lg-4 m-auto border shadow-sm rounded px-2 px-md-4 pt-4">
            <div class="mb-3">
                <h5 class="text-primary">
                    Update the data of register no <span class="text-success"><?= $id ?? null ?></span>.</h5>
            </div>

            <form method="POST">
                <!-- name -->
                <div class="mb-2">
                    <label for="name">
                        <span class="text-success">Name :</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control <?= isset($errorName) ? "is-invalid" : null ?>
                    <?= isset($correctName) ? "is-valid" : null ?>"
                        value="<?=  $pre_data['name'] ?? $correctName || $name ??   null ?> ">
                    <?= $errorName ?? null ?>
                </div>

                <!-- email -->
                <div class=" mb-2">
                    <label for="email">
                        <span class="text-success">Email :</span>
                    </label>
                    <input type="text" name="email" id="email"
                        class="form-control <?= isset($errorEmail) ? "is-invalid" : null ?> <?= isset($correctEmail) ? "is-valid" : null ?>"
                        value="<?= $pre_data['email'] ?? $correctEmail || $email ?? null ?>">
                    <?= $errorEmail ?? null ?>
                </div>

                <!-- password -->
                <div class="mb-3">
                    <label for="password">
                        <span class="text-success">Password :</span>
                    </label>
                    <input type="text" name="password" id="password"
                        class="form-control <?= isset($errorPassword) ? "is-invalid" : null ?> <?= isset($correctPassword) ? "is-valid" : null ?>"
                        value="<?= $pre_data['password'] ?? $correctPassword ?? null ?>">
                    <?= $errorPassword ?? null ?>
                </div>

                <!-- gender -->
                <div class=" mb-3">
                    <table>
                        <tr>
                            <td>
                                <span class="d-block text-success"> Gender :</span>
                            </td>
                            <td>
                                <input type="radio" name="gender" id="male" value="Male"
                                    <?= (!isset($gender)) && $pre_data['gender'] == "Male" ? "checked" : null ?>
                                    <?= (isset($gender)) && $correctGender == "Male" ? "checked" : null ?>>
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="Female"
                                    <?= (!isset($gender)) && $pre_data['gender'] == "Female" ? "checked" : null ?>
                                    <?= (isset($gender)) && $correctGender == "Female" ? "checked" : null ?>>
                                <label for="female">Female</label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" name="gender" id="Others" value="Others"
                                    <?= (!isset($gender)) && $pre_data['gender'] == "Others" ? "checked" : null ?>
                                    <?= (isset($gender)) && $gender == "Others" ? "checked" : null ?>>
                                <label for="Others">Others</label>
                            </td>
                        </tr>
                    </table>


                </div>
                <hr>

                <!-- city -->
                <div class="row">
                    <div class="mb-3 col-8 col-xl-5">
                        <span class="text-success">Your Town :</span>
                        <select name="city" class="form-select
                        <?= (isset($errorCity)) ? "is-invalid" : null ?>
                        <?= (isset($correctCity)) ? "is-valid" : null ?>
                        ">
                            <option value="<?= $pre_data['city'] ?? null ?>"><?= (!isset($city)) ? $pre_data['city'] : "--
                                Select
                                Area --" ?>
                            </option>
                            <option value=" Dhaka">Dhaka
                            </option>
                            <option value="Rajsahi">Rajsahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Shylet">Shylet</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Bagura">Bagura</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Lalbag">Lalbag</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <? $errorCity ?? null ?>
                        </select>

                    </div>

                    <!-- birthday -->
                    <div class="mb-3 col-8 col-xl-6">
                        <label for="birthday">Birthday :</label>
                        <input type="date" id="birthday" name="date_of_birth"
                            class="form-control <?= isset($errordate_of_birth) ? "is-invalid" : null ?><?= isset($correctdate_of_birth) ? "is-valid" : null ?>"
                            value="<?= $pre_data['date_of_birth'] ?? null ?>">
                        <?= $errordate_of_birth ?? null ?>
                    </div>
                </div>

                <!-- button  -->

                <div class=" mb-4 mt-2">
                    <input type="button" onclick="location.href='./read.php'" class="btn btn-dark" value="Back">
                    <input type="reset" name="sub123" class="btn btn-primary shadow-sm" value="Reset"
                        onclick="location.href='edit.php?id=<?= $pre_data['id'] ?>'">
                    <input type="submit" name="sub123" class="btn btn-success shadow-sm" value="Update">
                </div>








            </form>
        </div>
    </div>
</div>



<?php
}

}


?> <?php
include_once("./footer.php");
?>
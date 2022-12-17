<?php
include_once("./classes/db.php");
class userAccount
{
    public static array $err = [];
    public static string $errImg;
    public static string $successImgUpload;
    public static array $success = [];
    public static string $uname;
    public static string $uemail;
    public static string $gndr;
    public static string $pass;
    public static string $cpass;
    public static string $opass;
    public static string $suemail;
    public static string $supass;

    protected static array $genderList = ["Male", "Female"];
    protected function __construct()
    {
        return;
    }

    protected static function safuda($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    public static function registrationValidation(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup123'])) {
            userAccount::$uname = $uname = userAccount::safuda($_POST['uname']);
            userAccount::$uemail = $uemail = userAccount::safuda($_POST['uemail']);
            userAccount::$gndr = $gndr = $_POST['gndr'] ?? "";
            userAccount::$pass = $pass = userAccount::safuda($_POST['pass']);
            userAccount::$cpass = $cpass = userAccount::safuda($_POST['cpass']);

            if (empty($uname)) {
                userAccount::$err['uname'] = "Please wrtite your name";
            } elseif (!preg_match("/[A-Za-z. ]/", $uname)) {
                userAccount::$err['uname'] = "Invalid name format";
            } else {
                $crrUname = db::$conn->real_escape_string($uname);
            }

            if (empty($uemail)) {
                userAccount::$err['uemail'] = "Please wrtite your email address";
            } elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
                userAccount::$err['uemail'] = "Invalid email format";
            } else {
                $check_pre_email_query = "SELECT * FROM `users` WHERE `email` = '$uemail'";
                $check_pre_email = db::$conn->query($check_pre_email_query);
                if ($check_pre_email->num_rows > 0) {
                    userAccount::$err['uemail'] = "Email address already exicts";
                } else {
                    $crrUemail = db::$conn->real_escape_string($uemail);
                }
            }

            if (empty($gndr)) {
                userAccount::$err['gndr'] = "Please select your gnder";
            } elseif (!in_array($gndr, userAccount::$genderList)) {
                userAccount::$err['gndr'] = "Paknami bondho korun";
            } else {
                $crrGndr = db::$conn->real_escape_string($gndr);
            }

            if (empty($pass)) {
                userAccount::$err['pass'] = "Please write your password";
            } elseif (!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $pass)) {
                userAccount::$err['pass'] = "Please provide a strong password";
            } else {
                $crrPass = db::$conn->real_escape_string($pass);
            }

            if (empty($cpass)) {
                userAccount::$err['cpass'] = "Please write the confirm password";
            } elseif ($pass !== $cpass) {
                userAccount::$err['cpass'] = "Password didn't match";
            } else {
                $crrCpass = db::$conn->real_escape_string($cpass);
            }

            if (isset($crrUname) && isset($crrUemail) && isset($crrGndr) && isset($crrPass) && isset($crrCpass)) {
                $convertedPass = md5($crrCpass);
                $inser_query = "INSERT INTO `users` (`name`, `email`, `gender`, `password`) VALUES ('$crrUname', '$crrUemail', '$crrGndr', '$convertedPass')";
                $insert = db::$conn->query($inser_query);
                if (!$insert) {
                    userAccount::$err['insert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> ' . db::$conn->error . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    /* userAccount::$success['insert'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> registration completed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; */
                    $_SESSION['user'] =  ["name" => $crrUname, "email" => $crrUemail, "gender" => $crrGndr];
                    return true;
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin123'])) {
            userAccount::$suemail = $suemail = userAccount::safuda($_POST['suemail']);
            userAccount::$supass = $supass = userAccount::safuda($_POST['supass']);

            if (empty($suemail)) {
                userAccount::$err['suemail'] = "Please wrtite your email address";
            } else {
                $crrSuemail = db::$conn->real_escape_string($suemail);
            }

            if (empty($supass)) {
                userAccount::$err['supass'] = "Please write your password";
            } else {
                $crrSupass = db::$conn->real_escape_string($supass);
            }

            if (!empty($crrSuemail) && !empty($crrSupass)) {
                $crrSupass = md5($crrSupass);
                $check_user_query = "SELECT * FROM `users` WHERE `email` = '$crrSuemail' AND `password` = '$crrSupass'";
                $check_user = db::$conn->query($check_user_query);
                if ($check_user->num_rows != 1) {
                    userAccount::$err['sinsert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong>Invalid email or password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    $uinfo = $check_user->fetch_object();
                    $crrUname = $uinfo->name;
                    $crrGndr = $uinfo->gender;
                    $img = $uinfo->img;
                    $role = $uinfo->role;
                    $_SESSION['user'] =  ["name" => $crrUname, "email" => $crrSuemail, "gender" => $crrGndr, "img" => $img, "role" => $role];
                    return true;
                }
            }
        }
        return false;
    }

    public static function profileUpdate(): string
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['email'])) {
            $userEmail = $_POST["email"];
            $userFileName = $_FILES["ppimg"]["name"];
            $tempName = $_FILES["ppimg"]["tmp_name"];

            if (empty($tempName)) {
                userAccount::$errImg = "Please upload a file";
            } elseif (!getimagesize($tempName)) {
                userAccount::$errImg = "Invalid image format.";
            } else {
                $selectPreUserDataQuery = "SELECT  * FROM `users` WHERE `email` = '$userEmail'";
                $selectPreUserData =  db::$conn->query($selectPreUserDataQuery);
                if ($selectPreUserData->num_rows != 1) {
                    userAccount::$errImg = "User data not found!";
                } else {
                    $selectPreUser = $selectPreUserData->fetch_object();
                    if ($selectPreUser->img != null) {
                        unlink($selectPreUser->img);
                    }
                    $userId = $selectPreUser->id;
                    $x = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                    $ext = pathinfo($userFileName, PATHINFO_EXTENSION);
                    (!is_dir("./images/users/$userId")) ? mkdir("./images/users/$userId") : null;
                    $uniqueName = uniqid() . rand(100000, 999999) . substr(str_shuffle($x), 0, 6) . date("hismdYDfla") . "." . $ext;
                    $destination = "./images/users/$userId/$uniqueName";
                    $move = move_uploaded_file($tempName, $destination);
                    if (!$move) {
                        userAccount::$errImg = "Image upload failed";
                    } else {
                        $imgUpdateQuery = "UPDATE `users` SET `img` = '$destination' WHERE `email` = '$userEmail'";
                        $imgUpdate = db::$conn->query($imgUpdateQuery);
                        if (!$imgUpdate) {
                            userAccount::$errImg = "Something went wrong!";
                        } else {
                            $_SESSION['user']['img'] = $destination;
                            userAccount::$successImgUpload = "Image upload successfully";
                        }
                    }
                }
            }
        }
        return "";
    }

    public static function updateUser(): string
    {
        if (isset($_POST['upuser123'])) {
            userAccount::$uname = $uname = userAccount::safuda($_POST['uname']);
            userAccount::$uemail = $uemail = userAccount::safuda($_POST['uemail']);
            userAccount::$gndr = $gndr = userAccount::safuda($_POST['gndr'] ?? null);

            if (empty($uname)) {
                userAccount::$err['uname'] = "Please wrtite your name";
            } elseif (!preg_match("/[A-Za-z. ]/", $uname)) {
                userAccount::$err['uname'] = "Invalid name format";
            } else {
                $crrUname = db::$conn->real_escape_string($uname);
            }

            if (empty($uemail)) {
                userAccount::$err['uemail'] = "Please wrtite your email address";
            } elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
                userAccount::$err['uemail'] = "Invalid email format";
            } else {
                if ($_SESSION['user']['email'] != $uemail) {
                    $check_pre_email_query = "SELECT * FROM `users` WHERE `email` = '$uemail'";
                    $check_pre_email = db::$conn->query($check_pre_email_query);
                    if ($check_pre_email->num_rows > 0) {
                        userAccount::$err['uemail'] = "Email address already exicts";
                    } else {
                        $crrUemail = db::$conn->real_escape_string($uemail);
                    }
                } else {
                    $crrUemail = db::$conn->real_escape_string($uemail);
                }
            }

            if (empty($gndr)) {
                userAccount::$err['gndr'] = "Please select your gnder";
            } elseif (!in_array($gndr, userAccount::$genderList)) {
                userAccount::$err['gndr'] = "Paknami bondho korun";
            } else {
                $crrGndr = db::$conn->real_escape_string($gndr);
            }

            if (isset($crrUname) && isset($crrUemail) && isset($crrGndr)) {
                $uemail = $_SESSION['user']['email'];
                $updateUserQuery = "UPDATE `users` SET `name` = '$crrUname', `email` = '$crrUemail',  `gender` = '$crrGndr' WHERE `email` = '$uemail'";
                $updateUser = db::$conn->query($updateUserQuery);
                if (!$updateUser) {
                    userAccount::$err['userUpdate'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> ' . db::$conn->error . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    $userImg = $_SESSION['user']['img'];
                    userAccount::$err['userUpdate'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> User updated!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    $_SESSION['user'] =  ["name" => $crrUname, "email" => $crrUemail, "gender" => $crrGndr, "img" => $userImg];
                }
            }
        }
        return "";
    }

    public static function changePass(): string
    {
        if (isset($_POST['cp123'])) {
            userAccount::$opass = $opass = $_POST["opass"];
            userAccount::$pass = $pass = $_POST["pass"];
            userAccount::$cpass = $cpass = $_POST["cpass"];

            if (empty($pass)) {
                userAccount::$err['pass'] = "Please write your password";
            } elseif (!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $pass)) {
                userAccount::$err['pass'] = "Please provide a strong password";
            } else {
                $crrPass = db::$conn->real_escape_string($pass);
            }

            if (empty($opass)) {
                userAccount::$err['opass'] = "Please write the old password";
            } else {
                $uemail = $_SESSION['user']['email'];
                $checkOpassQuery = "SELECT * FROM `users` WHERE `email` = '$uemail'";
                $checkOpass = db::$conn->query($checkOpassQuery);
                $checkOpassData = $checkOpass->fetch_object();
                $realOpass = $checkOpassData->password;
                if (md5($opass) != $realOpass) {
                    userAccount::$err['opass'] = "Old password didnot matched!";
                } elseif ($realOpass == md5($pass)) {
                    userAccount::$err['pass'] = "Please provide a new password";
                } else {
                    $crrOpass = db::$conn->real_escape_string($opass);
                }
            }

            if (empty($cpass)) {
                userAccount::$err['cpass'] = "Please write the confirm password";
            } elseif ($pass !== $cpass) {
                userAccount::$err['cpass'] = "Password didn't match";
            } else {
                $crrCpass = db::$conn->real_escape_string($cpass);
            }

            if (isset($crrPass) && isset($crrOpass) && isset($crrCpass)) {
                $convertedPass = md5($crrCpass);
                $upPassQuery = "UPDATE `users` SET `password` = '$convertedPass' WHERE `email` = '$uemail'";
                $upPass = db::$conn->query($upPassQuery);
                if ($upPass) {
                    userAccount::$opass = userAccount::$pass = userAccount::$cpass = "";
                    echo "<script>toastr.success('Password changed Successfull');</script>";
                } else {
                    echo "<script>toastr.error('Something went wrong');</script>";
                }
            }
        }
        return "";
    }
}

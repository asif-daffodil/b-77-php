<?php
//create function with an exception
/* function checkNum($number)
{
    if ($number > 10) {
        throw new Exception("Value must be 10 or below");
    }
    return true;
}

//trigger exception in a "try" block

try {
    checkNum(9);
    echo 'If you see this, the number is 10 or below';
} catch (Exception $e) {
    echo "Message : " . $e->getMessage();
} */

/* class customException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

$email = "abir@dipti.com.bd";

try {
    //check if
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //throw exception if email is not valid
        throw new customException($email);
    }
} catch (customException $e) {
    //display custom message
    echo $e->errorMessage();
}
 */

/* class customException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

$email = "someone@example.com";

try {
    //check if
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        //throw exception if email is not valid
        throw new customException($email);
    }
    //check for "example" in mail address
    if (strpos($email, "example") !== FALSE) {
        throw new Exception("$email is an example e-mail");
    }
} catch (customException $e) {
    echo $e->errorMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} */

/* echo "<pre>";
print_r($_SERVER);
echo "</pre>"; */

echo pathinfo(basename($_SERVER["PHP_SELF"]))["extension"];
// $_SERVER["REQUEST_METHOD"];
echo "<br>";
$name = $_GET['name'] ?? null;
$age = $_GET['age'] ?? null;
echo "Name : " . $name . "<br>Age :" . $age;

session_start();
$_SESSION['person_name'] = "Asif Abir";
$_SESSION['person_age'] = 36;
$_SESSION['role'] = "admin";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

session_unset();

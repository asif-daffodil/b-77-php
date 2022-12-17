<?php
// string
$x = "Ami vat khai";
var_dump($x);
echo "<br>";

$x = 123;
var_dump($x);
echo "<br>";

$x = 123.456;
var_dump($x);
echo "<br>";

$x = true;
var_dump($x);
echo "<br>";

$x = ["Ami", 123, true];
var_dump($x);
echo "<br>";

class person
{
    public $name = "ASif Abir";
}

$x = new person;
var_dump($x);
echo "<br>";

$x = null;
var_dump($x);
echo "<br>";

$myname = "Asif Abir";
$myname = "Kamal Mia";
echo $myname . "<br>";

define("myName", "Asif Abir");
// define("myName", "Aslam Mia");
echo myName . "<br>";
// echo saddam;

$a = "b";
$b = "c";
$c = "d";
$d = "Sakib Khan";
echo $ $ $$a . "<br>";


$aa = &$ami;
$ami = "Tumi";
echo $ami . " " . $aa . "<br>";
$aa = "Bangladesh";
echo $ami . "<br>";

//Math
echo max(3, 1, 7, 8, 15, 565, 221, 2) . "<br>";
echo min(3, 1, 7, 8, 15, 565, -221, 2) . "<br>";
echo abs(-35) . "<br>";
echo round(3.5) . "<br>"; //output 4
echo floor(3.9) . "<br>"; // output 3
echo ceil(3.1) . "<br>"; // output 4

// string func
echo strlen("Dhaka is the capital of Bangladesh") . "<br>"; // output 34
echo str_word_count("My name is khan!") . "<br>"; // output 4
echo substr("My name is khan!", -5) . "<br>"; // output 4
echo strrev("My name is khan!") . "<br>"; // output !nahk si eman yM

<?php

// indexed array

// $cities = array("Dhaka", "Rajshahi", "Khulna", "Rongpur");
$cities = ["Dhaka", "Rajshahi", "Khulna", "Rongpur"];
// echo $cities;
echo "<pre>";
print_r($cities);
echo "</pre>";
echo $cities[0] . "<br>";
for ($i = 0; $i < count($cities); $i++) {
    echo $cities[$i] . "<br>";
}


// associative array
$persons = ["name" => "Asif Abir", "age" => 36, "city" => "Dhaka"];
echo "<pre>";
print_r($persons);
echo "</pre>";
echo $persons["name"] . "<br>";
foreach ($persons as $key => $val) {
    echo ucfirst($key)  . " : " . $val . "<br>";
}

//multidimontional array
$students = [
    ["name" => "Kamal", "skill" => "Java", "city" => "Dhaka"],
    ["name" => "Jamal", "skill" => "PHP", "city" => "Bogura"],
    ["name" => "Tomal", "skill" => "Python", "city" => "Cumilla"]
];

echo "<pre>";
print_r($students);
echo "</pre>";
echo $students[1]["skill"] . "<br>";

foreach ($students as $student) {
    foreach ($student as $key => $val) {
        echo ucfirst($key) . " : " . $val . "<br>";
    }
    echo "<br>";
}

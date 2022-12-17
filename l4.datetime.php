<?php
date_default_timezone_set("Asia/Dhaka");
echo  date("F/d/Y h:i:s A -l") . "<br>";


//mktime
// hour min sec month day year
$myTime = mktime(0, 0, 0, 9, 10, 2013);
echo  date("M/d/y H:i:s a -l", $myTime) . "<br>";

// strtotime
$nextTuesday = strtotime("next tuesday +3 years +4 months -15 days ");
echo  date("M/d/Y H:i:s a -l", $nextTuesday) . "<br>";

$startDate = strtotime("next friday");
$endDate = strtotime("+6 weeks", $startDate);

while ($startDate <= $endDate) {
    echo  date("M/d/Y H:i:s a -l", $startDate) . "<br>";
    $startDate = strtotime("+1 week", $startDate);
}

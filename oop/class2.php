<?php

trait employeeProperties
{
    protected static string $employeeName;
    protected static int $employeeAge;
    protected static bool $employeeStatus;
}

class employeeData
{
    use employeeProperties;
    protected const maleTitle = "Mr";
    protected const femaleTitle = "Mrs";
    protected function __construct()
    {
        return;
    }
}

class showEmployeeData extends employeeData
{
    public static function employeeData(string $name, int $age, bool $status, string $gender): string
    {
        $title = ($gender === "Male") ?  employeeData::maleTitle : employeeData::femaleTitle;
        employeeData::$employeeName = "$title $name";
        employeeData::$employeeAge = $age;
        employeeData::$employeeStatus = $status;
        $heShe = ($gender === "Male") ?  "He" : "She";
        $message = (!employeeData::$employeeStatus) ? "$heShe is not our employee" : "$heShe is our employee";
        return "Employee Name : " . employeeData::$employeeName . "<br>Employee Age : " . employeeData::$employeeAge . "<br>Employee Status : $message";
    }
}

echo showEmployeeData::employeeData("Asif Abir", 36, true, "Male");
echo "<br><br>";
echo showEmployeeData::employeeData("Sayma Mis", 37, false, "Female");

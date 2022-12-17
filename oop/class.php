<?php
class studentData
{
    protected string $studentName;
    protected int $studentAge;

    public function __construct()
    {
        echo "<br>This is a text from constructtive function</br>";
    }

    public function __destruct()
    {
        echo "<br>This is a text from destructtive function</br>";
    }
}

class studentFamilyData extends studentData
{
    private int $studnentChielCount = 0;

    public function studentFamilyData(string $name, int $age): string
    {
        $this->studentName = $name;
        $this->studentAge = $age;
        return "Styudent Name : $this->studentName <br>Student Age : $this->studentAge <br>Studen Chieldren: $this->studnentChielCount";
    }
}

// $studentDataObj = new studentData;
$studentFamilyDataObj = new studentFamilyData;

echo $studentFamilyDataObj->studentFamilyData("Ashraf", 20);

<?php


class Student
{
    protected string $firstName;
    protected string $lastName;
    protected string $group;
    protected float $averageMark;

    public function __construct(string $firstName, string $lastName, string $group, string $averageMark)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->averageMark = $averageMark;
    }

    public function getScholarship(): int
    {
        if ($this->averageMark == 5) {
            return 100;
        }
        return 80;
    }
}

class Aspirant extends Student
{
    public function __construct(string $firstName, string $lastName, string $group, string $averageMark)
    {
        parent::__construct($firstName, $lastName, $group, $averageMark);
    }

    public function getScholarship(): int
    {
        if ($this->averageMark == 5) {
            return 200;
        }
        return 180;
    }
}


$student1 = new Student("Олег", "Какунин", "4", 4);
$student2 = new Student("Иван", "Иванов", "1", 5);
$student3 = new Student("Павел", "Павлов", "2", 2);
$aspirant1 = new Aspirant('Никита', "Никитин", "2", 3.5);
$aspirant2 = new Aspirant("Дмитрий", "Дмитриев", "5", 5);
$aspirant3 = new Aspirant("Александр", "Александров", "3", 4);

$mas = [$student1, $student2, $student3, $aspirant1, $aspirant2, $aspirant3];
foreach ($mas as $i) {
    var_dump($i);
    echo $i->getScholarship();
}

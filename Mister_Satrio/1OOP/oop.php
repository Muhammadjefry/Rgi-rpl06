<?php 
class Student{
    // Abstract 
    public $name;
    public $age;
    public $gender;
    public $grade;

    //Constructor
    function __construct($NAME,$AGE,$GENDER,$GRADE)
    {
        $this->name=$NAME;
        $this->age=$AGE;
        $this->gender=$GENDER;
        $this->grade=$GRADE;
    }

}
    // Instance
    $jefry = new Student("M jefry",18,"pria",12);

    echo $jefry->name; 

?>
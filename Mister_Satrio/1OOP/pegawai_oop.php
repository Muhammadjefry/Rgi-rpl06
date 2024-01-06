<?php 
class Pegawai{
    public $name;
    public $age;
    public $position;
    public $company;
    const status = " Pegawai Tetap "; 

    // Construction
    function __construct($NAME,$AGE,$POSITION,$COMPANY)
    {
        $this->name=$NAME;
        $this->age=$AGE;
        $this->position=$POSITION;
        $this->company=$COMPANY;
    }
    function info(){
        echo"My Name is ".$this->name;
        echo '<br>';
        echo" I'm ".$this->age." Years Old ";
        echo '<br>';
        echo" I'm ".$this->position." in ".$this->company;
    }
}
class Menejer extends Pegawai{
    function info()
    {
        echo"My Name is ".$this->name;
        echo '<br>';
        echo" I'm ".$this->age." Years Old ";
        echo '<br>';
        echo" I'm ".$this->position." in ".$this->company;
    }
}

$pgw = new Pegawai ("jefry",18,"HRD","Aca Techonolgy");
$pgw2 = new Menejer ("jefry2",19,"CEO","Aca Techonolgy");
$pgw->info();
echo '<br>';
echo '<br>';
echo  $pgw::status;
echo '<br>';
echo '<br>';
$pgw2->info();
echo '<br>';
echo '<br>';
?>
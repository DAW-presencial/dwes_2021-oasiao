<?php
class myClass
{
    public $var1;
    protected $var2;
    private $var3;
    protected $var4 = 'Extiendo de myClass';

    public function __construct($var1,$var2,$var3){
        //$this -> nombreVariable = valorVariable;
        $this->var1 = $var1;
        $this->var2 = $var2;
        $this->var3 = $var3;
    }

    public function echoValues(){
        echo "$this->var1,$this->var2,$this->var3";
    }
}
<?php
class myClass
{
    private $data=[];
    public $var1 = "var1";
    protected $var2 = "var2";
    private $var3 ="var 3";

    public function __set($var,$value){
        $this->data[$var] = $value;
    }

    public function __get($var){
        return $this->data[$var];
    }

}
<?php
class myClass
{
    private $data=[];

    public function __set($var,$value){
        $this->data[$var] = $value;
    }

    public function __get($var){
        return $this->data[$var];
    }
}
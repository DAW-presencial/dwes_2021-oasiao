<?php


class mySubClass extends myClass
{
    const VAR5 = 'this is var 5';

    public function echoValue(){
        echo $this->var4;
    }
}
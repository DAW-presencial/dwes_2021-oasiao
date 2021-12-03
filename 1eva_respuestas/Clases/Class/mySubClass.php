<?php


class mySubClass extends myClass
{
    public function echoValues(){
        echo "<br>public: $this->var1<br>";
        echo "protected: $this->var2<br>";
        echo "private: $this->var3<br>";

    }
}
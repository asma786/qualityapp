<?php


class TestParser{
    private $field;
    public function __construct()
    {
    }
    public function testClass(){
        $x=2; $y=3;
        echo $this->test($x, $y);

}
    public function testClass2(){
        $x=2; $y=3;
        echo $this->test($x, $y);

    }
    public function test($x,$y){
        return $x+$y;
    }
}
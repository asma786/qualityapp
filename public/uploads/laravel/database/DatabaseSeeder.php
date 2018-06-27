<?php


class DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $x;
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
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

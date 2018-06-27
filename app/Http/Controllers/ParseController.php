<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hal\Application\Application;

class ParseController extends Controller
{
    //
    public function index(){

        $config = $this->providesExample();//$code = file_get_contents(public_path().'/uploads/test.php');
        $app = new Application();
        $app->run($config);
    }
    public function providesExample()
    {
        $config =array(0 => 'phpmetrics', 1 => '--report-html='.public_path().'/reports',
            2 => public_path().'/uploads/laravel');
        return $config;

    }
}

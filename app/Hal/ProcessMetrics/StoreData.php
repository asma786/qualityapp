<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 5/27/18
 * Time: 9:12 PM
 */
namespace Hal\ProcessMetrics;
use App\Classes;
use App\Projects;
use App\Packages;
use App\QualityFactors;
use App\ProjectMetrics;
use App\AllMetrics;
use App\ProjectFactors;
use Hal\Metric\Consolidated;
use Hal\Metric\Metrics;


class StoreData
{
    public $consolidated;
    public function __construct($consolidated)
    {
        $this->consolidated = $consolidated;

    }
    public function SaveMetrics(){
        $classes = $this->consolidated->getClasses();

        //create project
        $project = new Projects();
        $project->name = 'Test Project';
        $project->save();
        foreach($classes as $val){
            print_r($val); exit;

            $class = $this->SaveClass($val, $project->id);
        }
        foreach($classes as $val){

            $class = Classes::where('name', '=', $val['name'])
                ->where('project_id', '=', $project->id)->first();//$this->SaveClass($val, $project->id);
            $metrics = AllMetrics::all();
            if(count($metrics))
                foreach ($metrics as $metric){

                    $project_metric = new ProjectMetrics();
                    $project_metric->project_id = $project->id;
                    $project_metric->metric_id = $metric->id;
                    $project_metric->type = 'class';
                    $project_metric->metric_value = $this->CalculateMetric($val, $metric->short_name, $class->id);
                    $project_metric->save();

                }


        }
    }
    public function CalculateMetric($data, $metric, $class_id){
        $value = 0;
        switch($metric){
            case 'LOC':
                $value = $data['loc'];
                break;
            case 'CC-VG':
                $value = $data['ccn'];
                break;

            case 'LCOM':
                $value = $data['lcom'];
                break;
            case 'D':
                $value = $data['difficulty'];
                break;
            case 'E':
                $value = $data['effort'];
                break;
            case 'I':
                $value = $data['instability'];
                break;
            case 'Ca':
                $value = $data['afferentCoupling'];
                break;
            case 'Ce':
                $value = $data['efferentCoupling'];
                break;
            case 'DIT':
                 $value = $this->findDIT($class_id, 0);
               break;
            case 'LCOM1':
                $value = $data['lcom'];
                break;
            case 'TCC':
                $value = $data['lcom'];
                break;

        }
        return $value;

    }
    public function findLCOM1($class_id, $depth){

    }
    public function findDIT($class_id, $depth){

        $class = Classes::find($class_id);
        //echo $class->parent_id; exit;
        if($class->parent_id){

            $depth++;
            $this->findDIT($class->parent_id, $depth);
        }
        return $depth;
    }
    public function validPackage($package_name){
        if(strlen($package_name) > 0 && $package_name != '\\')
            return true;
        else
            return false;
    }
    public function SaveClass($data, $project_id){

        $class = Classes::where('name', '=',$data['name'])
            ->where('project_id', '=', $project_id)->first();
        if(empty($class)) {
            $class = new Classes();
            $class->project_id = $project_id;
        }
        $class->package_id = $this->validPackage($data['package']) ? $this->SavePackage($data['package'], $project_id) : null;
        $class->name = $data['name'];
        $class->method_count =  $data['nbMethods'];
        //check if parent class exists
        if(count($data['parents'])) {
            $pclass = Classes::where('name', '=',$data['parents'][0])
                ->where('project_id', '=', $project_id)->first();
            if(empty($pclass))
            {
                $pclass = new Classes();
                $pclass->project_id = $project_id;
                $pclass->name = $data['parents'][0];
                $pclass->save();
            }
             $class->parent_id = $pclass->id;
        }

        $class->save();
        $class->parent_id;
        return $class;
    }
    public function SavePackage($package_name, $project_id){
        $name_arr = explode('\\',$package_name);
        $name_arr = array_filter($name_arr);
        $parent_id = null;
        foreach ($name_arr as $p){
            $package = Packages::where('name', '=', $p)
                ->where('project_id', '=', $project_id)->first();

            if(empty($package)){
                $package = new Packages();
                $package->name = $p;
                $package->project_id = $project_id;
                $package->parent_id  = $parent_id;
                $package->save();
            }
            $parent_id = $package->id;
        }


        return $package->id;

    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\ParserFactory;
use PhpParser\Node\Name;

class ParseController extends Controller
{
    //
    public function index(){
       /* $code = <<<'CODE'
<?php

function year_dropdown($posted_vale="")
{
	$html = '<select id="year" name="year" class="form-control"><option value="">Select</option>';
	for ($i = date('Y'); $i > 1900 ; $i--)
	{
	   if($posted_vale == $i){
	   		$html.='<option value="'.$i.'" selected="selected">'.$i.'</option>'; 
	   }else{
	   		$html.='<option value="'.$i.'">'.$i.'</option>'; 
	   }
	}
	$html.='</select>';

	return $html;
}
CODE;*/
       $code = file_get_contents(public_path().'/uploads/test.php');

        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        try {
            $ast = $parser->parse($code);
        } catch (Error $error) {
            echo "Parse error: {$error->getMessage()}\n";
            return;
        }

        //$str =  json_encode($ast, JSON_PRETTY_PRINT);
        $data = array();
        foreach($ast as $key => $val){
            print_r($val); //exit;

            $data[$key]['type'] = $val->getType();
           // $data[$key]['name'] = $val->name;
            $data[$key]['start']= $val->getStartLine();
            $data[$key]['end'] = $val->getEndLine();
            switch($val->getType()){

            }
        }
        print_r($data);
    }
}

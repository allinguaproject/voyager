<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Lecture;
use App\TableToLearn;
use App\ExtraInformation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mainpage.home');
    }

    public function lexikon()
    {
        return view('lexikon.landingpage');
    }

    public function alt()
    {
        return view('lexikon.alt');
    }

    public function loadSideBar(){

        return view($_REQUEST["sidebar"]);

    }
    public function getSolutions($index){
         
        $test_array=array(
            array(
                "stelle1"=>utf8_encode("gefällt"),
                "stelle2"=>""
            ),
            array(
                "stelle1"=>"nimmt",
                "stelle2"=>"zu"
            ),
            array(
                "stelle1"=>"sehe",
                "stelle2"=>"an"
            )
        );

        return json_encode($test_array);
        


    }
    public function loadPractice(){
        
        $lecture=Lecture::get();
        $rows=$lecture->where("lectureID","=",$_REQUEST["id"]);
        $lecture_parts=array(
            "phrase" => array(),
            "solutions" => array(),
            "fields"=>array()
        );
        $data_to_show=array();
        foreach($rows as $row){
            if($row["countPhraseParts"]>=1){
                array_push($lecture_parts["phrase"],$row["PhrasePart1"]);
                array_push($lecture_parts["fields"],false);
            }
            if($row["countInputParts"]>=1){
                array_push($lecture_parts["solutions"],$row["SolutionPart1"]);
                array_push($lecture_parts["fields"],true);

            }
            if($row["countPhraseParts"]>=2){
                array_push($lecture_parts["phrase"],$row["PhrasePart2"]);
                array_push($lecture_parts["fields"],false);
            }
            if($row["countInputParts"]>=2){
                array_push($lecture_parts["solutions"],$row["SolutionPart2"]);
                array_push($lecture_parts["fields"],true);
            }
            if($row["countPhraseParts"]>=3){
                array_push($lecture_parts["phrase"],$row["PhrasePart3"]);
                array_push($lecture_parts["fields"],false);

            }
            if($row["countInputParts"]>=3){
                array_push($lecture_parts["solutions"],$row["SolutionPart3"]);
                array_push($lecture_parts["fields"],true);

            }
            if($row["countPhraseParts"]==4){
                array_push($lecture_parts["phrase"],$row["PhrasePart4"]);
                array_push($lecture_parts["fields"],false);

            }    
            if($row["countInputParts"]==4){
                array_push($lecture_parts["solutions"],$row["SolutionPart4"]);
                array_push($lecture_parts["fields"],true);
            }
            array_push($data_to_show,$lecture_parts);
            $lecture_parts=array(
                "phrase" => array(),
                "solutions" => array(),
                "fields"=>array()
            );
        }
        //var_dump($data_to_show);
        return view($_REQUEST["view"],["rows"=>$data_to_show]);
        //$test=array( "html"=>$_REQUEST["view"],
        //            "id"=>$_REQUEST["id"]);
        //            echo $rows;
    }
    public function getImage($img){

        if(Storage::disk('local')->has($img)){
        $file=Storage::disk('local')->get($img);
  
        //$img=Image::make($file)->resize(200,200);
        return new Response($file,200);
        
        }
    }
    public function loadPracticeTable(){
       $max_size=0; 
       $tables= TableToLearn::get();
       $rows=$tables->where("TableID","=",$_REQUEST["TableID"]);
       $row_to_columns=array();
       $table=array();
       foreach($rows as $row){
            $string_del=$row["Row"];
            $purpose=$row["Purpose"]; 
            $part=$row["Part"];
            $row_to_columns=explode("-",$string_del);
            if($max_size<count($row_to_columns))
                $max_size=count($row_to_columns);
            array_push($table,array(
                "columns"=>$row_to_columns,
                "purpose"=>$purpose,
                "part"=>$part)
            );
       }

       foreach($table as $key=> $row){
            for($index=count($row["columns"]);$index<$max_size;$index++ ){
                array_push($row["columns"]," ");
            }
          
            $table[$key]["columns"]=$row["columns"];
       }
       
       return view($_REQUEST["view"],["table"=>$table,"title"=>$_REQUEST["title"]]);

    }

    public function getGame(){
        $selected_practices=$this->randomGame(1);
        //var_dump($selected_practices);
        $result_array=$this->addExtras($selected_practices);
        return json_encode($result_array);
    }
    public function playGame($index){        
        $result_array=array();
        return view("games.level_a1.frontpage_level1",array("practices"=>$result_array));
    }

    public function randomGame($index){
        // Getting Line Practices
        $rows=Lecture::get();
        $lectures=$this->arrangeLinePractice($rows);
        $lim1=count($lectures);

        // Getting Table Practices
        $rows= TableToLearn::get();
        $tables=$this->arrangeTablePractice($rows);
        
        $lim2=count($tables);
        
        $totalSize=10;
        $indices_tab=rand(0,$lim2);
        $indices_lec=rand(0,$lim1);
        $selected_practices=array();
        for($i=0;$i<=$totalSize;$i++){
            $selector=rand(0,1);
            if($selector==0){     
                if($lectures[rand(0,$lim1-1)])           
                array_push($selected_practices,
                    array(
                        "type"=>"line_practice",
                        "content"=>$lectures[rand(0,$lim1-1)]
                    )
                );
            }else if($selector==1){
                array_push($selected_practices,
                    array(
                        "type"=>"table_practice",
                        "content"=>$tables[rand(0,$lim2-1)]
                    )
                );
            }

        }
        return $selected_practices;        
    }

    public function arrangeLinePractice($rows){
        $lecture_parts=array(
            "lectureID"=>0,
            "phrase" => array(),
            "columns" => array(),
            "solutions" => array(),
            "fields"=>array(false,false,false,false,false,false,false,false),
            "id2field"=>array(0,9,1,9,2,9,3,3)

        );
        $data_to_show=array();
        foreach($rows as $row){
            if($row["countPhraseParts"]>=1){
                array_push($lecture_parts["phrase"],$row["PhrasePart1"]);
            }
            if($row["countInputParts"]>=1){
                array_push($lecture_parts["solutions"],$row["SolutionPart1"]);
                $lecture_parts["fields"][1]=true;
            }
            if($row["countPhraseParts"]>=2){
                array_push($lecture_parts["phrase"],$row["PhrasePart2"]);
            }
            if($row["countInputParts"]>=2){
                array_push($lecture_parts["solutions"],$row["SolutionPart2"]);
                $lecture_parts["fields"][3]=true;
            }
            if($row["countPhraseParts"]>=3){
                array_push($lecture_parts["phrase"],$row["PhrasePart3"]);
            }
            if($row["countInputParts"]>=3){
                array_push($lecture_parts["solutions"],$row["SolutionPart3"]);
                $lecture_parts["fields"][5]=true;
            }
            if($row["countPhraseParts"]==4){
                array_push($lecture_parts["phrase"],$row["PhrasePart4"]);
            }    
            if($row["countInputParts"]==4){
                array_push($lecture_parts["solutions"],$row["SolutionPart4"]);
                $lecture_parts["fields"][7]=true;
            }
            $lecture_parts["lectureID"]=$row["lectureID"];
            array_push($data_to_show,$lecture_parts);
            $lecture_parts=array(
                "lectureID"=>0,
                "phrase" => array(),
                "columns" => array(),
                "solutions" => array(),
                "fields"=>array(false,false,false,false,false,false,false,false),
                "id2field"=>array(0,9,1,9,2,9,3,9)

            );
        }

        return $data_to_show;
    }

    public function arrangeTablePractice($rows){

        $max_size=0; 
        $row_to_columns=array();
        $table=array();
        // arranging array to presentable table 
        foreach($rows as $row){
             $string_del=$row["Row"];
             $purpose=$row["Purpose"]; 
             $part=$row["Part"];
             $row_to_columns=explode("-",$string_del);
             if($max_size<count($row_to_columns))
                 $max_size=count($row_to_columns);
             array_push($table,array(
                 "tableID"=>$row["TableID"],
                 "columns"=>$row_to_columns,
                 "purpose"=>$purpose,
                 "part"=>$part)
             );
        }
        // filling table with empty columns for unified look
        foreach($table as $key=> $row){
             for($index=count($row["columns"]);$index<$max_size;$index++ ){
                 array_push($row["columns"]," ");
             }
           
             $table[$key]["columns"]=$row["columns"];
        }

        return $table;
    }

    public function addExtras($selected_practices){
        $infos=ExtraInformation::get();
        $final_array=array();
        $result_array=array();
        foreach($selected_practices as $practice){
            if(strcmp($practice["type"],"line_practice")==0){
                $info=$infos->where("LektionID",'=',$practice["content"]["lectureID"]);
                $final_array["content"]=$practice["content"];
                $final_array["type"]=$practice["type"];
                foreach($info as $inf){
                    $final_array["title"]=$inf["Titel"];
                    $final_array["level"]=$inf["Level"];
                    $final_array["header"]=explode("-",$inf["Headers"]);
                    $final_array["subject"]=$inf["Thema"];


                }
            }
            elseif(strcmp($practice["type"],"table_practice")==0){
                $info=$infos->where("TableID",'=',$practice["content"]["tableID"]);
                $final_array["content"]=$practice["content"];
                $final_array["type"]=$practice["type"];
                foreach($info as $inf){
                    $final_array["title"]=$inf["Titel"];
                    $final_array["level"]=$inf["Level"];
                    $final_array["header"]=explode("-",$inf["Headers"]);
                    $final_array["subject"]=$inf["Thema"];                }
            }
            array_push($result_array,$final_array);
        }
        return $result_array;
    }
}



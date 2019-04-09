<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Lecture;
use App\TableToLearn;
use App\ExtraInformation;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    

    public function index()
    {
        return view('mainpage.home');
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
                $rand_num=rand(0,$lim2-1);
                if(strcmp($tables[$rand_num]["purpose"],"solution")==0){
                    array_push($selected_practices,
                        array(
                            "type"=>"table_practice",
                            "content"=>$tables[$rand_num]
                        )
                    );
                }
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

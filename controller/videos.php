<?php

$action = $_POST['action'];

switch($action){
    
    case "get_featured":
        $vids[] = array("id"=>"01",
				"title"=>"Sircut Lean",
				"img"=>"images/temp_thumb.jpg",
				"video"=>"//www.youtube.com/embed/xS_L4YfBAg4?rel=0",
				"category"=>"latest");
         $vids[] = array("id"=>"02",
				"title"=>"Twisted Candy",
				"img"=>"images/thumb_twisted_candy.jpg",
				"video"=>"//www.youtube.com/embed/xS_L4YfBAg4?rel=0",
				"category"=>"latest");
         
        print json_encode(array("videos"=>$vids,"success"=>true));
        break;
    case "save_video":
        break;
    case "delete_video":
        break;
    case "update_video":
        break;
    
}


class Videos{
    
    public function __construct(){
        
    } 
}


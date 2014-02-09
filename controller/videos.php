<?php

$action = $_POST['action'];

switch($action){
    
    case "get_featured":
        $vids[] = array("id"=>"01",
				"title"=>"Sircut Lean",
				"img"=>"images/temp_thumb.jpg",
				"video"=>"//www.youtube.com/embed/xS_L4YfBAg4?rel=0",
				"category"=>"weddings",
                "sub_category"=>"",
                "featured"=>"true");
         $vids[] = array("id"=>"02",
				"title"=>"Twisted Candy",
				"img"=>"images/thumb_twisted_candy.jpg",
				"video"=>"//www.youtube.com/embed/xS_L4YfBAg4?rel=0",
				"category"=>"latest",
                "sub_category"=>"",
                "featured"=>"false");
         
        print json_encode(array("videos"=>$vids,"success"=>true));
        break;
    case "add_video":
        break;
    case "delete_video":
        break;
    case "save_video":
        break;
    
}


class Videos{
    
    public function __construct(){
        
    } 
}


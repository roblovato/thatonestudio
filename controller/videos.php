<?php

$action = $_POST['action'];

switch($action){
    
    case "get_featured":
        $vids[] = array("id"=>"03",
                "title"=>"‪G-SpOt - LAY IT DOWN",
                "video_id"=>"opTnH5schL4",
                "category"=>"latest",
                "sub_category"=>"music_videos",
                "featured"=>"true");
        $vids[] = array("id"=>"04",
                "title"=>"\"‪Fresh\" Music Video (Metro P. feat. Dorrough)",
                "video_id"=>"xS_L4YfBAg4",
                "category"=>"latest",
                "sub_category"=>"music_videos",
                "featured"=>"false");
        $vids[] = array("id"=>"05",
                "title"=>"‪Sircut - LEAN music video",
                "video_id"=>"iuRWs4m8aSM",
                "category"=>"latest",
                "sub_category"=>"music_videos",
                "featured"=>"false");
        $vids[] = array("id"=>"06",
                "title"=>"‪Sircut - LOOKING THRU MY PHONE music video",
                "video_id"=>"mDlhvriM_mE",
                "category"=>"multimedia",
                "sub_category"=>"music_videos",
                "featured"=>"false");
        $vids[] = array("id"=>"07",
                "title"=>"‪Train - Drive By",
                "video_id"=>"oxqnFJ3lp5k",
                "category"=>"multimedia",
                "sub_category"=>"music_videos",
                "featured"=>"false");
        $vids[] = array("id"=>"08",
                "title"=>"‪2012 NYE Party at Blackhawk Museum",
                "video_id"=>"K-E0GRpd7rI",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"09",
                "title"=>"‪E40 \"Function\" promo (1 of 2)",
                "video_id"=>"eaCmFAcnERE",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"10",
                "title"=>"‪E40 \"Function\" promo (2 of 2)",
                "video_id"=>"cOKBXCM64GA",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"11",
                "title"=>"‪Bok Fu Do promo",
                "video_id"=>"EEFi8uUIXyk",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"12",
                "title"=>"‪E40 \"Function\" promo (Acapella)",
                "video_id"=>"dBQLFirhZkI",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"13",
                "title"=>"‪God of War \"Move\" Spec Commercial",
                "video_id"=>"5cbuxYxhRCA",
                "category"=>"multimedia",
                "sub_category"=>"commercial_promo",
                "featured"=>"false");
        $vids[] = array("id"=>"14",
                "title"=>"‪\"LAY IT DOWN\" (Teaser)",
                "video_id"=>"fuNkhMiBiXY",
                "category"=>"multimedia",
                "sub_category"=>"trailer_teaser",
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


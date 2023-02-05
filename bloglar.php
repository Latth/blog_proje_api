<?php 
    require "config.php";
    
    $bloglar = DB::get("SELECT * FROM blog_postlari");

    $return_array = array();
    $return_array["status"] = 0;
    $return_array["count"] = count($bloglar);
    $return_array["data"] = $bloglar;

    echo json_encode($return_array);

?>
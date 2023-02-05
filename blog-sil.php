<?php 
    require "config.php";
    $blog_id = $_GET["blogId"];
    $all_blogs = DB::get("SELECT * FROM blog_postlari");
    $blogs_id_array = array();

    foreach($all_blogs as $blog) {
        $blog = get_object_vars($blog);
        array_push($blogs_id_array, $blog['id']);
    }
    

    if($blog_id == null or $blog_id == "") {
            $return_array = array();
            $return_array["status"] = -1;
            $return_array["message"] = "Geçerli bir Blog ID girin.";
    }else {
        if(in_array($blog_id, $blogs_id_array)) {
            DB::exec("DELETE FROM blog_postlari where id = (?)", array(
                $blog_id,
            ));

            $return_array = array();
            $return_array["status"] = 0;
            $return_array["message"] = "$blog_id ID'li blog başarı ile silindi.";

        }else if(in_array($blog_id, $blogs_id_array) == false){
            $return_array = array();
            $return_array["status"] = -1;
            $return_array["message"] = "$blog_id ID'li blog bulunamadı!";
        }
    }
    echo json_encode($return_array);
?>
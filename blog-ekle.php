<?php 
    require "config.php";
    
    $data = file_get_contents('php://input');

    $result = json_decode($data, true);

    if($result == null) {
        $return_array = array();
        $return_array["status"] = -1;
        $return_array["message"] = "Lütfen bütün alanları doldurunuz!";
        
    }else {
        $durum = $result["durum"];
        $tarih = $result["tarih"];
        $baslik = $result["baslik"];
        $kisa_aciklama = $result["kisa_aciklama"];
        $aciklama = $result["aciklama"];
        $author = $result["author"];

        DB::insert("INSERT INTO blog_postlari (durum, tarih, baslik, kisa_aciklama, aciklama, author) VALUES (?, ?, ?, ?, ?, ?)", array(
            $durum,
            $tarih,
            $baslik,
            $kisa_aciklama,
            $aciklama,
            $author
        ));

        $return_array = array();
        $return_array["status"] = 0;
        $return_array["message"] = "Blog Ekleme Başarılı!";

        
    }

    echo json_encode($return_array);
?>
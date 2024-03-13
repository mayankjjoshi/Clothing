<?php

function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_product($con,$limit='',$cat_id='',$pro_id='',$sub_categories=''){
    $sql="select * from product where status=1";
    if($cat_id!=''){
        $sql.=" and cat_id=$cat_id";
    }
    if($pro_id!=''){
        $sql.=" and pro_id=$pro_id";
    }
    if($sub_categories!=''){
        $sql.=" and subcat_id=$sub_categories";
    }
    if($limit!=''){
        $sql.="  limit $limit";
    }
     $res=mysqli_query($con,$sql);
     $data = array();
     while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
     }
     return $data;

     
}
?>
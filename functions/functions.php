<?php
    require_once("classes.php");
    if(isset($_REQUEST["activity"])){
        if($_REQUEST["activity"] == "add_manufacturer"){
            $obj = new manufacturer();
            $obj->add_manufacturer($_REQUEST["name"]);
        }
        if($_REQUEST["activity"] == "get_all_manufacturer"){
            $obj = new models();
            $obj->get_all_manufacturer();
        }
        if($_REQUEST["activity"] == "save_model"){
            $obj = new models();
            $obj->save_model();
        }
        if($_REQUEST["activity"] == "car_image_upload"){
            $obj = new models();
            $obj->car_image_upload();
        }
        if($_REQUEST["activity"] == "get_all_inventory"){
            $obj = new inventory();
            $obj->get_all_inventory();
        }
        if($_REQUEST["activity"] == "get_inventory_details"){
            $obj = new inventory();
            $obj->get_inventory_details();
        }
        if($_REQUEST["activity"] == "sold_inventory"){
            $obj = new inventory();
            $obj->sold_inventory();
        }
    }

?>
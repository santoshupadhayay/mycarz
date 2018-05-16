<?php

    class manufacturer{
        
        
        public function add_manufacturer($manufacturer_name){
            include("dbcon.php");
            $manufacturer_name = mysqli_real_escape_string($con,$manufacturer_name);
            $query = "Insert into manufacturer (manufacturer_name) values('$manufacturer_name')";  
            mysqli_query($con,$query) or die(mysqli_error($con));
            echo "Manufacture Added!!";
        }
        
        public function get_manufacturers(){
            include("dbcon.php");
            $query = "select * from manufacturer";  
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
            $arr = [];
            while($res = mysqli_fetch_array($result)){
                array_push($arr,$res);
            }
            echo json_encode($arr);
        }
        
    }
    class inventory{
        public function get_all_inventory(){
            include("dbcon.php");
            $query = "select * from models as a inner join manufacturer as b on a.model_manufacturer = b.manufacturer_id ";  
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
            $arr = [];
            while($res = mysqli_fetch_array($result)){
                array_push($arr,$res);
            }
            echo json_encode($arr);
        }
        public function get_inventory_details(){
            include("dbcon.php");
            $inventory_id = mysqli_real_escape_string($con, $_REQUEST["inventory_id"]);
            $query = "select * from models as a inner join manufacturer as b on a.model_manufacturer = b.manufacturer_id where a.model_id = $inventory_id";  
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
            $res = mysqli_fetch_array($result);
            echo json_encode($res);
        }
        public function sold_inventory(){
            include("dbcon.php");
            $inventory_id = mysqli_real_escape_string($con, $_REQUEST["inventory_id"]);
            $query = "update models set model_status = 'Sold' where model_id = $inventory_id";  
            mysqli_query($con,$query) or die(mysqli_error($con));
            echo "Status Updated!!";
        }
    }
    class models extends manufacturer{
        public function get_all_manufacturer(){
            parent::get_manufacturers();
        }
        public function save_model(){
            include("dbcon.php");
            $model_name = mysqli_real_escape_string($con, $_REQUEST["model_name"]);
            $model_manufacturer = mysqli_real_escape_string($con, $_REQUEST["model_manufacturer"]);
            $model_registration_number = mysqli_real_escape_string($con, $_REQUEST["model_registration_number"]);
            $model_color = mysqli_real_escape_string($con, $_REQUEST["model_color"]);
            $model_year = mysqli_real_escape_string($con, $_REQUEST["model_year"]);
            $model_images = mysqli_real_escape_string($con, $_REQUEST["model_images"]);
            
            $query = "INSERT INTO `models`(`model_name`, `model_manufacturer`, `model_registration_number`, `model_color`, `model_year`, model_images) VALUES ('$model_name','$model_manufacturer','$model_registration_number','$model_color','$model_year', '$model_images')";  
            mysqli_query($con,$query) or die(mysqli_error($con));
            echo "Model Added!!";
        }
        public function car_image_upload(){
            include("dbcon.php");
            $filesarray = $_FILES;
            $ids = "";
            for($i=0;$i<count($filesarray);$i++){
                $ext = time();
                $path = "cars/".$ext."-".$filesarray[$i]['name'];
                move_uploaded_file($filesarray[$i]['tmp_name'],$path);
                
                $filename = mysqli_real_escape_string($con, $filesarray[$i]['name']);
                $path = mysqli_real_escape_string($con, $path);
                
                $query = "INSERT INTO cars_gallary( cars_gallary_name, cars_gallary_path) VALUES ('$filename','$path')";
                mysqli_query($con,$query) or die(mysqli_error($con));
                if($ids == ""){
                    $ids = mysqli_insert_id($con);
                }else{
                    $ids = $ids."-".mysqli_insert_id($con);
                }
            }
            echo $ids;
        }
        
    }

?>
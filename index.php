<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyCarz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  media="screen" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular-route.js"></script>
    <script>
        var app = angular.module("mycarz",['ngRoute']);
        app.controller("manufacturer",function($scope,$http){
            $scope.savemanufacturer = function(){
                var manufacturer_name = $scope.manufacturer_name;
                $http.get("functions/functions.php?activity=add_manufacturer&name="+manufacturer_name)
                    .then(function(msg){
                            alert(msg.data);
                            $scope.manufacturer_name = "";
                    })
            }   
        })
        app.controller("inventory",function($scope,$http){
            $scope.get_all_inventory = function(){
                
                $http.get("functions/functions.php?activity=get_all_inventory")
                    .then(function(msg){
                            console.log(msg);
                            $scope.inventories = msg.data;
                    })
            }   
            
            $scope.get_inventory_details = function(model_id){
                var model_id = (model_id);
                $http.get("functions/functions.php?activity=get_inventory_details&inventory_id="+model_id)
                    .then(function(msg){
                            $scope.inventory = (msg.data);
                            
                    })
                
                
            }
            
            $scope.sold_inventory = function(model_id){
                var model_id = (model_id);
                $http.get("functions/functions.php?activity=sold_inventory&inventory_id="+model_id)
                    .then(function(msg){
                            console.log(msg.data);
                            window.location.reload();
                            
                    })
            }
            
            $scope.get_all_inventory()
        })
        app.controller("models",function($scope,$http){
            $scope.get_all_manufacturer = function(){
                $http.get("functions/functions.php?activity=get_all_manufacturer")
                    .then(function(msg){
                            console.log(msg.data);
                            $scope.all_manufacturer = (msg.data);
                            
                    })
            }
            
            $scope.post_car_image = function($files){
                var formdata = new FormData();
                angular.forEach($files, function (value, key) {
                    //alert();
                    formdata.append(key, value);
                });

                console.log(formdata);
                
                 var request = {
                    method: 'POST',
                    url: 'functions/functions.php?activity=car_image_upload',
                    data: formdata,
                    headers: {
                        'Content-Type': undefined,
                        'Process-Data': false
                    }
                };

                // SEND THE FILES.
                $http(request)
                    .then(function (msg) {
                        $scope.car_gallary = (msg.data);
                    })
            }
            
            $scope.savemodel = function(){
                var form_data = new FormData();  
                form_data.append('model_name', $scope.model_name);  
                form_data.append('model_manufacturer', $scope.manufacturer_name);
                form_data.append('model_registration_number', $scope.model_images_registration_number);
                form_data.append('model_color', $scope.model_color);
                form_data.append('model_year', $scope.model_year);
                form_data.append('model_images', $scope.car_gallary);

                var config = {
                    headers:{
                        'Content-Type' : undefined,
                        'Process-Data': false
                    }
                }
                $http.post("functions/functions.php?activity=save_model",form_data,config)
                    .then(function(response){
                        alert(response.data)
                        //window.location.reload();
                });
            }
            
            $scope.get_all_manufacturer();
        })
        app.config(function($routeProvider,$locationProvider){
            $locationProvider.hashPrefix("");
            $routeProvider
                .when("/manufacturer",{
                    templateUrl:'templates/manufacturertmpl.php'
                })
                .when("/models",{
                    templateUrl:'templates/modelstmpl.php'
                })
                .when("/inventory",{
                    templateUrl:'templates/inventorytmpl.php'
                })
        })
        
         app.directive('ngFiles', ['$parse', function ($parse) {

            function fn_link(scope, element, attrs) {
                var onChange = $parse(attrs.ngFiles);
                element.on('change', function (event) {
                    onChange(scope, { $files: event.target.files });
                });
            };

            return {
                link: fn_link
            }
        } ]);
    </script>
</head>
<body ng-app="mycarz">
    <div class="container-fluid">
        <div class="jumbotron text-center" style="margin-bottom:0;padding: 12px !important;">
            <h1>MyCarz <small>Inventory</small></h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Menus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#manufacturer">Manufacturer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#models">Models</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#inventory">Inventory</a>
                </li>    
            </ul>
        </div>  
    </nav>
    <div ng-view="" class="row">
        
    </div>
</body>
</html>
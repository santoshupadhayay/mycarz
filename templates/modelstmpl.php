
    <div ng-controller="models" class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">ADD Models</h1>
            </div>
            
                <div class="col-sm-12 col-md-12 col-lg-12">   
                    <form>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manufacturer_name">Manufacturer:</label>
                                    <select class="form-control" ng-model="manufacturer_name" id="manufacturer_name">
                                        <option value="{{manufacturer.manufacturer_id}}" ng-repeat="manufacturer in all_manufacturer">{{manufacturer.manufacturer_name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manufacturer_name">Model Name:</label>
                                    <input type="text" class="form-control" ng-model="model_name" id="model_name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model_images_registration_number">Registration Number:</label>
                                    <input type="text" class="form-control" ng-model="model_images_registration_number" id="model_images_registration_number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model_color">Color:</label>
                                    <input type="color" class="form-control" ng-model="model_color" id="model_color" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model_year">Manufacturing Year:</label>
                                    <input type="text" class="form-control" ng-model="model_year" id="model_year" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model_images">Images:</label>
                                    <input type="file" accept="image/*" class="form-control" ng-files="post_car_image($files)"  multiple="" ng-model="model_images" id="model_images">
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input ng-disabled="model_images" type="submit" class="form-control btn btn-success" ng-click="savemodel()" />
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </form>    
                </div>
                
        </div>
        
    </div>

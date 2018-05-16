
    <div ng-controller="manufacturer" class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">ADD Manufacturer</h1>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">   
                <form>
                    <div class="form-group">
                        <label for="manufacturer_name">Manufacturer Name:</label>
                        <input type="text" class="form-control" ng-model="manufacturer_name" id="manufacturer_name">
                    </div>
                    <button type="submit" ng-click="savemanufacturer()" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

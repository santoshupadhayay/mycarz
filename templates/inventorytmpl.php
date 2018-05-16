
    <div ng-controller="inventory" class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Car Inventory</h1>
            </div>
            
                <div class="col-sm-12 col-md-12 col-lg-12">   
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr >
                              <th colspan="4">
                                Search : <input type="text" ng-model="filtertext"  />
                              </th>
                            </tr>
                            <tr>
                                <th>Model Name</th>
                                <th>Model Manufacturer</th>
                                <th>Model Registration Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-toggle="modal" data-target="#inventory_car_details" ng-repeat="inventory in inventories | filter:filtertext" ng-click="get_inventory_details(inventory.model_id)">
                                <td>{{inventory.model_name}}</td>
                                <td>{{inventory.manufacturer_name}}</td>
                                <td>{{inventory.model_registration_number}}</td>
                                <td>{{inventory.model_status}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
        </div>
        
        
        <div class="modal fade" id="inventory_car_details">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Inventory Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <h2>{{inventory.model_name}}</h2>
                  <table class="table table-striped">
                      
                        <tr>
                            <th>Manufacturer</th>
                            <td>{{inventory.manufacturer_name}}</td>
                        </tr>
                      <tr>
                            <th>Color</th>
                            <td>{{inventory.model_color}}</td>
                        </tr>
                      <tr>
                            <th>Registration Number</th>
                            <td>{{inventory.model_registration_number}}</td>
                        </tr>
                      <tr>
                            <th>Year</th>
                            <td>{{inventory.model_year}}</td>
                        </tr>
                  </table>
                  
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-success" ng-click="sold_inventory(inventory.model_id)">Sold</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
        
    </div>

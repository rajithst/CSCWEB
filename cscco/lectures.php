<?php
session_start();
require '../core/base.php';

if(logged_in() === false){

    session_destroy();
    header('Location:../index.php');
    exit();

}
require '../core/init.php';
require '../core/function/cscco.php';

include '../components/cscordinator_head.php'; ?>

</head>



<?php include "comp/navbar.php"; ?>

</br>


			
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js"></script>
 <script>
 var app = angular.module("myapp", []);
app.controller("ListController", ['$scope', function($scope) {
    $scope.personalDetails = [
        
        
        {
            
            'date':'',
            's_time':'',
            'e_time':'',
            'lecturer':'',
            'lectureroom':''
        }];
    
        $scope.addNew = function(personalDetail){
            $scope.personalDetails.push({ 
               
            'date':'',
            's_time':'',
            'e_time':'',
            'lecturer':'',
            'lectureroom':''
            });
        };
    
        $scope.remove = function(){
            var newDataList=[];
            $scope.selectedAll = false;
            angular.forEach($scope.personalDetails, function(selected){
                if(!selected.selected){
                    newDataList.push(selected);
                }
            }); 
            $scope.personalDetails = newDataList;
        };
    
    $scope.checkAll = function () {
        if (!$scope.selectedAll) {
            $scope.selectedAll = true;
        } else {
            $scope.selectedAll = false;
        }
        angular.forEach($scope.personalDetails, function(personalDetail) {
            personalDetail.selected = $scope.selectedAll;
        });
    };    
    
    
}]);
</script>
            
            
			
<body ng-app="myapp" ng-controller="ListController">     
    
               
			

                    <div class="panel-body">
                        <form ng-submit="addNew()"><div class="col-xs-12 col-sm-4 col-md-10 ">
                            <center><h3>Time Table</h3></center> 
                            
                            <table class="table table-bordred table-striped" style="width: 100%" id="lectable">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll()" /></th>
                                        <th>Week/Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Lecturer</th>
                                        <th>Lecture Room</th>
                                    </tr>
                                </thead>
                                <div class="form-group">
					<label class="col-md-2 control-label" >Course Name</label>
					<div class="col-md-5 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="course_name" class="form-control selectpicker" >
										<option value=" " >Please select subject</option>

										<?php

										$subs = getsubsfor();

										while ( $subjects = $subs->fetch_assoc()){ ?>

											<option value="<?php echo $subjects['subject']; ?>"><?php echo $subjects['subject']; ?></option>

									<?php	}



										?>

									</select>
                            
						</div>
					</div>
				</div>
                    
                                <form class="form-horizontal" action=" " method="post"  id="contact_form">


						<div class="form-group">
							<label class="col-md-2 control-label">Batch</label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
									<input  name="batch" placeholder="Batch" class="form-control"  type="text" required>
								</div>
							</div>
						</div>
                                </td></td>
                                <tbody>
                                    <tr ng-repeat="personalDetail in personalDetails">
                                        <td>
                                            <input type="checkbox" ng-model="personalDetail.selected"/></td>
                                        <td>
                                            <input type="date" class="form-control" name="date" ng-model="personalDetail.date"  required/></td>
                                        <td>
                                            <input type="time" class="form-control"  name="s_time1" ng-model="personalDetail.s_time1" required/>
                                            <input type="time" class="form-control"  name="s_time2" ng-model="personalDetail.s_time2" required/>
                                            <input type="time" class="form-control"  name="s_time3" ng-model="personalDetail.s_time3" required/>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control"   name="e_time1" ng-model="personalDetail.e_time1" required/>
                                            <input type="time" class="form-control"   name="e_time2" ng-model="personalDetail.e_time2" required/>
                                            <input type="time" class="form-control"   name="e_time3" ng-model="personalDetail.e_time3" required/>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"  name="lecturer_name" ng-model="personalDetail.lecturer_name" required/></td>
                                        <td>
                                            <input type="text" class="form-control"name="room" ng-model="personalDetail.room" required/></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <input ng-hide="!personalDetails.length" type="button" class="btn btn-danger pull-right" ng-click="remove()" value="Remove">
                                <input type="submit" class="btn btn-primary addnew pull-right" value="Add New">
                            </div>
                        </form>
                    <center><div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<button type="submit" class="btn btn-info" name="submit">Submit <span class="glyphicon glyphicon-send"></span> </button>
								<button type="reset" class="btn btn-info" >Cancel <span class="glyphicon glyphicon-remove"></span> </button>
							</div>
						</div>

					</center>
                
            </div>
        
<?php include "../components/cscordinator_footer.php"; ?>

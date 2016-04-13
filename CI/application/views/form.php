<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script>
var myapp = angular.module('myModule',[])
                   .controller('myController',function($scope,$http){
                    $scope.user=[{email:''}];
                    $scope.addNewChoice=function(){
                           var append =  $scope.user.length+1;
                            $scope.user.push({});  
                                                    //console.log(append);
                    }

                     $scope.removeNewChoice=function(){
                           var append =  $scope.user.length-1;
                            $scope.user.splice(append);  
                                                    //console.log(append);
                    }

                    $scope.submit=function(){
                      // console.log($scope.user);
                       $http({
                        method:'post',
                        url:'http://localhost/CI/index.php/Controller/data',
                        data:$scope.user
                       })
                       .then(success,failed)
                        var success=function(){

                        $scope.ok=response.data;
                        console.log($scope.ok);
                       }
                        }
                       
                        var failed=function(){
                        $scope.notok=response.data;
                        console.log($scope.notok);
                       }
                    
                   }) 
  </script>
</head>
<body>

<div class="container">
  <h2>Inline form</h2>

  <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p>
  <form class="form-inline" role="form" name="form" ng-app="myModule" ng-controller="myController">
    <span ng-show="form.$error.required">Username is required.</span>
    <div class="form-group" ng-repeat="user in user">
      <label for="email">Email:</label>
      <input type="email"  ng-model="user.email"  name="email" class="form-control" id="email" placeholder="Enter email"  required>
     
       <button class="remove" ng-show="$last" ng-click="removeNewChoice()">-</button>
    </div>
<button class="addfields" ng-click="addNewChoice()">Add fields</button>
    
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" ng-click="submit()" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

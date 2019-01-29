var app = angular.module("myApp", []);
    app.controller("myCtrl", function($scope){
        $scope.firstName = "";
        $scope.lastName = "";
        $scope.fullName = function(){
            return $scope.firstName + " " + $scope.lastName;
        };
    });
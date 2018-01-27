var app = angular.module('schoolApp',['schoolRouting']);
app.controller('schoolController', function ($scope, $rootScope) {
    $rootScope.schoolData = [];
    this.newSchool = [];
    this.createSchool = function () {
        this.newSchool = {
            "name": $scope.schoolname,
            "email": $scope.schoolemail,
            "address": $scope.schooladdress,
            "phone": $scope.schoolphone,
            "cac": $scope.schoolcac,
            "description":$scope.schooldescription
        };
        $rootScope.schoolData.push(this.newSchool);
        console.log($rootScope.schoolData);
    };
});

app.controller('mainController', function($scope){

});
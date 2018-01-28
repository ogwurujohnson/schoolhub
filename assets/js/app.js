var app = angular.module('schoolApp',['schoolRouting','schoolHubDAO']);
app.controller('schoolController', function ($scope, schoolhub) {
    this.createSchool = function () {
        this.newSchool = {
            "name": $scope.schoolname,
            "category":$scope.schoolcategory,
            "cacnumber":$scope.schoolcacnumber,
            "website":$scope.schoolwebsite,
            "email": $scope.schoolemail,
            "address": $scope.schooladdress,
            "phonenumber": $scope.schoolphonenumber,
            "description":$scope.schooldescription,
            "country":$scope.schoolcountry,
            "image":'',
            "facilities":$scope.facilities1,
            "openingtime":$scope.schoolopeningtime,
            "closingtime":$scope.schoolclosingtime
        };
        if(schoolhub.addNewSchool(this.newSchool)){
            alert("School Registered Successfully!");
        }
    };
});

app.controller('mainController', function($scope){

});
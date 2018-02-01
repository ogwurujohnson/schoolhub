var app = angular.module('schoolApp',['schoolRouting','schoolHubDAO']);
app.controller('schoolController', function ($scope, schoolhub) {
    schoolhub.getAllSchoolCategories();
    schoolhub.getAllSchools();
});

app.controller('addSchoolController', function($scope,schoolhub){
    schoolhub.getAllSchoolCategories();
    this.createSchool = function () {
        if($scope.schoolwebsite == null) $scope.schoolwebsite = "";
        if($scope.schooldescription == null) $scope.schooldescription = "";
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
            "openingtime":$scope.schoolopeningtime,
            "closingtime":$scope.schoolclosingtime
        };
        console.log(this.newSchool);
        if(schoolhub.addNewSchool(this.newSchool)){
            alert("School Registered Successfully!");
        }
    };
});

app.controller('singleSchoolController', function($scope,$routeParams,schoolhub){
    var id = $routeParams.id;
    schoolhub.getParticularSchoolDetails(id);
});
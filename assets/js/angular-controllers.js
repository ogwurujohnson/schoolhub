var app = angular.module('schoolApp', ['ngRoute']);

app.config(function ($routeProvider) {

    //**START** routing for views 
    $routeProvider.when('/', {
        templateUrl: 'index.html',
        controller:'mainController'
    }).when('/newSchool', {
        templateUrl: 'newSchool.html',

        controller: 'schoolController'

        

    }).when('/featuredSchools', {
        templateUrl: 'featuredSchools.html',
        controller: 'mainController'
    }).when('/schoolleaderboard', {
        templateUrl: 'schoolleaderboard.html',
        controller: 'mainController'
        });
    //**END** routing for views
});


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

app.controller('mainController', function ($scope) {


});
var app = angular.module('schoolRouting', ['ngRoute']);
app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'home.html',
        controller:'mainController'
    }).when('/newSchool', {
        templateUrl: 'newSchool.html',
        controller: 'mainController'
    }).when('/schoolDetails', {
        templateUrl: 'schoolDetails.html',
        controller: 'mainController'
    }).when('/schoolLeaderBoard', {
        templateUrl: 'schoolleaderboard.html',
        controller: 'mainController'
    }).when('/searchSchool',{
        templateUrl:'searchSchool.html',
        controller:'mainController'
    }).when('/thankYou',{
        templateUrl:'thank-you.html',
        controller:'mainController'
    }).otherwise({
        templateUrl:'home.html',
        controller:'mainController'
    });
});
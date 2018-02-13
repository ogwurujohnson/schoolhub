var app = angular.module('schoolRouting', ['ngRoute']);
app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'home.html',
        controller:'schoolController'
    }).when('/newSchool', {
        templateUrl: 'newSchool.html',
        controller: 'addSchoolController'
    }).when('/schoolDetails/:id', {
        templateUrl: 'schoolDetails.html',
        controller: 'singleSchoolController'
    }).when('/schoolLeaderBoard', {
        templateUrl: 'schoolleaderboard.html',
        controller: 'schoolController'
    }).when('/searchSchool',{
        templateUrl:'searchSchool.html',
        controller:'schoolController'
    }).when('/thankYou',{
        templateUrl:'thank-you.html',
        controller:'mainController'
    }).when('/thankYouNewSchool',{
        templateUrl:'thank-you-new-school.html',
        controller:'mainController'
    }).otherwise({
        templateUrl:'home.html',
        controller:'schoolController'
    });
});
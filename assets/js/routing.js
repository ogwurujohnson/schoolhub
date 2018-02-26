var app = angular.module('schoolRouting', ['ngRoute']);
app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'landing.html',
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
    }).when('/createAdvert',{
        templateUrl:'create-ad.html',
        controller:'mainController'
    }).when('/viewAdvert',{
        templateUrl:'ad-listing.html',
        controller:'mainController'
    }).when('/searchSchool',{
        templateUrl:'searchSchool.html',
        controller:'schoolController'
    }).when('/search/:query',{
        templateUrl:'search.html',
        controller:'searchQueryController'
    }).when('/thankYou',{
        templateUrl:'thank-you.html',
        controller:'mainController'
    }).when('/thankYouNewSchool',{
        templateUrl:'thank-you-new-school.html',
        controller:'mainController'
    }).otherwise({
        templateUrl:'landing.html',
        controller:'schoolController'
    });
});
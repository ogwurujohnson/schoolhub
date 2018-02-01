var app = angular.module('schoolHubDAO', []);
app.factory('schoolhub', function ($http, $rootScope) {
    var schoolhubObject = {};

    schoolhubObject.getAllSchools = function () {
        $http.get('api/visitor/allschools').then(function (data) {
            $rootScope.allschools = data.data;
            console.log($rootScope.allschools);
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.getAllSchoolCategories = function () {
        $http.get('api/visitor/allschoolcategories').then(function (data) {
            $rootScope.schoolCategories = data.data;
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.getSchoolReport = function(id){
        return {};
    };
    schoolhubObject.getParticularSchoolDetails = function (id) {
        $http.get('api/visitor/getparticularschooldetails/'+id).then(function (data) {
            $rootScope.singleSchool = data.data;
            console.log($rootScope.singleSchool);
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.getAllReport = function () {
        return {};
    };
    schoolhubObject.addReview = function (formData) {
        return {};
    };
    schoolhubObject.addNewSchool = function (formData) {
        $http.post('api/visitor/addNewSchool', formData).then(function (data) {
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    return schoolhubObject;
});

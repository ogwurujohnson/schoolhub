var app = angular.module('schoolHubDAO', []);
app.factory('schoolhub', function ($http) {
    var schoolhubObject = {};
    var response = null;
    schoolhubObject.getAllSchools = function () {
        return {};
    };
    schoolhubObject.getAllSchoolCategories = function () {
        return {};
    };
    schoolhubObject.getSchoolReport = function(id){
        return {};
    };
    schoolhubObject.getParticularSchoolDetails = function (id) {
        return {};
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

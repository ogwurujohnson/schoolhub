var app = angular.module('schoolHubDAO', []);
app.factory('schoolhub', function ($http, $rootScope) {
    var schoolhubObject = {};

    schoolhubObject.getAllSchools = function () {
        $http.get('api/visitor/allschools').then(function (data) {
            $rootScope.allschools = data.data;
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

    schoolhubObject.getParticularSchoolDetails = function (id) {
        $http.get('api/visitor/getparticularschooldetails/'+id).then(function (data) {
            $rootScope.singleSchool = data.data;
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };

    schoolhubObject.getSchoolReview = function (id){
        $http.get('api/visitor/getschoolreview/'+id).then(function (data) {
            $rootScope.schoolreview = data.data;
            console.log($rootScope.schoolreview);
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };

    schoolhubObject.getAllReviewTypes = function () {
        $http.get('api/visitor/allreviewtypes').then(function (data) {
            $rootScope.reviewTypes = data.data;
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.addReview = function (formData, schoolId) {
        $http.post('api/visitor/addReview/'+schoolId, formData).then(function (data) {
            return true;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.addNewSchool = function (formData) {
        $http.post('api/visitor/addNewSchool', formData).then(function (data) {
            return true;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.updateParticularSchoolReview = function (formData, schoolid) {
        $http.post('api/visitor/updateParticularSchoolReview/'+schoolid, formData).then(function (data) {
            return true;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    return schoolhubObject;
});

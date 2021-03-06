var app = angular.module('schoolHubDAO', []);
app.factory('schoolhub', function ($http, $rootScope) {
    var schoolhubObject = {};

    schoolhubObject.getAllSchools = function () {
        $http.get('api/visitor/allschools').then(function (data) {
            $rootScope.allschools = data.data;
            var parseId = function(school){
                for(var i = 0; i < school.length; i++){
                    school[i][9] = parseInt(school[i][9]);
                    school[i][13] = school[i][13] === null ? 0 : Math.round(parseFloat(school[i][13]));
                }
                return school;
            };
            $rootScope.allschools = parseId($rootScope.allschools);
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };

    schoolhubObject.getTopSchools = function (){
        $http.get('api/visitor/topschools').then(function (data){
            $rootScope.topschools = data.data;
            var parseId = function(topschool){
                for(var i = 0; i < topschool.length; i++){
                    topschool[i][9] = parseInt(topschool[i][9]);
                    topschool[i][13] = topschool[i][13] === null ? 0 : Math.round(parseFloat(topschool[i][13]));
                }
                return topschool;
            };
            $rootScope.topschools = parseId($rootScope.topschools);
            return data;
        }, function (error){
            console.log(error);
            return false;
        });
    };

    schoolhubObject.getLeaderBoard = function (){
        $http.get('api/visitor/schoolleaderboard').then(function (data){
            $rootScope.schoolleaderboard = data.data;
            var parseId = function(leaderboard){
                for(var i = 0; i < leaderboard.length; i++){
                    leaderboard[i][9] = parseInt(leaderboard[i][9]);
                    leaderboard[i][13] = leaderboard[i][13] === null ? 0 : Math.round(parseFloat(leaderboard[i][13]));
                }
                return leaderboard;
            };
            $rootScope.schoolleaderboard = parseId($rootScope.schoolleaderboard);
            return data;
        }, function (error){
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
            var parseId = function(school){
                    school[0][9] = parseInt(school[0][9]);
                    school[0][13] = school[0][13] === null ? 0 : Math.round(parseFloat(school[0][13]));
                return school;
            };
            $rootScope.singleSchool = parseId($rootScope.singleSchool);
            console.log($rootScope.singleSchool);
            return data;
        }, function (error) {
            console.log(error);
            return false;
        });
    };

    schoolhubObject.getSchoolReview = function (id){
        $http.get('api/visitor/getschoolreview/'+id).then(function (data) {
            $rootScope.schoolreview = data.data;
            var parseId = function(school){
                for(var i = 0; i < school.length; i++){
                    school[i]["Rating"] = parseInt(school[i]["Rating"]);
                }
                return school;
            };
            $rootScope.schoolreview = parseId($rootScope.schoolreview);
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
            console.log(data);
            return true;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.checkReviewer = function(formData, schoolId){
        $http.post('api/visitor/checkReviewer/'+schoolId, formData).then(function (data) {
            $rootScope.isReviewed = data.data;
            return true;
        }, function (error) {
            console.log(error);
            return false;
        });
    };
    schoolhubObject.getTopicRating = function (schoolId) {
        $http.get('api/visitor/getTopicRating/'+schoolId).then(function (data) {
            $rootScope.topicRating = data.data;
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

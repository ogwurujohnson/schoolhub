var app = angular.module('schoolApp',['schoolRouting','schoolHubDAO']);
app.controller('schoolController', function ($scope, schoolhub) {
    schoolhub.getAllSchoolCategories();
    schoolhub.getAllSchools();
});

app.controller('addSchoolController', function($scope,schoolhub){
    schoolhub.getAllSchoolCategories();
    var controller = this;
    controller.createSchool = function () {
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
        schoolhub.addNewSchool(this.newSchool);
            alert("School Registered Successfully!");
    };
});

app.controller('singleSchoolController', function($scope,$routeParams,schoolhub,$rootScope){
    var id = $routeParams.id;
    schoolhub.getParticularSchoolDetails(id);
    schoolhub.getSchoolReview(id);
    /*var schoolreviewvar = $rootScope.schoolreview;
    console.log(schoolreviewvar);
    for(var i = 0;  i < schoolreviewvar.length; i++){
        var num = parseInt($rootScope.schoolreviewvar[i][3]);
        console.log(num);*/
    }
})
app.controller('reviewController', function($scope, schoolhub, $routeParams, $rootScope){
    schoolhub.getAllReviewTypes();
    var controller = this;
    var schoolId = $routeParams.id;

    controller.addReview = function(){
        if($scope.reviewstars == null) $scope.reviewstars = 0;
        this.newReview = {
            "reviewtype":$scope.schoolreviewtype,
            "reviewdescription":$scope.schoolreviewdescription,
            "stars":$scope.reviewstars
        };
        console.log(this.newReview);
        schoolhub.addReview(this.newReview, schoolId);
        controller.updateReview();
    };

    controller.updateReview = function() {
        this.reviewData = {
            "totalrating": parseInt($rootScope.singleSchool[0][8]) + parseInt($scope.reviewstars),
            "ratecount": parseInt($rootScope.singleSchool[0][9]) + 1
        };
        console.log(this.reviewData);
        schoolhub.updateParticularSchoolReview(this.reviewData, schoolId);
        alert("Thanks for your review!");
    };
});
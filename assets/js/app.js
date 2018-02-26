var app = angular.module('schoolApp',['schoolRouting','schoolHubDAO']);

app.controller('schoolController', function ($scope, schoolhub, $window) {
    schoolhub.getAllSchoolCategories();
    schoolhub.getAllSchools();
    schoolhub.getTopSchools();
    schoolhub.getLeaderBoard();

    $scope.searchSchool = function(){
        $window.location.href = '#!/search/'+$scope.txtquery;
    };
});

app.controller('searchQueryController', function($scope,$routeParams,schoolhub,$rootScope){
    var query = $routeParams.query;
    schoolhub.getAllSchools();
    $scope.keyword = query;
});

app.controller('addSchoolController', function($scope,schoolhub,$http,$window){
    schoolhub.getAllSchoolCategories();
    var controller = this;
    controller.form = [];
    controller.files = [];
    $scope.imagepath = '';

    $scope.uploadedImage = function(element) {
        controller.currentFile = element.files[0];
        controller.files = element.files;

        var reader = new FileReader();
        reader.onload = function(event) {
            $scope.image_source = event.target.result;
            $scope.$apply(function($scope) {
                controller.files = element.files;
            });
        };
        reader.readAsDataURL(element.files[0]);

        controller.form.image = controller.files[0];
        $http({
            method  : 'POST',
            url     : 'api/visitor/uploadSchoolImage',
            processData: false,
            transformRequest: function (data) {
                var formData = new FormData();
                formData.append("image", controller.form.image);
                return formData;
            },
            data : controller.form,
            headers: {
                'Content-Type': undefined
            }
        }).then(function(data){
            if(data.data.success === false){
                console.log('An Error Occured!');
            }else{
                $scope.imagepath = 'assets/img/'+data.data.success;
                console.log($scope.imagepath);
            }
        });
    };

    controller.createSchool = function () {
        if($scope.schoolwebsite == null) $scope.schoolwebsite = "";
        if($scope.schooldescription == null) $scope.schooldescription = "";
        if($scope.schoolphonenumber == null) $scope.schoolphonenumber = "";

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
            "image":$scope.imagepath,
            "openingtime":$scope.schoolopeningtime,
            "closingtime":$scope.schoolclosingtime
        };
        schoolhub.addNewSchool(this.newSchool);
        $window.location.href = 'index.html#!/thankYouNewSchool';
    };
});

app.controller('singleSchoolController', function($scope,$routeParams,schoolhub,$rootScope){
    var id = $routeParams.id;
    schoolhub.getParticularSchoolDetails(id);
    schoolhub.getSchoolReview(id);
    $scope.getNumber = function(num) {
        var numarray = [];
        for(var i = 0; i < num; i++){
            numarray.push(i);
        }
        return numarray;
    };
});

app.controller('reviewController', function($scope, schoolhub, $routeParams, $rootScope, $window){
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
        $window.location.href = 'index.html#!/thankYou';
    };
});
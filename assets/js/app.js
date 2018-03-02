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
    var controller = this;
    var schoolId = $routeParams.id;

    schoolhub.getAllReviewTypes();
    schoolhub.getTopicRating(schoolId);

    var vm = this;
    vm.step = "one";
    vm.stepOne = stepOne;
    vm.stepTwo = stepTwo;
    vm.stepThree = stepThree;
    vm.stepFour = stepFour;
    vm.stepFive = stepFive;
    vm.stepSix = stepSix;
    vm.stepSeven = stepSeven;
    vm.complete = complete;

    function stepOne() {
        vm.step = "one";
    }

    function stepTwo() {
        vm.step = "two";
    }

    function stepThree() {
        vm.step = "three";
    }

    function stepFour() {
        vm.step = "four";
    }

    function stepFive() {
        vm.step = "five";
    }

    function stepSix() {
        vm.step = "six";
        document.getElementById('recaptchaDiv').innerHTML = "";
    }

    function stepSeven() {
        document.getElementById('recaptchaDiv').innerHTML = "";
        if(vm.reviewphonenumber){
            var reviewer = {
              "phone":vm.reviewphonenumber
            };
            schoolhub.checkReviewer(reviewer, schoolId);
            if($rootScope.isReviewed["success"]){
                alert('Sorry! You cannot review a school twice.');
                vm.step = "six";
            }else{
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptchaDiv', {
                    'size': 'invisible',
                    'callback': function(response) {
                        console.log('reCAPTCHA solved, allow signInWithPhoneNumber.');
                    }
                });
                var phoneNumber = '+234'+vm.reviewphonenumber;
                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                    .then(function (confirmationResult) {
                        // SMS sent. Prompt user to type the code from the message, then sign the
                        // user in with confirmationResult.confirm(code).
                        window.confirmationResult = confirmationResult;
                        vm.step = "seven";
                    }).catch(function (error) {
                    console.log('Error; SMS not sent');
                    console.log(error);
                    alert('Oops! An error ocurred. Please check your network and try again.');
                    $window.location.reload();
                });
            }
        }else{
            alert('Empty Phone Number!');
            vm.step = "six";
        }
    }

    function complete(){
        document.getElementById('recaptchaDiv').innerHTML = "";
        var code = vm.reviewotp;
        confirmationResult.confirm(code).then(function (result) {
            // User signed in successfully.
            controller.addReview();
            alert('Review Successful!');
        }).catch(function (error) {
            // User couldn't sign in (bad verification code?)
            alert('Wrong Verification Code');
        });
    }

    controller.addReview = function(){
        vm.reviewfacilitystars = vm.reviewfacilitystars ==  null ? 0 : vm.reviewfacilitystars;
        vm.reviewacademicstars = vm.reviewacademicstars ==  null ? 0 : vm.reviewacademicstars;
        vm.reviewteacherstars = vm.reviewteacherstars ==  null ? 0 : vm.reviewteacherstars;
        vm.reviewenvironmentstars = vm.reviewenvironmentstars ==  null ? 0 : vm.reviewenvironmentstars;

        var reviewstars = {
            "Facilities":vm.reviewfacilitystars,
            "Academic":vm.reviewacademicstars,
            "Quality":vm.reviewteacherstars,
            "Learning":vm.reviewenvironmentstars
        };

        this.newReview = {
            "reviewdescription":vm.schoolreviewdescription,
            "reviewstars":reviewstars,
            "reviewphonenumber":vm.reviewphonenumber
        };

        console.log(this.newReview);
        schoolhub.addReview(this.newReview, schoolId);
        controller.updateReview();
    };

    controller.updateReview = function() {
        this.reviewData = {
            "totalrating": parseInt($rootScope.singleSchool[0][8]) + parseInt(vm.reviewfacilitystars) + parseInt(vm.reviewacademicstars) + parseInt(vm.reviewteacherstars)  + parseInt(vm.reviewenvironmentstars),
            "ratecount": parseInt($rootScope.singleSchool[0][9]) + 1
        };
        console.log(this.reviewData);
        schoolhub.updateParticularSchoolReview(this.reviewData, schoolId);
        $window.location.href = 'index.html#!/thankYou';
    };
});

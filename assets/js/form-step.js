'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.formParams = {};
  $scope.stage = "";
  $scope.formValidation = false;
  $scope.toggleJSONView = false;
  $scope.toggleFormErrorsView = false;
  
  $scope.formParams = {
    ccEmail: '',
    ccEmailList: []
  };
  
  // Navigation functions
  $scope.next = function (stage) {
    //$scope.direction = 1;
    //$scope.stage = stage;
    
    $scope.formValidation = true;
    
    if ($scope.multiStepForm.$valid) {
      $scope.direction = 1;
      $scope.stage = stage;
      $scope.formValidation = false;
    }
  };

  $scope.back = function (stage) {
    $scope.direction = 0;
    $scope.stage = stage;
  };
  
  // CC email list functions
  $scope.addCCEmail = function () {
    $scope.rowId++;

    var email = {
      email: $scope.formParams.ccEmail,
      row_id: $scope.rowId
    };

    $scope.formParams.ccEmailList.push(email);

    $scope.formParams.ccEmail = '';
  };

  $scope.removeCCEmail = function (row_id) {
    for (var i = 0; i < $scope.formParams.ccEmailList.length; i++) {
      if ($scope.formParams.ccEmailList[i].row_id === row_id) {
        $scope.formParams.ccEmailList.splice(i, 1);
        break;
      }
    }
  };
  
  
  // Post to desired exposed web service.
  $scope.submitForm = function () {
    var wsUrl = "someURL";

    // Check form validity and submit data using $http
    if ($scope.multiStepForm.$valid) {
      $scope.formValidation = false;

      $http({
        method: 'POST',
        url: wsUrl,
        data: JSON.stringify($scope.formParams)
      }).then(function successCallback(response) {
        if (response
          && response.data
          && response.data.status
          && response.data.status === 'success') {
          $scope.stage = "success";
        } else {
          if (response
            && response.data
            && response.data.status
            && response.data.status === 'error') {
            $scope.stage = "error";
          }
        }
      }, function errorCallback(response) {
        $scope.stage = "error";
        console.log(response);
      });
    }
  };
  
  $scope.reset = function() {
    // Clean up scope before destorying
    $scope.formParams = {};
    $scope.stage = "";
  }
}]);
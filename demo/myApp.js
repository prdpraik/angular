var app = angular.module("myApp", ["ngRoute"]);


app.directive('checkEmailExists', function ($http){ 
   return {
      require: 'ngModel',
      link: function(scope, elem, attr, ngModel) {
		  var valid = false;
		 var validate = function(viewValue){
		$http({
		method: 'post',
		url: 'test.php',
		async:'false',
			data: $.param({
					action:3,
					email:viewValue
			}),
			dataType: 'json',
			headers: {
			'Content-Type': 'application/x-www-form-urlencoded'
			}
	  }).then(function successCallback(response) {
		valid = response.data.status;
		
		 ngModel.$setValidity('checkEmailExists', !valid);
            return viewValue;
		 
	  });
		 
		 
		 }
		 
		 
		ngModel.$parsers.unshift(validate);
        ngModel.$formatters.push(validate);

        attr.$observe('checkEmailExists', function (comparisonModel) {
            return validate(ngModel.$viewValue);
        });
		 
		 
      }
   };
});

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "login.htm",
		controller : "dashboard"
    })
	.when("/dashboard", {
	    templateUrl : "dashboard.php",
		controller : "dashboard"
	}).when("/logout", {
	    templateUrl : "logout.php",
		controller : "logout"
	})
	.when("/add_user", {
	    templateUrl : "add_user.php",
		controller : "add_user"
	})
	
	.otherwise({
        templateUrl :"404.html",
		 controller : "londonCtrl"
		
    });
	});

app.controller("londonCtrl", function ($scope) {
    $scope.msg = 'images.png';
});
app.controller("add_user", function ($scope) {
$scope.add_user_class="active";

});
app.controller("logout", function ($scope, $location) {
 $location.url('/');
   // $scope.msg = 'images.png';
  // alert(1);
});
app.controller("myCtrl", function($scope,$http) {
$scope.email_validate=false;
$scope.is_exists=false;
$scope.tempUser = { email : ""};
 $scope.myTxt = "You have not yet clicked submit";
  $scope.myFunc = function (myForm) {
  if($scope.tempUser.email!=""){
    //$scope.checkEmail();
	}
	alert(myForm.$valid);

     console.log($scope.tempUser.email);
	 $scope.email_validate=true; 
     $scope.myTxt = "You clicked submit!";
  }
  /* $scope.checkEmail = function(){
	   $http({
		method: 'post',
		url: 'test.php',
		async:'false',
			data: $.param({
					action:3,
					email:$scope.tempUser.email
			}),
			dataType: 'json',
			headers: {
			'Content-Type': 'application/x-www-form-urlencoded'
			}
	  }).then(function successCallback(response) {
		$scope.is_exists=response.data.status;
		
	 // $scope.isexists=response.data.status;
	 //  alert(response);
	   //$scope.unamestatus = response.data;
	  });
   };*/
   var compareTo = function() {
    return {
      require: "ngModel",
      scope: {
        otherModelValue: "=compareTo"
      },
      link: function(scope, element, attributes, ngModel) {

        ngModel.$validators.compareTo = function(modelValue) {
          return modelValue == scope.otherModelValue;
        };

        scope.$watch("otherModelValue", function() {
          ngModel.$validate();
        });
      }
    };
  };

  app.directive("compareTo", compareTo);
  app.controller("RegistrationController", RegistrationController);
   
});
app.controller("dashboard", function ($scope,$http,$location) {
   $http({
                method: 'POST',
                url: 'test.php',
                data: $.param({action:2}),
                dataType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (result) {
			   if(result.return==1){
			    if($location.$$path!='/dashboard'){
						$location.url('dashboard');
				 }
					$scope.home_class="active";
					$scope.welecome_msg="Welcome "+result.name;
				} else {
				  $location.url('/');
				}
            }) .error(function (xhr, ajaxOptions, thrownError) {
						
							alert("ss");
			 });
});
app.controller('validateCtrl', function($scope,$http,$location) {
$scope.submited=false;
$scope.email="";
$scope.pwd="";
 $scope.tempUser = {};
$scope.submitf = function(){
   $http({
                method: 'POST',
                url: 'test.php',
                data: $.param({action:1,'user' : $scope.tempUser}),
                dataType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (result) {
			   if(result.result==1){
			      $location.url('dashboard');
				} else {
				 alert('login failed');
				}
            }) .error(function (xhr, ajaxOptions, thrownError) {
						
							alert("ss");
			 });
						
						
						
						
console.log("posting data....");
 //alert($scope.form);
formData = $scope.form;
        console.log(formData);

}

 $scope.save = function() {
        formData = $scope.form;
        console.log (formData);
    };

});

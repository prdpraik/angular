<html>
   
   <head>
      <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   </head>
   
   <body ng-app = "myApp">
	
      <div ng-controller = "myCtrl">
         <input type="file" file-model = "myFile" />
         <button ng-click="uploadFile()">upload me</button> <img ng-if="image_name" width="100" src="images/{{ image_name }}" />
      </div>
      
      <script>
         var myApp = angular.module('myApp', []);
         
         myApp.directive('fileModel', ['$parse', 'fileUpload', function ($parse,fileUpload) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
				   
                  var modelSetter = model.assign;
                  
                  element.bind('change', function(){
				   
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
						
						 var file = scope.myFile;
						 
						 var uploadUrl = "upload_image.php";
						 fileUpload.uploadFileToUrl(file, uploadUrl,scope);
                     });
                  });
               }
            };
         }]);
      
         myApp.service('fileUpload', ['$http', function ($https) {
            this.uploadFileToUrl = function(file, uploadUrl,scope){
			// alert(scope);
               var fd = new FormData();
               fd.append('file', file);
            
               $https.post(uploadUrl, fd, {
                  transformRequest: angular.identity,
                  headers: {'Content-Type': undefined}
               })
            
               .success(function(data){
			    console.log(data);
				scope.image_name=data.image_name;
               })
            
               .error(function(){
               });
            }
         }]);
      
         myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
		 $scope.image_name="";
            /*$scope.uploadFile = function(){
               var file = $scope.myFile;
               
               console.log('file is ' );
               console.dir(file);
               
               var uploadUrl = "upload_image.php";
               fileUpload.uploadFileToUrl(file, uploadUrl);
            };*/
         }]);
			
      </script>
      
   </body>
</html>
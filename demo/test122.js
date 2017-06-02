var app = angular.module('form-example', []);

app.directive('passwordValidate', function() {
    return {
        require: 'ngModel',
        link: function(scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function(viewValue) {

                scope.pwdValidLength = (viewValue && viewValue.length >= 8 ? 'valid' : undefined);
                scope.pwdHasLetter = (viewValue && /[A-z]/.test(viewValue)) ? 'valid' : undefined;
                scope.pwdHasNumber = (viewValue && /\d/.test(viewValue)) ? 'valid' : undefined;

                if(scope.pwdValidLength && scope.pwdHasLetter && scope.pwdHasNumber) {
                    ctrl.$setValidity('pwd', true);
                    //elm.$setValidity('pwd', true); //<-- I WANT THIS TO WORK! (or something like it)
                    
                    return viewValue;
                } else {
                    ctrl.$setValidity('pwd', false);                    
                    //elm.$setValidity('pwd', false); //<-- I WANT THIS TO WORK! (or something like it)
                    
                    return undefined;
                }

            });
        }
    };
});
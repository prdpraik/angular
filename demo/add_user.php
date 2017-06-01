<div class="container">
<?php require_once('menu.php'); ?>

  <div ng-controller="myCtrl" class="row content" >
		<form  ng-submit="myFunc(myForm)" name="myForm" class="form-horizontal" novalidate>
			<!--<input type="text">
			<input type="submit"> -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
						<input class="form-control" <?php /*check-email-exists */?> type="email" name="email" ng-model="tempUser.email" ng-required="true" placeholder="Enter email" />
						<!--<span style="color:red" ng-show="email_validate">
						<span ng-show="email_validate">Email is required.</span>
						</span>-->
					
						<span style="color:red" ng-show="email_validate && myForm.email.$invalid">
						<span ng-show="myForm.email.$error.required">Email is required.</span>
						
						<span ng-show="myForm.email.$error.email">Invalid email address.</span>
						
						<!--<span ng-show="myForm.email.$error.checkEmailExists">email exists.</span>-->
						 </span>
						 
					</div>
				</div>
					<div class="form-group" ng-class="{'has-error':tempUser.password.$invalid &amp;&amp; !tempUser.password.$pristine}">
						<label class="control-label col-sm-2" for="password">Password:</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" id="password" name="password" ng-model="tempUser.password" ng-minlength="8" ng-maxlength="20" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" placeholder="password" required="" class="ng-valid-maxlength ng-valid-minlength ng-dirty ng-valid-required ng-invalid ng-invalid-pattern">

							<!--<p ng-show="myForm.password.$error.required" class="error ng-hide">*</p>-->
							<p style="color:red">
							<span ng-show="email_validate && myForm.password.$error.required" >Password required.</span>
							<p ng-show="myForm.password.$error.minlength" class="error ng-hide">
							Passwords must be between 8 and 20 characters.</p>
							<p ng-show="myForm.password.$error.pattern" class="error">
							Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.)</p>
							</p>
						</div>
				</div>
					<div class="form-group" ng-class="{'has-error':tempUser.password_c.$invalid &amp;&amp; !tempUser.password_c.$pristine}">
						<label class="control-label col-sm-2" for="password_c">Confirm Password:</label>
						<div class="col-sm-10">
							 <input class="form-control" type="password" id="password_c" name="password_c" ng-model="tempUser.password_c" placeholder="confirm password" valid-password-c="tempUser.password" required="" class="ng-isolate-scope ng-pristine ng-invalid ng-invalid-required ng-valid-no-match">
							<p style="color:red">
							 <p ng-show="myForm.password_c.$error.noMatch" class="error ng-hide">Passwords do not match.</p>
							 </p>
							 <!--<p ng-show="myForm.password_c.$error.required" class="error">*</p>-->

						</div>
				</div>
				<div class="form-group">
						<label class="control-label col-sm-2" for="dob">DOB:</label>
					<div class="col-sm-10">
					 <input  class="form-control" type="date" id="exampleInput" name="dob" ng-model="tempUser.value"
				   placeholder="yyyy-MM-dd"  min="2000-<?php echo date("m"); ?>-<?php echo date("d"); ?>"  max="{{tempUser.currentDate | date: 'yyyy-MM-dd'}}" required />
						<p >
					<p style="color:red" ng-show="myForm.dob.$error.min" >DOB should be more then <?php echo date("d"); ?>-<?php echo date("m"); ?>-2000</p>
					<p style="color:red" ng-show="email_validate && myForm.dob.$error.max" >DOB should not be more then <?php echo date("d-m-Y"); ?></p>
					<p style="color:red" ng-show="!myForm.dob.$error.max && myForm.dob.$invalid" >Invalid date format</p> 
					</p>
						</div>
					
				</div>
				<ul>
			
				<!--<p>{{ myForm.dob }}</p>
				<p>{{ myForm.dob.$error }}</p>
				<p>{{ myForm.dob.$invalid }}</p>
				<p>{{tempUser.currentDate | date: 'yyyy-MM-dd'}}</p>-->
  <li ng-repeat="(key, errors) in myForm.$error track by $index"> <strong>{{ key }}</strong> errors
    <ul>
      <li ng-repeat="e in errors">{{ e.$name }} has an error: <strong>{{ key }}</strong>.</li>
    </ul>
  </li>
</ul>
				<?php /*<div class="form-group">
				<label class="control-label col-sm-2" for="email">Password:</label>
				<div class="col-sm-10">
				<input type="text" name="username" class="form-control" ng-model="registration.user.username" required />
				<div ng-messages="registrationForm.username.$error" ng-messages-include="messages.html"></div>
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="email">Confirm Password:</label>
				<div class="col-sm-10">
			<input type="password" name="confirmPassword" class="form-control" 
                   ng-model="registration.user.confirmPassword" 
                   required compare-to="registration.user.password" />
            <div ng-messages="registrationForm.confirmPassword.$error" ng-messages-include="messages.html"></div>
				</div>
				</div> */ ?>
					<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
			
					<button type="submit">Submit</button> 
						</div>
					</div>
		</form>
		<!--<p>{{myTxt}}</p>
		<p>{{email_validate}}</p>
 

<p>{{myForm.email }}</p>-->
<p>
	{{email_validate}}
	
</p>
<p>

</p>

					
  </div>
 </div>
 
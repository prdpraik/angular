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
				<div class="form-group">
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
				</div>
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
	{{myForm.$valid}}
	
</p>
<p>

</p>

					
  </div>
 </div>
 
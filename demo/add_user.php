<div class="container">
<?php require_once('menu.php'); ?>

  <div ng-controller="myCtrl" class="row content" >
		<form  ng-submit="myFunc()" name="myForm" class="form-horizontal" novalidate>
			<!--<input type="text">
			<input type="submit"> -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
						<input class="form-control" type="email" name="email" ng-model="tempUser.email" required placeholder="Enter email">
						<span style="color:red" ng-show="email_validate">
						<span ng-show="email_validate">Email is required.</span>
						</span>
						
						<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
						<span ng-show="myForm.email.$error.required">Email is required.</span>
						<span ng-show="myForm.email.$error.email">Invalid email address.</span>
						</span>
					</div>
				</div>
					<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
			
					<button type="submit">Submit</button> 
						</div>
					</div>
		</form>
		<p>{{myTxt}}</p>
		<p>{{email_validate}}</p>

<p>{{tempUser.email}}</p>
  </div>
 </div>
 
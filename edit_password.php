		<div class="central-meta">
			<div class="editing-info">
				<?php
				if(isset($_SESSION['success']))

				{
					echo $_SESSION['success'];
					unset($_SESSION["success"]);

				}
				?>

				<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>

				<form  method="post" action="update_profile.php">

					<input type="hidden" name='userlogin' value="<?php echo $data['id']?>">
					<div class="form-group">	
						<input type="password" 

						class="form-input"
						name="password_confirmation"
						data-validation="length"
						data-validation-length="min8"
						data-validation-error-msg = "password  value is shorter than 8 characters"
						id="password" 
						/>
						<label class="control-label" for="input">new password</label><i class="mtrl-select"></i>
					</div>

					<div class="form-group">	
						<input type="password"

						class="form-input"
						name="password" 
						data-validation="confirmation"
						data-validation-error-msg = "password is Not matched"
						id="password_confirmation" 
						/>
						<label class="control-label" for="input">reapet password</label><i class="mtrl-select"></i>
					</div>
					<div class="form-group">	
						<input type="password" id="checkPasswordCorrect" />
						<label class="control-label" for="input" >Current password</label><i class="mtrl-select"></i>
						<p id='user_password_invalid'></p>
					</div>

					<a class="forgot-pwd underline" title="" href="#">Forgot Password?</a>
					<div class="submit-btns">
						<button type="button" class="mtr-btn"><span>Cancel</span></button>
						<button id ="submitFormButton" name="submitFormButton" type="submit" class="mtr-btn"><span>Update</span></button>
					</div>
				</form>
			</div>
		</div>	
	</div><!-- centerl meta -->

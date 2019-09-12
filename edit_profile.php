			<div class="central-meta">
								<div class="editing-info">
									<?php
									if(isset($_SESSION['success']))

									{
										echo $_SESSION['success'];
												unset($_SESSION["success"]);
									}

									?>										<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>

									<form method="POST" action="update_profile.php?user_id=<?php echo $data['id']?> ">
										<div class="form-group half">	
											<input type="text" name="fname" id="input" value="<?php echo $data['fname'] ?>" required="required"/>
											<label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group half">	
											<input type="text" name="lname" value="<?php echo $data['lname'] ?>" required="required"/>
											<label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">	
											<input type="text" name="email" value="<?php echo $data['email'] ?>" required="required"/>
											<label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4b0e262a22270b">[email&#160;protected]</a></label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">	
											<input type="text" name="phone" value="<?php echo $data['phone'] ?>" required="required"/>
											<label class="control-label" for="input"><a href="#">phone no.</a></label><i class="mtrl-select"></i>
										</div>

							


										<div class="form-group">	
											<textarea name="about" rows="4" id="textarea" required="required">
												<?php  echo $data['about']?>

											</textarea>
											<label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
										</div>
										<div class="submit-btns">
											<button type="submit"   name='back'class="mtr-btn"><span>Cancel</span></button>
											<button type="submit" name='submitupdated' class="mtr-btn"><span>Update</span></button>
										</div>
									</form>

								</script>
							</div>
						</div>	
					</div><!-- centerl meta -->

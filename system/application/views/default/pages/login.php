<div id="login_wrapper">
					<span class="extra1"></span>
					<div class="title_wrapper">
						<h2>Please Login</h2>
						<a href="#">Lost password</a>
					</div>
					<?php echo form_open('login/submit'); ?>
						<fieldset>
							<!--[if !IE]>start row<![endif]-->
							<div class="row">
								<label for="username">Username:</label>
								<span class="input_wrapper">
                                                                    <?php echo form_input('username',set_value('username')); ?>
								</span>
							</div>
							<!--[if !IE]>end row<![endif]-->
							<!--[if !IE]>start row<![endif]-->
							<div class="row">
								<label>Password:</label>
								<span class="input_wrapper">
                                                                    <?php echo form_password('password'); ?>
								</span>
							</div>
							<!--[if !IE]>end row<![endif]-->
							<!--[if !IE]>start row<![endif]-->
							<!--<div class="row">
								<label class="inline"><input class="checkbox" name="" type="checkbox" value="" /> remember me on this computer</label>
							</div>-->
							<!--[if !IE]>end row<![endif]-->
							<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<div class="inputs small_inputs">
										<span class="button blue_button unlock_button"><span><span><em><span class="button_ico"></span>Login</em></span></span><?php echo form_submit('submit'); ?></span>
										<a href="/" class="button gray_button"><span><span>Back to site</span></span></a>
									</div>
								</div>
								<!--[if !IE]>end row<![endif]-->
						</fieldset>
					</form>
				</div>
				<!--[if !IE]>end login_wrapper<![endif]-->
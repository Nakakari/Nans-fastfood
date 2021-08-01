

<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			</div>
		
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">

					<div class="panel-heading">Pendaftaran Akun</div>
					<div class="panel-body">
						
							<?php echo form_open('register');?>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>"/>
									 <?php echo form_error('nama'); ?>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>"/>
									<?php echo form_error('username'); ?>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"/>
									 <?php echo form_error('email'); ?>
								</div>
								<div class="form-group">
									<label>Password </label>
									<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>"/>
									<?php echo form_error('password'); ?>
								</div>
								<!--<input type="hidden" name="level" value="2"/> -->
								<?php //echo form_error('level'); ?>
								<div class="form-group">
									<label>Password Confirm</label>
									<input type="password" class="form-control" name="password_conf" value="<?php echo set_value('password_conf'); ?>"/>
									<?php echo form_error('password_conf'); ?>
								</div>
									<button type="submit" class="btn btn-primary" name="btnSubmit" value="Daftar">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>
							<?php echo form_close();?>

					
					</div>
				</div><!-- /.panel-->
				
				</div>
				<a type="button" class="btn btn-md btn-info" href="<?php echo base_url('/beranda/'); ?>">Beranda</br></a>
			</div>
		
			
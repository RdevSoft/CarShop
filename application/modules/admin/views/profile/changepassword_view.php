<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-title">
				<h3><i class="fa fa-bars"></i> Change Password</h3>
				<div class="box-tool">
					<a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
					<a href="#" data-action="close"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="box-content">
				<?php echo $this->session->flashdata('msg');?>
				<form class="form-horizontal" action="<?php echo site_url('admin/auth/update_password');?>" method="post">
					
					<?php if($this->session->userdata('recovery')!='yes'){?> 
					<div class="form-group">
						<label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Old Password');?></label>
						<div class="col-sm-9 col-lg-10 controls">
							<input type="password" placeholder="Current Password" class="form-control" name="current_password" >
							<span class="help-inline">&nbsp;</span>
							<?php echo form_error('current_password'); ?>
						</div>
					</div>
					<?php }else{?>
					<div class="alert alert-warning">Please First Set your New Password</div>
					<?php }?>

					<div class="form-group">
						<label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('New Password');?></label>
						<div class="col-sm-9 col-lg-10 controls">
							<input type="password" placeholder="New Password" class="form-control" name="new_password" >
							<span class="help-inline">&nbsp;</span>
							<?php echo form_error('new_password'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Retype Password');?></label>
						<div class="col-sm-9 col-lg-10 controls">
							<input type="password" placeholder="Retype Password" class="form-control" name="re_password">
							<span class="help-inline">&nbsp;</span>
							<?php echo form_error('re_password'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 col-lg-2 control-label"></label>
						<div class="col-sm-9 col-lg-10 controls">
							<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Save</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>


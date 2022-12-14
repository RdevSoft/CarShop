<div class="row">	
  <div class="col-md-12">
  	<?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Edit Amenity</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
      		
      		<form class="form-horizontal" id="addcategory" action="<?php echo site_url('admin/carshop/update_facility');?>" method="post">
      			<input type="hidden" name="id" value="<?php echo $post->id;?>"/>
				<div class="form-group">
					<label class="col-sm-2 col-lg-1 control-label">Title:</label>
					<div class="col-sm-4 col-lg-5 controls">
						<input type="text" name="title" value="<?php echo $post->title;?>" placeholder="Type somethin" class="form-control input-sm" >
						<span class="help-inline">&nbsp;</span>
						<?php echo form_error('title'); ?>
					</div>
				</div>

                <div class="form-group">
                    <label class="col-sm-2 col-lg-1 control-label">&nbsp;</label>
                    <div class="col-sm-4 col-lg-5 controls">
                        <?php
                        $src = base_url('assets/admin/img/icon-preview.jpg');
                        if($post->icon != ''){
                            $src = base_url('uploads/thumbs/'.$post->icon);
                        }

                        ?>
                        <img id="preview" src="<?php echo $src;?>" class="thumbnail" style="width:32px;">
                        <span id="icon-error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-lg-1 control-label">Icon:</label>
                    <div class="col-sm-4 col-lg-5 controls">
                        <input type="hidden" name="icon" id="icon_input" value="<?php echo $post->icon;?>">
                        <iframe src="<?php echo site_url('admin/carshop/iconuploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                    </div>
                </div>



				<div class="form-group">
					<label class="col-sm-2 col-lg-1 control-label">&nbsp;</label>
					<div class="col-sm-4 col-lg-5 controls">						
						<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Update </button>
					</div>
				</div>


			</form>

	  </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var base_url = "<?php echo base_url();?>";

        jQuery('#icon_input').change(function(){
            var val = jQuery(this).val();
            var src = base_url+'uploads/thumbs/'+val;
            jQuery('#preview').attr('src',src);
        });
    });
</script>
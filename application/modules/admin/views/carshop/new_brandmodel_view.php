<?php echo $this->session->flashdata('msg');?>
<h4>New <?php echo $type;?></h4>
<hr/>

<form action="<?php echo site_url('admin/carshop/savebrandmodel');?>" method="post" id="save-brandmodel-form">
<input type="hidden" name="type" value="<?php echo $type;?>" />	
<?php if($type=='model'){?>
<label>Select brand</label>
<select name="brand" class="form-control brand-<?php echo $type;?>">
	<option value=""> Select a brand</option>
	<?php 
	foreach ($countries->result() as $row) {
		$sel = (set_value('brand')==$row->id)?'selected="selected"':'';
		echo '<option value="'.$row->id.'" '.$sel.'>'.$row->name.'</option>';
	}
	?>
</select>	
<?php echo form_error('brand');?>
<?php }?>



<label><?php echo $type;?> names :</label>
<textarea class="form-control" style="height:260px;" name="brandmodels" ></textarea>
<div class="alert alert-info">Put one or more <?php echo $type;?> name as "," (comma) separated. Like Newyork,Dallas,idaho</div>
<?php echo form_error('brandmodels');?>
<div class="clearfix"></div>
<input type="submit" value="Save" class="btn btn-success" style="margin-top:10px;" >
</form>


<script type="text/javascript">
	jQuery('#save-brandmodel-form').submit(function(event){
		event.preventDefault();
		var loadUrl = jQuery(this).attr('action');
		jQuery("#brandmodel-model  .modal-body").html("Updating...");
		jQuery.post(
			loadUrl,
			jQuery(this).serialize(),
			function(responseText){
				jQuery("#brandmodel-model  .modal-body").html(responseText);
			},
			"html"
		);

	});

	jQuery('.brand-city').change(function(e){
		var val = jQuery(this).val();		
		jQuery('.brand-drop').hide();
		jQuery('.brand-'+val).show();
		jQuery('.model-drop').val("");
	});
</script>	
<!-- Bootstrap 3 Plan styles -->
<!-- full file updated on version 1.5 -->
<link id="plan-theme" href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/admin/js/jquery.js">\x3C/script>')</script>
<script src="<?php echo base_url();?>assets/admin/js/jquery.form.js"></script>
<style type="text/css">
body{
	background-color: #fff;
}
.bar {
  background: #1A8FBF;
  border-top: 1px solid #fceabb;
  height: 29px;
}
</style>

<div id="trainingrecords-attachments" target=".trainingrecords-attachment-list">
	<div class="progress span3" style="display:none;margin:2px;">
	    <div class="bar"></div >
	    <div class="percent">0%</div >
	</div>

	<form action="<?php echo site_url('admin/carshop/uploadfeaturedfile');?>" method="post" enctype="multipart/form-data">
	    <ol class="filelist">
	    </ol>	
	    	<input type="file" name="photoimg" id="photoimg_featured" style="height:auto;" >
	</form>    
<div class="status"></div>
</div>


<script type="text/javascript">
jQuery(document).ready(function(){

	var tab = 'trainingrecords-attachments';
	

	jQuery('#photoimg_featured').change(function(){
        
        	var target = jQuery('#'+tab).attr('target');
			var bar = jQuery('#'+tab+' > .progress > .bar');
			var percent = jQuery('#'+tab+' > .progress > .percent');
			var progress = jQuery('#'+tab+' > .progress');

            var formData = new FormData();
            var files = $("#photoimg_featured")[0].files;
            formData.append('photoimg', files[0]);

            var uploadURL = '<?php echo site_url("admin/carshop/uploadfeaturedfile");?>'; //Upload URL
            var extraData ={}; //Extra Data.
            var jqXHR=$.ajax({
                    xhr: function() {
                    var xhrobj = $.ajaxSettings.xhr();
                    if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                    var percentVal = percent+'%';

                                	var target = jQuery('#'+tab).attr('target');
									var bar = jQuery('#'+tab+' > .progress > .bar');
									var percent = jQuery('#'+tab+' > .progress > .percent');
									var progress = jQuery('#'+tab+' > .progress');
									
							        bar.width(percentVal)
							        percent.html(percentVal);

                                }
                                
                            }, false);
                        }
                    return xhrobj;
                },
            url: uploadURL,
            type: "POST",
            contentType:false,
            processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {

                    progress.show();
			        var percentVal = '0%';
			        bar.width(percentVal)
			        percent.html(percentVal); 
                },
                success: function(data){
                 
                    var percentVal = '100%';

			        bar.width(percentVal)
			        percent.html(percentVal);

                    var response = jQuery.parseJSON(data);
                    if(response.error==0)
                    {
                        window.parent.jQuery('#featured_photo_input').val(response.name);
                        window.parent.jQuery('#featured_photo_input').trigger('change');
                        progress.hide();

                    }
                    else
                    {
                        if(response.error=='upload_invalid_min_dimensions')
							response.error = 'Image needs to be minimum 256x256 px';
						var error = '<label class="col-sm-3 col-lg-4">&nbsp;</label><div class="col-sm-4 col-lg-8"><div class="alert alert-danger" style="margin-bottom:0;">'+response.error+'</div></div>';
						window.parent.jQuery('#featured-photo-error').html(error);
                    }
                    progress.hide();
                }
            });

    });

	
});
</script>

<style type="text/css">
.file-upload{
    margin:0 !important;
    padding:0 !important;
    list-style: none;
}
.file-upload li{
    clear: both;
    border-bottom: 1px solid #000000;
}
    .slider-settings-text{

    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
<?php

?>
<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('msg');?>
    <?php echo validation_errors();?>
    <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/carshop/savebannersettings');?>" method="post">

    <div class="box">

      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Banner settings</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

      <div class="box-content">

            <!-- added on version 1.5 -->
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('show_banner');?>:</label>
            <div class="col-sm-4 col-lg-5 controls">
                <?php $v = (set_value('show_banner')!='')?set_value('show_banner'):get_settings('banner_settings','show_banner', 8);?>
                <select id="show_banner" name="show_banner" class="form-control input-sm">
                    <?php 
                    $options = array('Yes','No');
                    foreach($options as $val){
                        $sel = ($val==$v)?'selected="selected"':''; ?>
                    <option value="<?php echo $val; ?>" <?php echo $sel;?>><?php echo $val; ?></option>
                    <?php } ?>
                </select>
                <span class="help-inline">&nbsp;</span>
            </div>
         </div>
         <!-- end -->

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Menu background:</label>
            <div class="col-sm-5 col-lg-3 controls">
              <?php $v = (set_value('menu_bg_color')!='')?set_value('menu_bg_color'):get_settings('banner_settings','menu_bg_color', 'rgba(241, 89, 42, .8)');?>
              <input type="text" name="menu_bg_color" class="form-control colorpicker-rgba" value="<?php echo $v;?>" data-color-format="rgba"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Menu text color:</label>
              <div class="col-sm-5 col-lg-3 controls">
                  <?php $v = (set_value('menu_text_color')!='')?set_value('menu_text_color'):get_settings('banner_settings','menu_text_color', '#ffffff');?>
                  <div class="input-group color colorpicker-default" data-color="<?php echo $v;?>" data-color-format="rgba">
                    <span class="input-group-addon"><i style="background-color: <?php echo $v;?>;"></i></span>
                    <input type="text" name="menu_text_color" class="form-control" value="<?php echo $v;?>" readonly>
                  </div>
              </div>
          </div>

</div>

</div>
    <div class="box">

        <div class="box-title">
            <h3><i class="fa fa-bars"></i>Map  Settings</h3>
            <div class="box-tool">
                <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Latitude:</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <?php $v = (set_value('map_latitude')!='')?set_value('map_latitude'):get_settings('banner_settings','map_latitude', 37.2718745);?>
                    <input class="form-control" type="text" name="map_latitude" id="map_latitude" value="<?php echo $v;?>">
                    <span class="help-inline">&nbsp;</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Longitude:</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <?php $v = (set_value('map_longitude')!='')?set_value('map_longitude'):get_settings('banner_settings','map_longitude',-119.2704153);?>
                    <input class="form-control" type="text" name="map_longitude" id="map_longitude" value="<?php echo $v;?>">
                    <span class="help-inline">&nbsp;</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Map Zoom:</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <?php $v = (set_value('map_zoom')!='')?set_value('map_zoom'):get_settings('banner_settings','map_zoom', 8);?>
                    <select id="map_zoom" name="map_zoom" class="form-control input-sm">
                        <?php for($i=1;$i<=18; $i++){
                            $sel = ($i==$v)?'selected="selected"':''; ?>
                        <option value="<?php echo $i; ?>" <?php echo $sel;?>><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
<!--                    <input class="form-control" type="text" name="map_zoom" id="map_zoom" value="--><?php //echo $v;?><!--">-->
                    <span class="help-inline">&nbsp;</span>
                </div>
            </div>

            <!-- added on version 1.6 -->

            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Map api key')?> 
                <a href="http://support.webhelios.com/index.php/en/show/faqdetail/23/Why-and-how-to-get-google-api-key" target="_blank" data-toggle="tooltip" data-placement="left" title="Get api key from google">[?]</a>:</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <?php $v = (set_value('map_api_key')!='')?set_value('map_api_key'):get_settings('banner_settings','map_api_key','');?>
                    <input class="form-control" type="text" name="map_api_key" id="map_api_key" value="<?php echo $v;?>">
                    <span class="help-inline" >
                      &nbsp;
                    </span>
                </div>
            </div>

            <!-- end -->
            
        </div>
    </div>

    <div class="box">

      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Home Page Filter settings</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

      <div class="box-content">




          <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <?php $featured_img = (set_value('search_bg')!='')?set_value('search_bg'):get_settings('banner_settings','search_bg','skyline.jpg');?>
                    <img class="" id="search_bg_preview" src="" style="width:300px;">
                    <span id="search_bg-error"><?php echo form_error('search_bg')?></span> 
                </div>
                <div class="clearfix"></div>                   
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">BG image:</label>
                <div class="col-sm-4 col-lg-5 controls">                    
                    <input type="hidden" name="search_bg" id="search_bg" value="<?php echo $featured_img;?>">                    
                    <iframe src="<?php echo site_url('admin/carshop/searchbguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                    <span class="help-inline">&nbsp;</span>
                </div>          
            </div>
            <div class="clearfix"></div>

      </div> 
    </div>
    <input type="submit" value="Update" class="btn btn-success">     
    </form>

  </div>
</div>
<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
jQuery(document).ready(function(){
    jQuery('#banner_type').change(function(){
        var val = jQuery(this).val();
        if(val=='Slider')
        {
            jQuery('#slider-panel').show();
            jQuery('#map-panel').hide();
            sliderinit();
        }
        else
        {
            jQuery('#map-panel').show();
            jQuery('#slider-panel').hide();
        }
    }).change();

    jQuery('#search_bg').change(function(){
            var val = jQuery(this).val();
            var src = base_url+'uploads/banner/'+val;
            jQuery('#search_bg_preview').attr('src',src);
    }).change();
});

function sliderinit ()
{
        jQuery('.add-another').click(function(e){
            e.preventDefault();
            var length = no_of_images++;
            var html = '<li>'+
                            '<div class="form-group">'+
                                '<label class="col-sm-3 col-lg-2 control-label">'+
                                    '<img class="thumbnails thumb'+length+'" src="<?php echo base_url("assets/admin/img/banner-preview.jpg");?>" style="width:80px;">'+
                                '</label>'+
                                '<div class="col-sm-2 col-lg-3 controls">'+
                                    '<input type="hidden" name="banner[]" class="banner_photo'+length+' banner" preview="thumb'+length+'" value="">                    '+
                                    '<iframe src="<?php echo site_url("admin/carshop/bannerimguploader");?>/'+length+'" style="border:0;margin:0;padding:0;height:130px;"></iframe>'+
                                    '<span class="help-inline banner-error'+length+'"></span>'+
                                '</div>'+
                                '<div class="col-sm-2 col-lg-1 controls">'+
                                   ' <a href="javascript:void(0);" style="color:red" onclick="jQuery(this).parent().parent().parent().remove();">X Remove</a>'+
                                '</div>'+
                            '</div>'+
                '<div class="form-group">' +
                '<label class="col-sm-3 col-lg-2 control-label">' + 'Banner Header Text:' + '</label>' +
            '<div class="col-sm-4 col-lg-5 controls">' +
                '<input class="form-control" type="text" name="banner_head[]" id="banner_head" value="">' +
                '</div>' +
            '</div>' +
            '<div class="form-group">' +
                '<label class="col-sm-3 col-lg-2 control-label">' + 'Banner Bottom Text:' + '</label>' +
            '<div class="col-sm-4 col-lg-5 controls">' +
                '<input class="form-control" type="text" name="banner_bot[]" id="banner_bot" value="">' +

                '</div>' +
            '</div>' +
                        '</li>';
            jQuery('.file-upload').append(html);

            jQuery('.banner').change(function(){
                var val = jQuery(this).val();
                var src = base_url+'uploads/banner/'+val;
                var preview = jQuery(this).attr('preview');
                jQuery('.'+preview).attr('src',src);
            });
        });

        jQuery('.banner').change(function(){
            var val = jQuery(this).val();
            var src = base_url+'uploads/banner/'+val;
            var preview = jQuery(this).attr('preview');
            jQuery('.'+preview).attr('src',src);
        });

}
</script>
<script src="<?php echo base_url();?>assets/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

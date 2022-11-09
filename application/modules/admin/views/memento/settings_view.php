<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo lang_key("carshop settings") ?> </h3>

                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo $this->session->flashdata('msg'); ?>
                <?php $settings = json_decode($settings);?>
                <form class="form-horizontal" action="<?php echo site_url('admin/carshop/savecarshopsettings/');?>" method="post">


                    

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Publish posts directly'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="publish_directly" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->publish_directly==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="publish_directl_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('publish_directly'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Put water mark on images'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="do_water_mark" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->do_water_mark==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="do_water_mark_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('do_water_mark'); ?>
                        </div>
                    </div>

                    <div class="form-group" id="water_mark_text" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Water mark text'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="water_mark_text" value="<?php echo(isset($settings->water_mark_text))?$settings->water_mark_text:'';?>" placeholder="Type somethin" class="form-control" >
                            <input type="hidden" name="water_mark_text_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('water_mark_text'); ?>
                        </div>

                    </div>

                    <div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Facebook app settings</div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable facebook login'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_fb_login" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_fb_login==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_fb_login_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_fb_login'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-settings" id="fb_app_id" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('FB app id'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="fb_app_id" value="<?php echo(isset($settings->fb_app_id))?$settings->fb_app_id:'';?>" placeholder="Type somethin" class="form-control" >
                            <input type="hidden" name="fb_app_id_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('fb_app_id'); ?>
                        </div>
                    </div>

                    <div class="form-group fb-settings" id="fb_secret_key" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('FB secret key'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="fb_secret_key" value="<?php echo(isset($settings->fb_secret_key))?$settings->fb_secret_key:'';?>" placeholder="Type somethin" class="form-control" >
                            <input type="hidden" name="fb_secret_key_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('fb_secret_key'); ?>
                        </div>
                    </div>

                    <div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Google+ app settings</div>
                    <span class="settings-help">
                        <ul>
                            <li>Please use "<?php echo site_url('account/google_plus_auth/auth_callback');?>" as redirect url while creating google+ app</li>
                        </ul>
                    </span>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable Google+ login'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_gplus_login" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_gplus_login==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_gplus_login_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_gplus_login'); ?>
                        </div>
                    </div>

                    <div class="form-group gplus-settings" id="gplus_app_id">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Google+ client id'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="gplus_app_id" value="<?php echo(isset($settings->gplus_app_id))?$settings->gplus_app_id:'';?>" placeholder="Type somethin" class="form-control" >
                            <input type="hidden" name="gplus_app_id_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('gplus_app_id'); ?>
                        </div>
                    </div>

                    <div class="form-group gplus-settings" id="gplus_secret_key">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Google+ client secret'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="gplus_secret_key" value="<?php echo(isset($settings->gplus_secret_key))?$settings->gplus_secret_key:'';?>" placeholder="Type somethin" class="form-control" >
                            <input type="hidden" name="gplus_secret_key_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('gplus_secret_key'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-check"></i><?php echo lang_key("Update") ?></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('select[name=do_water_mark]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=water_mark_text_rules]').attr('value','required');
            jQuery('#water_mark_text').show();
        }
        else
        {
            jQuery('input[name=water_mark_text_rules]').attr('value','');            
            jQuery('#water_mark_text').hide();
        }
    }).change();

    jQuery('select[name=enable_fb_login]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=fb_app_id_rules]').attr('value','required');
            jQuery('input[name=fb_secret_key_rules]').attr('value','required');
            jQuery('.fb-settings').show();
        }
        else
        {
            jQuery('input[name=fb_app_id_rules]').attr('value','');
            jQuery('input[name=fb_secret_key_rules]').attr('value','');
            jQuery('.fb-settings').hide();
        }
    }).change();

    jQuery('select[name=enable_gplus_login]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=gplus_app_id_rules]').attr('value','required');
            jQuery('input[name=gplus_secret_key_rules]').attr('value','required');
            jQuery('.gplus-settings').show();
        }
        else
        {
            jQuery('input[name=gplus_app_id_rules]').attr('value','');
            jQuery('input[name=gplus_secret_key_rules]').attr('value','');
            jQuery('.gplus-settings').hide();
        }
    }).change();
});
</script>
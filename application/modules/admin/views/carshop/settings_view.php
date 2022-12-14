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
                            <input type="hidden" name="publish_directly_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('publish_directly'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('System currency'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="system_currency" class="form-control">
                                <?php $options = get_all_currencies();?>
                                <?php foreach($options as $currency=>$val){?>
                                    <?php $sel=($settings->system_currency==$currency)?'selected="selected"':'';?>
                                   <option value="<?php echo $currency;?>" <?php echo $sel;?>><?php echo $val[0].' ('.get_currency_icon($currency).' '. $currency.')';?></option>
                                <?php }?>
                            </select>
                            <input type="radio" name="system_currency_type" value="0" <?php echo $settings->system_currency_type==0?'checked="checked"':'';?>> Use Icon
                            <input type="radio" name="system_currency_type" value="1" <?php echo $settings->system_currency_type==1?'checked="checked"':'';?>> Use Short Code
                            <input type="hidden" name="system_currency_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('system_currency'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable Signup'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_signup" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_signup==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_signup_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_signup'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable pricing'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_pricing" class="form-control">
                                <?php $options = array('Yes','No');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_pricing==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_pricing_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_pricing'); ?>
                        </div>
                    </div>

                    <!--             //added on version 1.6 -->
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Show state province'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_state_province" class="form-control">
                                <?php $options = array('yes'=>'Yes','no'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_state_province==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_state_province_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_state_province'); ?>
                        </div>
                    </div>
                    <!-- end -->

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('If package expired'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="hide_posts_if_expired" class="form-control">
                                <?php $options = array('No'=>'Do not hide user posts','Yes'=>'Hide user posts');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->hide_posts_if_expired==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="hide_posts_if_expired_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('hide_posts_if_expired'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Mileage Unit'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="mileage_unit" class="form-control">
                                <?php $options = array('miles','kms');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->mileage_unit==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('mileage_unit'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Car Milage Fliter Range'); ?></label>
                        <?php
                            $min_milage = (set_value('min_car_milage')!='')?set_value('min_car_milage'):(isset($settings->min_car_milage))?$settings->min_car_milage:'';  
                            $max_milage = (set_value('max_car_milage')!='')?set_value('max_car_milage'):(isset($settings->max_car_milage))?$settings->max_car_milage:''; 
                        ?>
                        <div class="col-sm-2 col-lg-2 controls">
                            <input type="text" name="min_car_milage" value="<?php echo $min_milage; ?>" placeholder="Min Milage" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('min_car_milage'); ?>
                        </div>

                        <div class="col-sm-2 col-lg-2 controls">
                          <input type="text" name="max_car_milage" value="<?php echo $max_milage; ?>" placeholder="Max Milage" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('max_car_milage'); ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Show admin agent'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="show_admin_agent" class="form-control">
                                <?php $options = array('Yes'=>'Yes','No'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->show_admin_agent==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="show_admin_agent_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('show_admin_agent'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Show price like'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="currency_placing" class="form-control">
                                <?php $options = array('before_with_no_gap'=>'$1000','before_with_gap'=>'$ 1000','after_with_no_gap'=>'1000$','after_with_gap'=>'1000 $');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->currency_placing==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="currency_placing_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('currency_placing'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Car Price Fliter Range'); ?></label>
                        <?php
                            $min_price = (set_value('min_car_price')!='')?set_value('min_car_price'):(isset($settings->min_car_price))?$settings->min_car_price:'';  
                            $max_price = (set_value('max_car_price')!='')?set_value('max_car_price'):(isset($settings->max_car_price))?$settings->max_car_price:''; 
                        ?>
                        <div class="col-sm-2 col-lg-2 controls">
                            <input type="text" name="min_car_price" value="<?php echo $min_price; ?>" placeholder="Min Price" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('min_car_price'); ?>
                        </div>

                        <div class="col-sm-2 col-lg-2 controls">
                          <input type="text" name="max_car_price" value="<?php echo $max_price; ?>" placeholder="Max Price" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('max_car_price'); ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable Paypal'); ?></label>

                        <div class="col-sm-9 col-lg-3 controls">
                            <select name="enable_paypal_transfer" class="form-control" id="enable_paypal_transfer">
                                <?php $options = array('Yes'=>'Yes','No'=>'No');?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->enable_paypal_transfer==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_paypal_transfer_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_paypal_transfer'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable bank transfer'); ?></label>

                        <div class="col-sm-9 col-lg-3 controls">
                            <select name="enable_bank_transfer" class="form-control" id="enable_bank_transfer">
                                <?php $options = array('Yes'=>'Yes','No'=>'No');
                                    if(form_error('signup_payment_bank_instruction')||set_value('signup_payment_bank_instruction')) $settings->enable_bank_transfer = 'Yes';
                                ?>
                                <?php foreach($options as $key=>$row){?>
                                    <?php $sel=($settings->enable_bank_transfer==$key)?'selected="selected"':'';?>
                                    <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_bank_transfer_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_bank_transfer'); ?>
                        </div>
                    </div>

                    <div class="form-group bank-transfer">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Signup Bank Transfer instruction'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <textarea name="signup_payment_bank_instruction" class="form-control"><?php if( isset($_POST['signup_payment_bank_instruction'])) echo $_POST['signup_payment_bank_instruction'];else if(isset($settings->signup_payment_bank_instruction)) echo $settings->signup_payment_bank_instruction;?></textarea>
                            <input type="hidden" name="signup_payment_bank_instruction_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('signup_payment_bank_instruction'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable cookie policy popup'); ?></label>

                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_cookie_policy_popup" class="form-control">
                                <?php $options = array('No','Yes');?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_cookie_policy_popup==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_cookie_policy_popup_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_cookie_policy_popup'); ?>
                        </div>
                    </div>



                    <div class="form-group cookie-policy-settings" id="cookie_policy_page_url" style="display:none">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Cookie policy page url'); ?></label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="cookie_policy_page_url" value="<?php echo(isset($settings->cookie_policy_page_url))?$settings->cookie_policy_page_url:'';?>" placeholder="<?php echo lang_key('show/page/cookie_policy');?>" class="form-control" >
                            <input type="hidden" name="cookie_policy_page_url_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('cookie_policy_page_url'); ?>
                        </div>
                    </div>

                    <div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Payment for feature property settings</div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable payment for feature'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select id="enable_feature_payment" name="enable_feature_payment" class="form-control">
                                <?php $options = array('No','Yes');
                                    if(form_error('feature_charge')||form_error('feature_day_limit')) $settings->enable_feature_payment = 'Yes';
                                ?>
                                <?php foreach($options as $row){?>
                                    <?php $sel=($settings->enable_feature_payment==$row)?'selected="selected"':'';?>
                                    <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row;?></option>
                                <?php }?>
                            </select>
                            <input type="hidden" name="enable_feature_payment_rules" value="required">
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('enable_feature_payment'); ?>
                        </div>
                    </div>

                    <span id="feature_payment_settings_panel">
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Amount'); ?></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="feature_charge" value="<?php echo(isset($settings->feature_charge))?$settings->feature_charge:'';?>" placeholder="Type somethin" class="form-control" >
                                <input type="hidden" name="feature_charge_rules" value="required">
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('feature_charge'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('No of days'); ?></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="feature_day_limit" value="<?php echo(isset($settings->feature_day_limit))?$settings->feature_day_limit:'';?>" placeholder="Type somethin" class="form-control" >
                                <input type="hidden" name="feature_day_limit_rules" value="required">
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('feature_day_limit'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group bank-transfer">
                            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Bank Transfer instruction'); ?></label>

                            <div class="col-sm-9 col-lg-10 controls">
                                <textarea name="featured_payment_bank_instruction" class="form-control"><?php echo(isset($settings->featured_payment_bank_instruction))?$settings->featured_payment_bank_instruction:'';?></textarea>    
                                <!--input type="hidden" name="featured_payment_bank_instruction_rules" value="required"-->
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('featured_payment_bank_instruction'); ?>
                            </div>
                        </div>

                    </span>

                

                    <div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Facebook app settings</div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('Enable facebook login'); ?></label>
                        <div class="col-sm-9 col-md-3 controls">
                            <select name="enable_fb_login" class="form-control">
                                <?php $options = array('Yes','No');
                                    if(form_error('fb_app_id')||form_error('fb_secret_key')) $settings->enable_fb_login = 'Yes';
                                ?>
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

                    <!--div style="border-bottom:1px solid #aaa;font-weight:bold;font-size:14px;padding:0 0 5px 5px;">Google+ app settings</div>
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
                    </div-->


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
    jQuery('#enable_bank_transfer').change(function(){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('.bank-transfer').show();
            //jQuery('input[name=featured_payment_bank_instruction_rules]').val('required');
            jQuery('input[name=signup_payment_bank_instruction_rules]').val('required');
        }
        else
        {
            jQuery('.bank-transfer').hide();
            //jQuery('input[name=featured_payment_bank_instruction_rules]').val('');
            jQuery('input[name=signup_payment_bank_instruction_rules]').val('');
        }

    }).change();

    jQuery('#enable_feature_payment').change(function(){
        var val =  jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=feature_charge_rules]').val('required');
            jQuery('input[name=feature_day_limit_rules]').val('required');
            jQuery('#feature_payment_settings_panel').show();
        }
        else
        {
            jQuery('input[name=feature_charge_rules]').val('');
            jQuery('input[name=feature_day_limit_rules]').val('');
            jQuery('#feature_payment_settings_panel').hide();            
        }
    }).change();

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
            jQuery('input[name=fb_app_id]').attr('value','');
            jQuery('input[name=fb_secret_key_rules]').attr('value','');
            jQuery('input[name=fb_secret_key]').attr('value','');
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

    jQuery('select[name=enable_cookie_policy_popup]').change(function(e){
        var val = jQuery(this).val();
        if(val=='Yes')
        {
            jQuery('input[name=cookie_policy_page_url_rules]').attr('value','required');
            jQuery('.cookie-policy-settings').show();
        }
        else
        {
            jQuery('input[name=cookie_policy_page_url_rules]').attr('value','');
            jQuery('.cookie-policy-settings').hide();
        }
    }).change();
});
</script>
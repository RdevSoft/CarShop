<div class="row">
    <!-- Gallery , DETAILES DESCRIPTION-->
    <div class="col-md-9">
        <h1 class="widget-title"><i class="fa fa-car fa-4"></i>&nbsp;<?php echo lang_key('all_dealers');?></h1>

        <form style="" method="post" action="">

            <div class="input-group" style="width: 40%; margin-bottom: 20px">
                  <input type="text" placeholder="Dealer Name, Email" style="height:40px;" class="form-control" name="dealer_key" value="<?php echo $this->input->post('dealer_key');?>">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        </form>
        <div class="clearfix"></div>

        <div class="agent-container" id="panel">
            <?php foreach($query->result() as $user){ 
                if(get_settings('carshop_settings','show_admin_agent','Yes')=='No' && $user->user_type==1)
                    continue;
                ?>
            <div class="agent-holder clearfix">
                <h4><?php echo $user->first_name.' '.$user->last_name; ?></h4>
                <div class="agent-image-holder">
                    <a href="<?php echo site_url('show/dealervehicles/'.$user->id);?>">
                        <img alt="<?php echo $user->first_name.' '.$user->last_name; ?>" width="150" height="150" src="<?php echo get_profile_photo_by_id($user->id,'thumb');?>">
                    </a>
                </div>

                <div class="detail">
                    <?php $about_me = get_user_meta($user->id, 'about_me','');echo ($about_me!='')?'<p>'.$about_me.'</p>':''; ?>
                    <p class="contact-types">
                        <strong><?php echo lang_key('phone'); ?>:</strong> <?php echo get_user_meta($user->id, 'phone'); ?> <strong>Email:</strong> <a href="mailto:<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a>
                    </p>
                    <ul class="agent-address">
                        <li>
                            <span class="address-title"><?php echo lang_key('address');?>:</span>
                            <span class="address-value"> <?php echo get_user_meta($user->id, 'user_address','');?></span>
                        </li>
                        <?php 
                        //added on version 1.6
                        if(get_settings('carshop_settings','show_state_province','yes')=='yes'){?>
                        <li>
                            <span class="address-title"><?php echo lang_key('state_province');?>:</span>
                            <span class="address-value"> <?php echo get_location_name_by_id(get_user_meta($user->id, 'user_state',''));?></span>
                        </li>
                        <?php }?>
                        <li>
                            <span class="address-title"><?php echo lang_key('city');?>:</span>
                            <span class="address-value"> <?php echo get_location_name_by_id(get_user_meta($user->id, 'user_city',''));?></span>
                        </li>
                        <li>
                            <span class="address-title"><?php echo lang_key('country');?>:</span>
                            <span class="address-value"> <?php echo get_location_name_by_id(get_user_meta($user->id, 'user_country',''));?></span>
                        </li>
                        <li>
                            <span class="address-title"><?php echo lang_key('zip_code');?>:</span>
                            <span class="address-value"><?php echo get_user_meta($user->id, 'user_zip','');?></span>
                        </li>
                    </ul>    
                    <div class="agent-properties"><a href="<?php echo site_url('show/dealervehicles/'.$user->id);?>" style="color:#fff;"><?php echo get_user_properties_count($user->id);?> <?php echo lang_key('cars');?></a></div>
                </div>

                <div class="follow-agent clearfix">
                    <ul class="social-networks clearfix">
                        <?php if(get_user_meta($user->id, 'fb_profile')!='n/a' && get_user_meta($user->id, 'fb_profile')!=''){?>
                            <li class="fb">
                                <a href="https://<?php echo get_user_meta($user->id, 'fb_profile'); ?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'twitter_profile')!='n/a' && get_user_meta($user->id, 'twitter_profile')!=''){?>
                            <li class="twitter">
                                <a href="https://<?php echo get_user_meta($user->id, 'twitter_profile'); ?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'li_profile')!='n/a' && get_user_meta($user->id, 'li_profile')!=''){?>
                            <li class="linkedin">
                                <a href="https://<?php echo get_user_meta($user->id, 'li_profile'); ?>" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'gp_profile')!='n/a' && get_user_meta($user->id, 'gp_profile')!=''){?>
                            <li class="gplus">
                                <a href="https://<?php echo get_user_meta($user->id, 'gp_profile'); ?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
            <div style="text-align:center">
                <ul class="pagination">
                <?php echo (isset($pages))?$pages:'';?>
                </ul>
            </div>
        </div>
    </div> <!-- col-md-9 -->


    <!--DETAILS SUMMARY-->
    <div class="col-md-3 ">
        <?php render_widgets('right_bar_all_dealer');?>
    </div>
</div>

          
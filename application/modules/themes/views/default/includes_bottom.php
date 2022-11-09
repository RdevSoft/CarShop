    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->

    <script src="<?php echo theme_url();?>/assets/js/bootstrap.min.js"></script>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> <?php echo lang_key('sign_in');?> </h4>

            </div>

            <div class="modal-body">

                <?php
                $fb_enabled = get_settings('carshop_settings','enable_fb_login','No');
                $gplus_enabled = get_settings('carshop_settings','enable_gplus_login','No');
                if($fb_enabled=='Yes' || $gplus_enabled=='Yes'){
                ?>

                <!-- Social Logins-->
                <div style="height: 1px; background-color: #fff; text-align: center">
                  <span style="background-color:#fff; position: relative; top: -12px; font-size:16px;padding:0px 8px;">
                    Login with social account
                  </span>
                </div>
                <div style="text-align:center;">
                    <br>
                    <?php if($fb_enabled=='Yes'){?>
                    <a href="<?php echo site_url('account/newaccount/fb');?>">
                        <img alt="FB" src="<?php echo theme_url();?>/assets/social-icons/facebook_login.png"
                        data-toggle="tooltip" data-placement="top" data-original-title="Login with facebook"/>
                    </a>
                    <?php }?>
                    <?php if($gplus_enabled=='Yes'){?>
                    <a href="<?php echo site_url('account/newaccount/google_plus');?>">
                        <img alt="G Plus" src="<?php echo theme_url();?>/assets/social-icons/google+.png"
                        data-toggle="tooltip" data-placement="top" data-original-title="Login with google"/>
                    </a>
                    <?php }?>
                </div>
                <hr>
                <?php 
                }
                ?>

                <!-- Email Logins-->

                

                <form action="<?php echo site_url('account/login');?>" method="post">

                     <div class="row">

                        <div class="col-sm-3" style="padding-top:7px; font-weight:bold;">

                            <?php echo lang_key('email');?>

                        </div>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" name="useremail" placeholder="" autofocus>

                        </div>

                     </div>

                     <br>

                     <div class="row">

                        <div class="col-sm-3" style="padding-top:7px;font-weight:bold;">

                            <?php echo lang_key('password');?>

                        </div>

                        <div class="col-sm-12">

                            <input type="password" class="form-control" name="password" placeholder="">

                        </div>

                     </div>

                     <?php if(constant("ENVIRONMENT")=='demo'){?>
                      <div class="row">

                        <div class="col-sm-12" style="padding-top:7px;font-weight:bold;">

                            demo user : dealer@webhelios.com pass: 12345

                        </div>
                     </div>
                     <?php }?>
                     
                     <br>

                     <div class="row">

                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-primary pull-left"> <?php echo lang_key('signin');?></button>
                            <div style="margin-top:8px">
                                <a style="margin:10px 0 0 10px;" href="<?php echo site_url('account/signup');?>"><?php echo lang_key('sign_up');?></a><a style="margin-left:10px;" href="<?php echo site_url('account/recoverpassword');?>"><?php echo lang_key('recover');?></a>
                            </div>
                        </div>

                     </div>

                </form>

            </div>

            <div class="modal-footer">

            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>

<script type="text/javascript">

jQuery(document).ready(function(){

    jQuery('.view-filters').change(function(){
        var val = jQuery('select[name=view_orderby]').val();
        if(val!='')
        jQuery(this).parent().submit();

    });

});

</script>
<?php 
if(get_settings('carshop_settings','enable_cookie_policy_popup','No')=='Yes'){
    require_once 'eu_cookie_popup.php';     
}
?>

<?php
$ga_tracking_code = get_settings('site_settings','ga_tracking_code','');

if($ga_tracking_code != ''){
    echo $ga_tracking_code;
}

?>
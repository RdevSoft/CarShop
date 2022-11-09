<?php
// added on version 1.6
$map_api_key = get_settings('banner_settings','map_api_key','');
$api_key_text = ($map_api_key!='')?"&key=$map_api_key":'';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp<?php echo $api_key_text;?>"></script>

<script src="<?php echo theme_url();?>/assets/js/markercluster.min.js"></script>

<?php

$curr_lang = ($this->uri->segment(1)!='')?$this->uri->segment(1):'en';

if($user->num_rows()<=0){

?>

<div class="alert alert-danger"><?php echo lang_key('dealer_not_found'); ?></div>

<?php

}else{

  $user = $user->row();

?>
<style>

#details-map img {
    max-width: none;
}
</style>
<div class="row">



  <?php $current_url = base64_encode(current_url().'/#data-content');?>

  <div id="data-content" class="col-md-9"  style="-webkit-transition: all 0.7s ease-in-out; transition: all 0.7s ease-in-out;">

      

        <div class="agent-container" id="panel">

            <div class="agent-holder clearfix">

                <h4><?php echo $user->first_name.' '.$user->last_name; ?></h4>

                <div class="agent-image-holder">

                    <img alt="<?php echo $user->first_name.' '.$user->last_name; ?>" width="150" height="150" src="<?php echo get_profile_photo_by_id($user->id,'thumb');?>">                   </a>

                </div>



                <div class="detail">

                    <p><?php echo get_user_meta($user->id, 'about_me'); ?></p>

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
                        <?php if(get_user_meta($user->id, 'fb_profile')!='n/a'){?>
                            <li class="fb">
                                <a href="https://<?php echo get_user_meta($user->id, 'fb_profile'); ?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'twitter_profile')!='n/a'){?>
                            <li class="twitter">
                                <a href="https://<?php echo get_user_meta($user->id, 'twitter_profile'); ?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'li_profile')!='n/a'){?>
                            <li class="linkedin">
                                <a href="https://<?php echo get_user_meta($user->id, 'li_profile'); ?>" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a>
                            </li>
                        <?php }?>
                        <?php if(get_user_meta($user->id, 'gp_profile')!='n/a'){?>
                            <li class="gplus">
                                <a href="https://<?php echo get_user_meta($user->id, 'gp_profile'); ?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
                            </li>
                        <?php }?>
                    </ul>

                </div>

            </div>

        </div>

      <?php
      $user_latitude = get_user_meta($user->id, 'user_latitude');
      $user_longitude = get_user_meta($user->id, 'user_longitude');
      ?>
      <?php if($user_latitude != 'n/a' && $user_longitude != 'n/a') {  ?>
          <script type="text/javascript">

              $(document).ready(function () {

                  var iconBase = '<?php echo theme_url();?>/assets/images/map-icons/';

                  var myLatitude = parseFloat('<?php echo $user_latitude; ?>');
                  var myLongitude = parseFloat('<?php echo $user_longitude; ?>');

                  function initialize() {


                      var myLatlng = new google.maps.LatLng(myLatitude, myLongitude);

                      var mapOptions = {

                          zoom: 12,

                          center: myLatlng

                      }

                      var map = new google.maps.Map(document.getElementById('details-map'), mapOptions);



                      var contentString = '<h4><?php echo $user->first_name.' '.$user->last_name; ?></h4>' + '<p><?php echo get_user_meta($user->id, 'company_name').' '.get_user_meta($user->id, 'user_address'); ?></p>';


                      var infowindow = new google.maps.InfoWindow({

                          content: contentString

                      });


                      var marker, i;

                      var markers = [];




                      var icon_path = iconBase + 'office.png';


                      console.log(myLatlng);
                      marker = new google.maps.Marker({

                          position: myLatlng,

                          map: map,

                          title: '<?php echo $user->first_name.' '.$user->last_name; ?>',

                          icon: icon_path

                      });


                      google.maps.event.addListener(marker, 'click', (function (marker, i) {

                          return function () {

//                    infowindow.setContent("Sample");

                              infowindow.open(map, marker);

                          }

                      })(marker, i));

                      markers.push(marker);


                  }


                  google.maps.event.addDomListener(window, 'load', initialize);


              });

          </script>
          <div style="clear:both;margin-top:10px;"></div>

          <div class="blue-border panel panel-primary">

              <div class="panel-heading blue"><i class="fa fa-map-marker"></i> <?php echo lang_key('dealer_location'); ?>
              </div>

              <div class="panel-body">

                  <div id="details-map" style="width: 100%; height: 300px;"></div>



              </div>

          </div>
      <?php } ?>


            <h1 class="widget-title"><i class="fa fa-puzzle-piece"></i> <?php echo lang_key('dealer_cars'); ?>

            <?php require'switcher_view.php';?>
            </h1>



      <!-- Thumbnails container -->

      <?php             

      if($this->session->userdata('view_style')=='list')

      {

          require'list_view.php';

      }

      else if($this->session->userdata('view_style')=='map')

      {

          require'map_view.php';

      }

      else

      {

          require'grid_view.php';

      }

      ?>

      <div class="clearfix"></div>

      <div style="text-align:center">

        <ul class="pagination">

        <?php echo (isset($pages))?$pages:'';?>

        </ul>

      </div>  

      <!-- /Thumbnails container -->

  </div>





<div class="col-md-3">

    <?php render_widgets('right_bar_dealer_cars');?>

</div>



</div> <!-- /row -->

<?php

}

?>


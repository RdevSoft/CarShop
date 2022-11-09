<?php
// added on version 1.6
$map_api_key = get_settings('banner_settings','map_api_key','');
$api_key_text = ($map_api_key!='')?"&key=$map_api_key":'';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false<?php echo $api_key_text;?>"></script>
<script type="text/javascript">
    var markers = [];
    var Ireland = "Dhaka, Bangladesh";
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 13
        };
        map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
//        codeAddress();//call the function
        var ex_latitude = $('#latitude').val();
        var ex_longitude = $('#longitude').val();

        if (ex_latitude != '' && ex_longitude != ''){
            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result
            var marker = new google.maps.Marker(
                {
                    map: map,
                    draggable:true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(ex_latitude, ex_longitude)
                });

            markers.push(marker);
            google.maps.event.addListener(marker, 'dragend', function()
            {
                var marker_positions = marker.getPosition();
                $('#latitude').val(marker_positions.lat());
                $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
            });

        }
    }

    function codeAddress()
    {
        var main_address = $('#address').val();
        var country = $('#country').val();
        var state = $('#state').val();
        var city = $('#city').val();
        //added on version 1.6
        <?php if(get_settings('carshop_settings','show_state_province','yes')=='yes'){?>
        var address = [main_address,city, state, country].join();
        <?php }else{?>
        var address = [main_address,city, country].join();
        <?php }?>

        if(country != '' && city != '')
        {


            setAllMap(null); //Clears the existing marker

            geocoder.geocode( {address:address}, function(results, status)
            {
                if (status == google.maps.GeocoderStatus.OK)
                {
                    console.log(results[0].geometry.location.lat());
                    $('#latitude').val(results[0].geometry.location.lat());
                    $('#longitude').val(results[0].geometry.location.lng());
                    map.setCenter(results[0].geometry.location);//center the map over the result


                    //place a marker at the location
                    var marker = new google.maps.Marker(
                        {
                            map: map,
                            draggable:true,
                            animation: google.maps.Animation.DROP,
                            position: results[0].geometry.location
                        });

                    markers.push(marker);


                    google.maps.event.addListener(marker, 'dragend', function()
                    {
                        var marker_positions = marker.getPosition();
                        $('#latitude').val(marker_positions.lat());
                        $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }
        else{
            alert('You must enter at least country and city');
        }

    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<form class="form-horizontal" action="<?php echo site_url('admin/updateprofile'); ?>" method="post">
<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i><?php echo lang_key("Edit Profile") ?> </h3>



                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                    <a href="#" data-action="close"><i class="fa fa-times"></i></a></div>

            </div>

            <div class="box-content">

                <?php echo $this->session->flashdata('msg'); ?>

                    <?php if(isset($action) && $action=='edituser'){?>
                    <input type="hidden" name="action" value="edituser" />
                    <input type="hidden" name="id" value="<?php echo $profile->id; ?>"/>
                    <?php }else{?>
                    <input type="hidden" name="action" value="editprofile" />
                    <?php if(is_admin()){?>
                    <input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
                    <?php }else{?>
                    <input type="hidden" name="id" value="<?php echo $profile->id; ?>"/>
                    <?php }?>

                    <?php }?>


                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <img class="thumbnail" id="user_photo" src="<?php echo get_profile_photo_by_id($profile->id,'thumb');?>"  style="width:100px;" />

                            <span id="profile_photo_error"><?php echo form_error('profile_photo'); ?></span>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('profile_picture'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="hidden" name="profile_photo" id="profile_photo" value="<?php echo get_profile_photo_name_by_username($profile->user_name);?>">

                            <iframe src="<?php echo site_url('admin/carshop/profile_photo_uploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>

                            <span class="help-inline">&nbsp;</span>                            

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('username'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="user_name" value="<?php echo $profile->user_name; ?>"

                                   placeholder="User Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('user_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('first_name'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="first_name" value="<?php echo $profile->first_name; ?>"

                                   placeholder="User Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('first_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('last_name'); ?></label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="last_name" value="<?php echo $profile->last_name; ?>"

                                   placeholder="User Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('last_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Gender</label>



                        <div class="col-sm-9 col-lg-10 controls">

                            <?php $curr_value=(set_value('gender')!='')?set_value('gender'):$profile->gender;?>

                            <select class="form-control" name="gender">

                                <?php $sel=($curr_value=='male')?'selected="selected"':'';?>

                                <option value="male" <?php echo $sel;?>>Male</option>

                                <?php $sel=($curr_value=='female')?'selected="selected"':'';?>

                                <option value="female" <?php echo $sel;?>>Female</option>

                            </select>

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('gender'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('phone'); ?></label>

                        <?php $v = (set_value('phone')) ? set_value('phone') : get_user_meta($profile->id, 'phone'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="phone" value="<?php echo $v; ?>"

                                   placeholder="Phone" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('phone'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('company_name'); ?></label>

                        <?php $v = (set_value('company_name')) ? set_value('company_name') : get_user_meta($profile->id, 'company_name'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="company_name" value="<?php echo $v; ?>"

                                   placeholder="Company Name" class="form-control">

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('company_name'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('about_me'); ?></label>

                        <?php $v = (set_value('about_me')) ? set_value('about_me') : get_user_meta($profile->id, 'about_me'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <textarea name="about_me"

                                   placeholder="About" class="form-control"><?php echo $v; ?></textarea>

                            <span class="help-inline">&nbsp;</span>

                            <?php echo form_error('about_me'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Facebook Profile</label>

                        <?php $v = (set_value('fb_profile')) ? set_value('fb_profile') : get_user_meta($profile->id, 'fb_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="fb_profile" value="<?php echo $v; ?>"

                                   placeholder="Facebook Profile Link" class="form-control">

                            <span class="help-inline">Please enter the FB profile link, without http:// </span>

                            <?php echo form_error('fb_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Twitter Account</label>

                        <?php $v = (set_value('twitter_profile')) ? set_value('twitter_profile') : get_user_meta($profile->id, 'twitter_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="twitter_profile" value="<?php echo $v; ?>"

                                   placeholder="Twitter Profile Link" class="form-control">

                            <span class="help-inline">Please enter the twitter profile link, without http:// </span>

                            <?php echo form_error('twitter_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">LinkedIn Account</label>

                        <?php $v = (set_value('li_profile')) ? set_value('li_profile') : get_user_meta($profile->id, 'li_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="li_profile" value="<?php echo $v; ?>"

                                   placeholder="LinkedIn Account Link" class="form-control">

                            <span class="help-inline">Please enter the linkedin profile link, without http:// </span>

                            <?php echo form_error('li_profile'); ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">Google+ Account</label>

                        <?php $v = (set_value('gp_profile')) ? set_value('gp_profile') : get_user_meta($profile->id, 'gp_profile'); ?>

                        <div class="col-sm-9 col-lg-10 controls">

                            <input type="text" name="gp_profile" value="<?php echo $v; ?>"

                                   placeholder="Google+ Profile Link" class="form-control">

                            <span class="help-inline">Please enter the google+ profile link, without http:// </span>

                            <?php echo form_error('gp_profile'); ?>

                        </div>

                    </div>

            </div>

        </div>

    </div>

</div>

<div class="row">
  <div class="col-md-7">
      <!-- address box start -->
      <div class="box">

          <div class="box-title">
              <h3><i class="fa fa-bars"></i>Address</h3>
              <div class="box-tool">
                  <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
              </div>
          </div>

          <div class="box-content">

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">Address:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $address = (set_value('address')!='')?set_value('address'):get_user_meta($profile->id, 'user_address','');?>
                      <input type="text" id="address" name="address" value="<?php echo $address;?>" placeholder="Address" class="form-control input-sm" >
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('address'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">Country:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <select name="country" id="country" class="form-control">
                          <?php foreach (get_all_countries()->result() as $row) {
                              $v = (set_value('country')!='')?set_value('country'):get_user_meta($profile->id, 'user_country','');
                              $sel = ($row->id==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $row->id;?>" <?php echo $sel;?>><?php echo $row->name;?></option>
                          <?php }?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('country'); ?>
                  </div>
              </div>

              <?php
              //added on version 1.6
              if(get_settings('carshop_settings','show_state_province','yes')=='yes'){
              ?>
              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label"><?php echo lang_key('state_province');?>:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $selected_state = (set_value('selected_state')!='')?set_value('selected_state'):get_user_meta($profile->id, 'user_state','');?>
                      <input type="hidden" name="selected_state" id="selected_state" value="<?php echo $selected_state;?>">
                      <input type="text" id="state" name="state" value="<?php echo get_location_name_by_id($selected_state);?>" placeholder="State/Province" class="form-control input-sm" >
                      <span class="help-inline state-loading">&nbsp;</span>
                      <?php echo form_error('state'); ?>
                  </div>
              </div>
              <?php 
              }
              ?>

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">City/Town:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $selected_city = (set_value('selected_city')!='')?set_value('selected_city'):get_user_meta($profile->id, 'user_city','');?>
                      <input type="hidden" name="selected_city" id="selected_city" value="<?php echo $selected_city;?>">
                      <input type="text" id="city" name="city" value="<?php echo get_location_name_by_id($selected_city);?>" placeholder="City/Town" class="form-control input-sm" >
                      <span class="help-inline city-loading">&nbsp;</span>
                      <?php echo form_error('city'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">Zip Code:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $zip_code = (set_value('zip_code')!='')?set_value('zip_code'):get_user_meta($profile->id, 'user_zip','');?>
                      <input type="text" name="zip_code" value="<?php echo $zip_code;?>" placeholder="Zip Code" class="form-control input-sm" >
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('zip_code'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">&nbsp;</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <a href="#" class="btn btn-danger" onclick="codeAddress()"><i class="fa fa-map-marker"></i> View on Map</a>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">Latitude:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $latitude = (set_value('latitude')!='')?set_value('latitude'):get_user_meta($profile->id, 'user_latitude','');?>
                      <input type="text" id="latitude" name="latitude" value="<?php echo $latitude;?>" placeholder="Latitude" class="form-control input-sm" >

                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 col-lg-3 control-label">Longitude:</label>
                  <div class="col-sm-7 col-lg-8 controls">
                      <?php $longitude = (set_value('longitude')!='')?set_value('longitude'):get_user_meta($profile->id, 'user_longitude','');?>
                      <input type="text" id="longitude" name="longitude" value="<?php echo $longitude;?>" placeholder="Longitude" class="form-control input-sm" >

                  </div>
              </div>

          </div>
      </div>

      <!-- end addess box -->
  </div>
  <div class="col-md-5">
      <div class="box">

          <div class="box-title">
              <h3><i class="fa fa-bars"></i>Map</h3>
              <div class="box-tool">
                  <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
              </div>
          </div>

          <div class="box-content">

              <div id="map-canvas" style="height: 400px; width:100%;"></div>
          </div>
      </div>
  </div>
</div>

<div class="row">

    <div class="col-sm-9 col-lg-10 controls">

        <button class="btn btn-primary" type="submit"><i

                class="fa fa-check"></i><?php echo lang_key("Update") ?></button>

    </div>

</div>

</form>

<script type="text/javascript">

jQuery(document).ready(function(){

    var base_url = "<?php echo base_url();?>";

    jQuery('#profile_photo').change(function(){

        var val = jQuery(this).val();

        var src = base_url+'uploads/profile_photos/thumb/'+val;        

        jQuery('#user_photo').attr('src',src);

    }).change();


    jQuery('#country').change(function(){
            jQuery('#state').val('');
            jQuery('#selected_state').val('');
            jQuery('#city').val('');
            jQuery('#selected_city').val('');
        });

        jQuery('#state').change(function(){
            jQuery('#city').val('');
            jQuery('#selected_city').val('');
        });

        jQuery( "#state" ).bind( "keydown", function( event ) {
            if ( event.keyCode === jQuery.ui.keyCode.TAB &&
            jQuery( this ).data( "ui-autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            source: function( request, response ) {
                
                jQuery.post(
                    "<?php echo site_url('admin/carshop/get_states_ajax');?>/",
                    {term: request.term,country: jQuery('#country').val()},
                    function(responseText){
                        response(responseText);
                        jQuery('#selected_state').val('');
                        jQuery('.state-loading').html('');
                    },
                    "json"
                );
            },
            search: function() {
                // custom minLength
                var term = this.value ;
                if ( term.length < 2 ) {
                    return false;
                }
                else
                {
                    jQuery('.state-loading').html('Loading...');
                }
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                this.value = ui.item.value;
                jQuery('#selected_state').val(ui.item.id);
                jQuery('.state-loading').html('');
                return false;
            }
        });


        jQuery( "#city" ).bind( "keydown", function( event ) {
            if ( event.keyCode === jQuery.ui.keyCode.TAB &&
            jQuery( this ).data( "ui-autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            source: function( request, response ) {
                //added on version 1.6
                <?php if(get_settings('carshop_settings','show_state_province','yes')=='yes'){?>
                var state_val = jQuery('#selected_state').val();
                <?php }else{?>
                var state_val = jQuery('#country').val();
                <?php }?>

                jQuery.post(
                    "<?php echo site_url('admin/carshop/get_cities_ajax');?>/",
                    {term: request.term,state: state_val},
                    function(responseText){
                        response(responseText);
                        jQuery('#selected_city').val('');
                        jQuery('.city-loading').html('');
                    },
                    "json"
                );
            },
            search: function() {
                // custom minLength
                var term = this.value ;
                //added on version 1.6
                <?php if(get_settings('carshop_settings','show_state_province','yes')=='yes'){?>
                var state_val = jQuery('#selected_state').val();
                <?php }else{?>
                var state_val = jQuery('#country').val();
                <?php }?>

                if ( term.length < 2 || state_val=='') {
                    return false;
                }
                else
                {
                    jQuery('.city-loading').html('Loading...');
                }
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                this.value = ui.item.value;
                jQuery('#selected_city').val(ui.item.id);
                jQuery('.city-loading').html('');
                return false;
            }
        });
});

</script>
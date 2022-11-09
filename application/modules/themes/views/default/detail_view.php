<?php
// added on version 1.6
$map_api_key = get_settings('banner_settings','map_api_key','');
$api_key_text = ($map_api_key!='')?"&key=$map_api_key":'';
?>
<link href="<?php echo theme_url();?>/assets/css/lightGallery.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp<?php echo $api_key_text;?>"></script>

<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/css/lightbox.css">
<script src="<?php echo theme_url(); ?>/assets/js/lightbox.min.js"></script>
<link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/css/responsive-tabs.css">
<script src="<?php echo theme_url(); ?>/assets/js/jquery.responsiveTabs.min.js"></script>

<script src="<?php echo theme_url(); ?>/assets/js/jquery.lightSlider.min.js"></script>
<script src="<?php echo theme_url(); ?>/assets/js/lightGallery.min.js"></script>
<?php

$curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en';

?>

<?php if ($post->num_rows() <= 0) { ?>

    <div class="alert alert-danger">Invalid post id</div>

<?php
} else {

    $row = $post->row();

    $title = get_title_for_edit_by_id_lang($row->id, $curr_lang);

    $featured_image_path = get_featured_photo_by_id($row->featured_img);


     if($row->condition == 'condition_new'){
        $condition_class  = 'new';
        $condition_data = lang_key($row->condition);
    }
    else if($row->condition == 'condition_used'){
        $condition_class  = 'used';
        $condition_data = lang_key($row->condition);
    }
    else if($row->condition == 'condition_pre_owned'){
        $condition_class  = 'recondition';
        $condition_data = lang_key($row->condition);
    }
    else if($row->condition == 'condition_recondition'){
        $condition_class  = 'recondition';
        $condition_data = lang_key($row->condition);
    }
    else if($row->condition == 'condition_sold'){
        $condition_class  = 'sold';
        $condition_data = lang_key($row->condition);
    }
    else{
        $condition_class  = 'others';
        $condition_data = lang_key($row->condition);
    }


    ?>

    <style>

        #details-map img {
            max-width: none;
        }

        .carousel-inner > .next, .carousel-inner > .prev {

            position: relative !important;

        }

        .item img {

            margin: 0 auto !important;

        }

        .item {

            height: 300px !important;

        }

        .left, .next {

            height: 300px !important;

        }

        #myCarousel {

            height: 300px !important;

            overflow: hidden !important;

        }
        .gold{
            color: #FFC400;
        }

    </style>
    <?php
    $user_latitude = get_user_meta($row->created_by, 'user_latitude');
    $user_longitude = get_user_meta($row->created_by, 'user_longitude');
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



                var contentString = '<div class="thumbnail thumb-shadow map-thumbnail">' + '<div class="property-header">'

                    + '<a href="#"></a>' + '<img alt="<?php echo $title; ?>" class="property-header-image" src="<?php echo $featured_image_path;?>" style="width:100%">'

                    + '<span class="property-contract-type <?php echo $condition_class; ?>">' + '<span><?php echo $condition_data; ?></span>' + '</span>'

                    + '<div class="property-thumb-meta">' + '<span class="property-price"><?php echo show_price($row->price);?></span>' + '</div></div>'

                    + '<div class="caption">' + '<h4><?php echo $title; ?></h4>' + '<p><?php echo get_brand_model_name_by_id($row->brand).' '.get_brand_model_name_by_id($row->model); ?></p>' + '</div></div>';


                var infowindow = new google.maps.InfoWindow({

                    content: contentString

                });


                var marker, i;

                var markers = [];




                var icon_path = iconBase + 'office.png';


                marker = new google.maps.Marker({

                    position: myLatlng,

                    map: map,

                    title: '<?php echo $title; ?>',

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
<?php } ?>
    <?php get_view_count($row->id, 'detail'); ?>

    <div class="row">

    <!-- Gallery , DETAILES DESCRIPTION-->

    <div class="col-md-9">

    <h1 class="widget-title"><i class="fa fa-car fa-4"></i>&nbsp;<?php echo $title; ?></h1>

            
            <ul id="imageGallery">

                <li data-thumb="<?php echo base_url().'uploads/images/'.$row->featured_img?>" data-src="<?php echo base_url().'uploads/images/'.$row->featured_img?>">
                    <span class="helper"></span><img  src="<?php echo base_url().'uploads/images/'.$row->featured_img?>" />
                </li>

                <?php $i=0; $images = ($row->gallery!='')?json_decode($row->gallery):array();?>
                <?php
                if(count($images)>0 && $images[0]!='')
                {
                    foreach ($images as $img)
                    {
                ?>
                <li data-thumb="<?php echo base_url('uploads/gallery/' . $img); ?>" data-src="<?php echo base_url('uploads/gallery/' . $img); ?>">
                    <span class="helper"></span><img  src="<?php echo base_url('uploads/gallery/' . $img); ?>" />
                </li>
                <?php
                    }
                }
                ?>

            </ul>






    <?php $detail_link = site_url('show/detail/' . $row->unique_id . '/' . url_title($title));; ?>

    <div class="share-networks clearfix">

        <div class="col-md-2 col-sm-2 col-xs-12 share-label"><i
                class="fa fa-share fa-lg"></i> <?php echo lang_key('share'); ?>:
        </div>

        <div class="col-md-2 col-sm-2 col-xs-4 share-option fb"><a
                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $detail_link; ?>" target="_blank"><i
                    class="fa fa-facebook fa-lg"></i>Facebook</a></div>

        <div class="col-md-2 col-sm-2 col-xs-4 share-option twitter"><a
                href="https://twitter.com/share?url=<?php echo $detail_link; ?>" target="_blank"><i
                    class="fa fa-twitter fa-lg"></i>Twitter</a></div>

        <div class="col-md-2 col-sm-2 col-xs-4 share-option gplus"><a
                href="https://plus.google.com/share?url=<?php echo $detail_link; ?>" target="_blank"><i
                    class="fa fa-google-plus fa-lg"></i>Google</a></div>

        <div class="col-md-2 col-sm-2 col-xs-4 share-option gplus"><a href="<?php echo site_url('show/printview/'.$row->unique_id);?>" target="_blank"><i
                    class="fa fa-print fa-lg"></i>Print</a></div>

        <div class="col-md-2 col-sm-2 col-xs-4 share-option gplus"><a  href="#" uniqid="<?php echo $row->unique_id;?>" class="show-embed-preview"><i class="fa fa-code fa-lg"></i>Embed</a></div>

    </div>

    <!--DESCRIPTION STARTS -->

    <div class="" id="panel">

        <ul class="list-group property-meta-list">

            <li class="list-group-item">

                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-5 titles first"><span><i
                                class="fa fa-car"></i> <?php echo lang_key($row->car_type); ?></span></div>

                    <div class="col-md-3 col-sm-3 col-xs-5 titles"><span><i
                                class="fa fa-tachometer"></i> <?php echo $row->mileage; ?> <?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></span></div>

                    <div class="col-md-3 col-sm-3 col-xs-5 titles"><span><i
                                class="fa fa-gear"></i> <?php echo lang_key($row->transmission); ?></span></div>

                    <div class="col-md-3 col-sm-3 col-xs-5 titles last"><span><i
                                class="fa fa-clock-o"></i> <?php echo $row->year; ?></span></div>

                </div>

            </li>
            <!-- list-group-item -->
        </ul>

        <div id="horizontalTab" style="padding: 3px">
            <ul>
                <li><a href="#tab-1"><?php echo lang_key('details'); ?></a></li>
                <li><a href="#tab-2"><?php echo lang_key('specifications'); ?></a></li>
                <li><a href="#tab-3"><?php echo lang_key('dimensions'); ?></a></li>

            </ul>

            <div id="tab-1">
                <ul class="car-spec">
                    <li><strong><?php echo lang_key('reg_no');?>: </strong> <span> <?php echo $row->reg_no; ?> </span></li>
                    <li><strong><?php echo lang_key('manufacturer'); ?>: </strong> <span> <?php echo get_brand_model_name_by_id($row->brand); ?> </span></li>
                    <li><strong><?php echo lang_key('car_model'); ?>: </strong> <span> <?php echo get_brand_model_name_by_id($row->model); ?> </span></li>
                    <li><strong><?php echo lang_key('year'); ?>: </strong> <span> <?php echo $row->year; ?> </span></li>
                    <li><strong><?php echo lang_key('body_type'); ?>: </strong> <span> <?php echo lang_key($row->car_type); ?> </span></li>
                </ul>
            </div>
            <div id="tab-2">
                <ul class="car-spec">
                    <li><strong><?php echo lang_key('engine_size') ?>: </strong> <span> <?php echo $row->engine_size; ?></span></li>
                    <li><strong><?php echo lang_key('engine_type') ?>: </strong> <span> <?php echo $row->engine_type; ?></span></li>
                    <li><strong><?php echo lang_key('transmission') ?>: </strong> <span> <?php echo lang_key($row->transmission); ?></span></li>
                    <li><strong><?php echo lang_key('mileage') ?>: </strong> <span> <?php echo $row->mileage; ?> <?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></span></li>
                    <li><strong><?php echo lang_key('exterior_color') ?>: </strong> <span> <?php echo $row->exterior_color; ?></span></li>
                    <li><strong><?php echo lang_key('interior_color') ?>: </strong> <span> <?php echo $row->interior_color; ?></span></li>
                    <li><strong><?php echo lang_key('fuel_type') ?>: </strong> <span> <?php echo lang_key($row->fuel_type); ?></span></li>
                    <li><strong><?php echo lang_key('status') ?>: </strong> <span> <?php echo lang_key($row->condition); ?></span></li>
                    <li><strong><?php echo lang_key('safety_rating') ?>: </strong> <span> <?php for($i=1; $i <= 5; $i++){ ?><i class="fa fa-star <?php echo ($i<=intval($row->safety_rating))?'gold':'';?>"></i> <?php } ?></span></li>
                    <li><strong><?php echo lang_key('standard_seating') ?>: </strong> <span> <?php echo $row->no_of_seats; ?></span></li>
                    <li><strong><?php echo lang_key('steering_type') ?>: </strong> <span> <?php echo $row->steering_type; ?></span></li>
                </ul>
            </div>
            <div id="tab-3">
                <ul class="car-spec">
                    <li><strong><?php echo lang_key('height') ?>: </strong> <span><?php echo $row->height; ?></span></li>
                    <li><strong><?php echo lang_key('width') ?>: </strong> <span><?php echo $row->width; ?></span></li>
                    <li><strong><?php echo lang_key('length') ?>: </strong> <span><?php echo $row->length; ?></span></li>
                    <li><strong><?php echo lang_key('wheelbase') ?>: </strong> <span><?php echo $row->wheel_base; ?></span></li>
                    <li><strong><?php echo lang_key('track_rear') ?>: </strong> <span><?php echo $row->track_rear; ?></span></li>
                    <li><strong><?php echo lang_key('track_front') ?>: </strong> <span><?php echo $row->track_front; ?></span></li>
                    <li><strong><?php echo lang_key('ground_clearance') ?>: </strong> <span><?php echo $row->ground_clearance; ?></span></li>
                </ul>
            </div>


        </div>

        <div class="title"><i class="fa fa-car fa-4"></i>&nbsp;<?php echo lang_key('description'); ?></div>

        <div class="panel-body">

            <?php echo get_description_for_edit_by_id_lang($row->id, $curr_lang); ?>

        </div>

        <?php $tags = get_post_meta($row->id,'tags'); ?>
        <?php if($tags != 'n/a' && $tags != ''){ ?>
            <div class="title"><i class="fa fa-tags fa-4"></i>&nbsp;<?php echo lang_key('tags'); ?></div>

            <div class="panel-body tags-panel">
                <?php
                $tags = explode(',',$tags);
                foreach ($tags as $tag) {
                    echo '<span class="label label-primary"><i class="fa fa-tags"></i> <a href="'.site_url('tags/'.$tag).'">'.$tag.'&nbsp;</a></span>';
                }
                ?>
            </div>
        <?php } ?>
    </div>

    <!--DESCRIPTION ENDS -->




    <div style="clear:both;margin-top:10px;"></div>
    <?php if(count($images)>0 && $images[0]!=''){?>
    <div class="blue-border panel panel-primary">

        <div class="panel-heading blue"><i class="fa fa-image"></i> <?php echo lang_key('image_gallery'); ?></div>

        <div class="panel-body">


            <?php $i = 0; ?>
            <?php foreach ($images as $img) { ?>

                <div class="images-box col-sm-3 col-md-3">

                    <a href="<?php echo base_url('uploads/gallery/' . $img); ?>" data-lightbox="detail-gallery"
                       class="gallery-images">

                        <img width="270" height="197" alt="Galler Image <?php echo $i; ?>" src="<?php echo base_url('uploads/gallery/' . $img); ?>">

                        <span class="bg-images"><i class="fa fa-search"></i></span>

                    </a>

                </div>

            <?php $i++; } ?>

        </div>

    </div>

<?php } ?>

    <?php if (get_post_meta($row->id, 'video_url') != 'n/a') { ?>

        <div style="clear:both;margin-top:10px;"></div>

        <div class="blue-border panel panel-primary">

            <div class="panel-heading blue"><i class="fa fa-image"></i> <?php echo lang_key('featured_video'); ?>
            </div>

            <div class="panel-body">

                <span id="video_preview"></span>

                <input type="hidden" name="video_url" id="video_url"
                       value="<?php echo get_post_meta($row->id, 'video_url'); ?>">

            </div>

        </div>

    <?php } ?>
    <?php if($user_latitude != 'n/a' && $user_longitude != 'n/a') {  ?>
    <div style="clear:both;margin-top:10px;"></div>

    <div class="blue-border panel panel-primary">

        <div class="panel-heading blue"><i class="fa fa-map-marker"></i> <?php echo lang_key('dealer_location'); ?>
        </div>

        <div class="panel-body">

            <div id="details-map" style="width: 100%; height: 300px;"></div>



        </div>

    </div>
    <?php } ?>
    </div>
    <!-- col-md-9 -->


    <!--DETAILS SUMMARY-->

    <div class="col-md-3 ">

    <h2 class="widget-title"><i class="fa fa-star-o"></i>&nbsp;<?php echo lang_key('summary'); ?></h2>

    <div class="blue-border panel panel-primary effect-helix in">

        <div class="panel-heading blue"><?php echo lang_key('overview'); ?></div>

        <div class="panel-body">

            <div class="info_list">

                <div class="property-header">

                    <img class="property-header-image" src="<?php echo get_featured_photo_by_id($row->featured_img); ?>"
                         alt="<?php echo $title; ?>" style="width:256px">


                    <span class="property-contract-type <?php echo $condition_class; ?>"><span style="font-size: 11px"><?php echo $condition_data; ?></span>


                      </span>

                            <div class="property-thumb-meta">

                                <span class="property-price"><?php echo show_price($row->price);?></span>

                            </div>

                </div>


            </div>

            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('manufacturer'); ?>:</span>

                <span class="info-content"><?php echo get_brand_model_name_by_id($row->brand); ?></span>

            </div>


            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('model'); ?>:</span>

                <span class="info-content"><?php echo get_brand_model_name_by_id($row->model); ?></span>

            </div>


            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('year'); ?>:</span>

                <span class="info-content"><?php echo $row->year; ?></span>

            </div>
            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('address'); ?>:</span>

                <span class="info-content"><?php echo get_user_meta($row->created_by, 'user_address'); ?></span>

            </div>

            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('city'); ?>:</span>

                <span class="info-content"><?php echo get_location_name_by_id(get_user_meta($row->created_by, 'user_city')); ?></span>

            </div>

            <div class="divider"></div>

            <?php 
            //added on version 1.6
            if(get_settings('carshop_settings','show_state_province','yes')=='yes'){?>
            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('state_province'); ?>:</span>

                <span class="info-content"><?php echo get_location_name_by_id(get_user_meta($row->created_by, 'user_state')); ?></span>

            </div>

            <div class="divider"></div>
            <?php }?>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('country'); ?>:</span>

                <span class="info-content"><?php echo get_location_name_by_id(get_user_meta($row->created_by, 'user_country')); ?></span>

            </div>

            <div class="divider"></div>


            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('zip_code'); ?>:</span>

                <span class="info-content"><?php echo get_user_meta($row->created_by, 'user_zip'); ?></span>

            </div>

            <!-- added on version 1.7 -->

            <div class="divider"></div>
            <div class="info_list">

                <span class="info-title" style=""><?php echo lang_key('total_view'); ?>:</span>

                <span class="info-content"><?php echo $row->total_view; ?></span>

            </div>
            <!-- end -->

        </div>

    </div>


    <div class="widget our-agents" id="agents_widget-2">


        <h2 class="widget-title"><i class="fa fa-user"></i>&nbsp;<?php echo lang_key('dealer'); ?></h2>


        <div class="content">

            <div class="agent clearfix">

                <div class="image">

                    <a href="<?php echo site_url('show/dealervehicles/' . $row->created_by); ?>">

                        <img width="140" height="141" alt="Dealer" class="attachment-post-thumbnail wp-post-image"
                             src="<?php echo get_profile_photo_by_id($row->created_by, 'thumb'); ?>">

                    </a>

                </div>

                <div class="name">

                    <a href="<?php echo site_url('show/dealervehicles/' . $row->created_by); ?>"><?php echo get_user_fullname_by_id($row->created_by); ?></a>

                </div>

                <div class="phone"><?php echo get_user_meta($row->created_by, 'phone'); ?></div>

                <div class="email"><a
                        href="mailto:<?php echo get_user_email_by_id($row->created_by); ?>"><?php echo get_user_email_by_id($row->created_by); ?></a>

                    <div class="agent-properties"><a
                            href="<?php echo site_url('show/dealervehicles/' . $row->created_by); ?>"><?php echo get_user_properties_count($row->created_by); ?>
                            Cars</a></div>

                </div>

            </div>
            <!-- /.agent -->


        </div>
        <!-- /.content -->

    </div>


    <h2 class="widget-title"><i class="fa fa-envelope-o"></i>&nbsp;<?php echo lang_key('message'); ?></h2>

    <form action="<?php echo site_url('show/sendemailtoagent/' . $row->created_by); ?>" method="post" id="message-form">

        <?php echo $this->session->flashdata('msg'); ?>

        <input type="hidden" name="unique_id" value="<?php echo $row->unique_id; ?>">

        <input type="hidden" name="title" value="<?php echo url_title($title); ?>">

        <label>Name:</label>

        <input type="text" name="sender_name" value="<?php echo set_value('sender_name'); ?>" class="form-control">

        <?php echo form_error('sender_name'); ?>

        <label>Email:</label>

        <input type="text" name="sender_email" value="<?php echo set_value('sender_email'); ?>" class="form-control">

        <?php echo form_error('sender_email'); ?>

        <label><?php echo lang_key('email_subject'); ?>:</label>

        <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control">

        <?php echo form_error('subject'); ?>

        <label><?php echo lang_key('message'); ?>:</label>

        <textarea name="msg" class="form-control"><?php echo set_value('msg'); ?></textarea>

        <?php echo form_error('msg'); ?>

        <div style="clear:both;margin-top:10px"></div>
        <?php echo (isset($captcha_img))?$captcha_img:'';?>
        <input type="text" placeholder="<?php echo lang_key('enter_above_text'); ?>" name="captcha_ans" value="" style=" margin-top: 10px" class="form-control">
        <?php echo form_error('captcha_ans');?>

        <div style="clear:both;margin-top:10px"></div>

        <input type="submit" class="view-listing-button" value="<?php echo lang_key('send'); ?>">

    </form>

    <?php
    $brochure_file = get_post_meta($row->id,'car_brochure'); 
    if($brochure_file!='n/a' && $brochure_file!=''){?>
        <div style="text-align: center; margin-top: 10px">
            <a href="<?php echo base_url('uploads/gallery/'.$brochure_file);?>" target="_blank"><img alt="Brochure" src="<?php echo theme_url() ?>/assets/images/download-brochure.png"></a>
        </div>
    <?php } ?>

    </div>

    </div>

<div id="embed-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                <h4 class="modal-title" id="myModalLabel"><?php echo lang_key('embed_preview'); ?>: </h4>

            </div>

            <div class="modal-body" style="min-height:450px">
            </div>
        </div>
    </div>
</div> 

    <script type="text/javascript">

        function getUrlVars(url) {

            var vars = {};

            var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {

                vars[key] = value;

            });

            return vars;

        }


        function showVideoPreview(url) {

            if (url.search("youtube.com") != -1) {

                var video_id = getUrlVars(url)["v"];

                //https://www.youtube.com/watch?v=jIL0ze6_GIY

                var src = '//www.youtube.com/embed/' + video_id;

                //var src  = url.replace("watch?v=","embed/");

                var code = '<iframe class="thumbnail" width="100%" height="420" src="' + src + '" frameborder="0" allowfullscreen></iframe>';

                jQuery('#video_preview').html(code);

            }

            else if (url.search("vimeo.com") != -1) {

                //http://vimeo.com/64547919

                var segments = url.split("/");

                var length = segments.length;

                length--;

                var video_id = segments[length];

                var src = url.replace("vimeo.com", "player.vimeo.com/video");

                var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/' + video_id + '" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                jQuery('#video_preview').html(code);

            }

            else {

                //alert("only youtube and video url is valid");

            }

        }


        jQuery(document).ready(function () {

            jQuery('.show-embed-preview').click(function(e){
                e.preventDefault();
                var uniqid = jQuery(this).attr('uniqid');
                jQuery('#embed-modal').modal('show');
                var code = '&lt;iframe src="<?php echo site_url("embed");?>/'+uniqid+'" style="border:0;width:300px;height:460px;"></iframe>';
                var content = '<label>width: <input type="text" class="form-control" id="width" value="300"/></label>'+
                              '<div style="clear:both;margin-top:10px;"></div>'+
                              '<label>Height: <input type="text" class="form-control" id="height" value="460"/></label>'+
                              '<div style="clear:both;margin-top:10px;"></div>'+
                              '<label>Code <spna style="font-weight:normal;font-size:12px;">(Copy and paste this code to your website)</span>: <div class="embed-code" style="font-weight:normal;border:1px solid #aaa;padding:3px;border-radius:3px">'+code+'</div></label>'+
                              '<div style="clear:both;margin-top:10px;margin-bottom:10px;border-bottom:1px solid;">Preview:</div>'+
                              '<iframe src="<?php echo site_url("embed");?>/'+uniqid+'" style="border:0;width:300px;height:460px;"></iframe>';
                jQuery('#embed-modal .modal-body').html(content);
                jQuery('#width').keyup(function(){
                    jQuery('#embed-modal iframe').css('width',jQuery('#width').val());
                    var ucode = '&lt;iframe src="<?php echo site_url("embed");?>/'+uniqid+'" style="border:0;width:'+jQuery('#width').val()+'px;height:'+jQuery('#height').val()+'px;"></iframe>';
                    jQuery('.embed-code').html(ucode);
                });

                jQuery('#height').keyup(function(){
                    jQuery('#embed-modal iframe').css('height',jQuery('#height').val());
                    var ucode = '&lt;iframe src="<?php echo site_url("embed");?>/'+uniqid+'" style="border:0;width:'+jQuery('#width').val()+'px;height:'+jQuery('#height').val()+'px;"></iframe>';
                    jQuery('.embed-code').html(ucode);
                });
            });

            $('#horizontalTab').responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                disabled: [3, 4],
                activate: function (e, tab) {
                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function (e, state) {
                    //console.log(state);
                    $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });

            $('#myCarousel').carousel();

            jQuery('#video_url').change(function () {

                var url = jQuery(this).val();

                showVideoPreview(url);

            }).change();

        });

         <?php
        $CI = get_instance();
        $curr_lang = get_current_lang();
        if($curr_lang=='ar' || $curr_lang=='fa' || $curr_lang=='he' || $curr_lang=='ur')
        {
        ?>
        var rtl = true;
        <?php }else{?>
        var rtl = false;
        <?php }?>

        $('#imageGallery').lightSlider({
            gallery:false,
            item:1,
            speed:1000,
            pause:3000,
            rtl:rtl,
            auto:true,
            loop: true,
            thumbItem:9,
            slideMargin:0,
            currentPagerPosition:'left',
            onSliderLoad: function(plugin) {
                plugin.lightGallery();

            }
        });
    </script>

<?php

}

?>



          
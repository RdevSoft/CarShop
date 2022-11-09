<style>
    #general-map-view img { max-width: none; }
</style>
<?php
    $map_id = (isset($map_id))?$map_id:'general-map-view';
    if($query->num_rows()<=0)
    {
        ?>
        <div class="alert alert-warning"><?php echo lang_key('no_cars_found'); ?></div>
        <?php
    }
    else
    {
        $data = array();
        $estates = array();
        
        foreach ($query->result() as $row)
        {

            if(get_settings('carshop_settings','hide_posts_if_expired','No')=='Yes')
            {
                  $is_expired = is_user_package_expired($row->created_by);
                  if($is_expired)
                    continue;                    
            }
            
            $title = get_title_for_edit_by_id_lang($row->id,$curr_lang);

            $estate = array();
            $estate['estate_id'] = $row->id;
            $estate['estate_title'] =  $title;
            $estate['featured_image_url'] = get_featured_photo_by_id($row->featured_img);
            $estate['latitude'] = $row->latitude;
            $estate['longitude'] = $row->longitude;
            $estate['estate_type'] = $row->type;
            $estate['estate_type_lang'] = lang_key($row->type);
            $estate['estate_status'] = $row->status;
            $estate['estate_price'] = $row->total_price;
            $estate['estate_short_address'] = get_location_name_by_id($row->city).','.get_location_name_by_id($row->state).','.get_location_name_by_id($row->country);
            $estate['detail_link'] = site_url('show/detail/'.$row->unique_id.'/'.url_title($title));
            array_push($estates,$estate);
        }
         
        $data['estates'] = $estates;
//        echo get_settings('banner_settings','map_zoom',8);
    }
?>
<script type="text/javascript">
    $(document).ready(function() {

        var map_data = jQuery.parseJSON('<?php echo json_encode($data); ?>');
        for (i = 0; i < map_data.estates.length; i++) {

        }

        var iconBase = '<?php echo theme_url();?>/assets/images/map-icons/';
        var zoomLevel = parseInt('<?php echo get_settings('banner_settings','map_zoom',8); ?>');
//        console.log(zoomLevel);
        function initialize() {
            var myLatlng = new google.maps.LatLng(map_data.estates[0].latitude,map_data.estates[0].longitude);
            var mapOptions = {
                zoom: zoomLevel,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById('<?php echo $map_id;?>'), mapOptions);

            var infowindow = new google.maps.InfoWindow({
                content: "Hello World"
            });


            var marker, i;
            var markers = [];
            var infoContentString = [];

            for (i = 0; i < map_data.estates.length; i++) {

                if(map_data.estates[i].estate_type == 'DBC_TYPE_COMSPACE'){
                    var icon_path = iconBase + 'office.png';
                }
                else if(map_data.estates[i].estate_type == 'DBC_TYPE_HOUSE' || map_data.estates[i].estate_type == 'DBC_TYPE_VILLA'){
                    var icon_path = iconBase + 'bighouse.png';
                }
                else if(map_data.estates[i].estate_type == 'DBC_TYPE_LAND'){
                    var icon_path = iconBase + 'land.png';
                }
                else {
                    var icon_path = iconBase + 'apartment.png';
                }


                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(map_data.estates[i].latitude, map_data.estates[i].longitude),
                    map: map,
                    title: map_data.estates[i].estate_title,
                    icon: icon_path
                });
                infoContentString[i] = '<div class="thumbnail thumb-shadow map-thumbnail">' + '<div class="property-header">'
                    + '<a href="' + map_data.estates[i].detail_link + '"></a>' + '<img class="property-header-image" src="' + map_data.estates[i].featured_image_url + '" alt="'+ map_data.estates[i].estate_title + '" style="width:100%">'
                    + '<span class="property-contract-type sale">' + '<span>Sale</span>' + '</span>'
                    + '<div class="property-thumb-meta">' + '<span class="property-price">' + map_data.estates[i].estate_price + '</span>' + '</div></div>'
                    + '<div class="caption">' + '<h4>'+ map_data.estates[i].estate_title + '</h4>' + '<p>' + map_data.estates[i].estate_short_address + '</p>' + '</div></div>';

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent(infoContentString[i]);
                      infowindow.open(map, marker);
                    }
                })(marker, i));
                markers.push(marker);
//                infoContentString.push(contentString);
            }
            var markerCluster = new MarkerClusterer(map, markers);

        }

        google.maps.event.addDomListener(window, 'load', initialize);



    });
</script>
<div id="<?php echo $map_id;?>" class="map-view-holder" style="width: 100%; height: 900px;"></div>
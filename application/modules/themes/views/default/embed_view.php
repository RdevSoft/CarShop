<?php include'includes_top.php';?>
<link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/lightbox.css">
<script src="<?php echo theme_url();?>/assets/js/lightbox.min.js"></script>
<?php 

$curr_lang = ($this->uri->segment(1)!='')?$this->uri->segment(1):'en';

?>

<?php if($post->num_rows()<=0){?>

    <div class="alert alert-danger">Invalid post id</div>

<?php }else{

    $row = $post->row();

    $title =  get_title_for_edit_by_id_lang($row->id,$curr_lang);

?>

<style>
    .tags-panel span a{
        color: #fff !important;

    }
    .tags-panel span{
        margin-right: 5px;
    }

    #details-map img { max-width: none; }

    .carousel-inner > .next, .carousel-inner > .prev{

        position: relative !important;

    }

    .item img{

        margin: 0 auto !important;

    }

    .item{

        height: 300px !important;

    }

    .left,.next{

        height: 300px !important;

    }

    #myCarousel{

        height: 300px !important;

        overflow: hidden !important;

    }

</style>
<?php 
    $curr_lang = ($this->uri->segment(1)!='')?$this->uri->segment(1):'en';
    $title =  get_title_for_edit_by_id_lang($row->id,$curr_lang);
?>
<?php get_view_count($row->id,'detail');?>

     <div style="padding:0;margin:0;width:100%">

        <div class="blue-border panel panel-primary effect-helix in" style="margin-bottom:0px;padding-bottom:0px;">

            <div class="panel-heading blue"><?php echo $title; ?></div>

            <div class="panel-body">

                <div class="info_list">

                <div class="property-header">
                    <div style="text-align:center">
                        <img class="property-header-image" src="<?php echo get_featured_photo_by_id($row->featured_img);?>" alt="<?php echo $title; ?>" style="width:256px">
                    </div>

                    <?php if($row->condition == 'condition_new'){
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
                          <span class="property-contract-type <?php echo $condition_class; ?>">
                            <span style="font-size: 11px"><?php echo $condition_data; ?></span>
                          </span>

                    <div class="property-thumb-meta">

                        <span class="property-price"><?php echo show_price($row->price);?></span>

                    </div>

                </div>



                </div>

                <div class="divider"></div>

                <div class="caption">
                    <p><?php echo get_brand_model_name_by_id($row->brand).' '.get_brand_model_name_by_id($row->model);?></p>

                    <div style="clear:both;">
                        <span style="float:left; font-weight:bold;"><?php echo lang_key('type'); ?>:</span>
                        <span style="float:right; "><?php echo lang_key($row->car_type);?></span>
                    </div>
                    <div style="clear:both;">
                        <span style="float:left; font-weight:bold;"><?php echo lang_key('transmission'); ?>:</span>
                        <span style="float:right; "><?php echo lang_key($row->transmission);?></span>

                    </div>
                    <div style="clear:both;" class="property-utilities">
                        <div style="float: right; padding-top: 0px;">
                             <div><i class="fa fa-clock-o"></i> <?php echo $row->year;?></div>

                        </div>
                        <div  style="float: left; padding-top: 0px;">
                            <div><i class="fa fa-tachometer"></i> <?php echo $row->mileage;?> <?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                    <p>
                        <a href="<?php echo site_url('show/detail/'.$row->unique_id.'/'.url_title($title));?>" class="view-listing-button" target="_blank">
                            <?php echo lang_key('view_listing'); ?>

                        </a>
                    </p>
                </div>

            </div>

        </div>

    </div>

<script type="text/javascript">

    function getUrlVars(url) {

        var vars = {};

        var parts = url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {

            vars[key] = value;

        });

        return vars;

    }



    function showVideoPreview(url)

    {

      if(url.search("youtube.com")!=-1)

      {

        var video_id = getUrlVars(url)["v"];

        //https://www.youtube.com/watch?v=jIL0ze6_GIY

        var src = '//www.youtube.com/embed/'+video_id;

        //var src  = url.replace("watch?v=","embed/");

        var code = '<iframe class="thumbnail" width="100%" height="420" src="'+src+'" frameborder="0" allowfullscreen></iframe>';

        jQuery('#video_preview').html(code);

      }

      else if(url.search("vimeo.com")!=-1)

      {

        //http://vimeo.com/64547919

        var segments = url.split("/");

        var length = segments.length;

        length--;

        var video_id = segments[length];

        var src  = url.replace("vimeo.com","player.vimeo.com/video");

        var code = '<iframe class="thumbnail" src="//player.vimeo.com/video/'+video_id+'" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

        jQuery('#video_preview').html(code);

      }

      else

      {

        //alert("only youtube and video url is valid");

      }

    }



jQuery(document).ready(function(){

    $('#myCarousel').carousel();

    jQuery('#video_url').change(function(){

          var url = jQuery(this).val();

          showVideoPreview(url);

        }).change();

});

</script>

<?php

}

?>



          
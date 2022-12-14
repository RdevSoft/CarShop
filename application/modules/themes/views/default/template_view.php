<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo theme_url();?>/assets/images/fav-icon.ico">

    <?php 
    $page = get_current_page();

    if(!isset($sub_title))
        $sub_title = (isset($page['title']))?$page['title']: lang_key('list_your_car');

    $seo = (isset($page['seo_settings']) && $page['seo_settings']!='')?(array)json_decode($page['seo_settings']):array();

    if(!isset($meta_desc))
        $meta_desc = (isset($seo['meta_description']))?$seo['meta_description']:get_settings('site_settings','meta_description','carshop car dealership');

    if(!isset($key_words))
        $key_words = (isset($seo['key_words']))?$seo['key_words']:get_settings('site_settings','key_words','car dealership,car listing, house, car');

    if(!isset($crawl_after))
        $crawl_after = (isset($seo['crawl_after']))?$seo['crawl_after']:get_settings('site_settings','crawl_after',3);

    ?>


    <title><?php echo translate(get_settings('site_settings','site_title','carshop'));?> | <?php echo translate($sub_title);?></title>

    <?php 
    if(isset($post))
    {
        echo (isset($post))?social_sharing_meta_tags_for_post($post):'';
    }
    elseif(isset($blog_meta))
    {
        echo (isset($blog_meta))?social_sharing_meta_tags_for_blog($blog_meta):'';

    }
    ?>        
    <?php 
    $meta_desc = str_replace('"','',$meta_desc);
    $meta_desc = (strlen($meta_desc) > 160) ? substr($meta_desc,0,160) : $meta_desc;
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
    $alias = (isset($alias))?$alias:'';
    $curr_lang = get_current_lang();
    //echo $alias."_".$curr_lang.".html";die;
    if(@file_exists(FCPATH."dbc_config/locals-meta/".$alias."_".$curr_lang.".html"))
    {
        require FCPATH."dbc_config/locals-meta/".$alias."_".$curr_lang.".html";
    }
    else
    {
        if(!isset($post) && !isset($blog_meta))
        {
            $page_title = translate(get_settings('site_settings', 'site_title', 'carshop')).'|'.translate(lang_key($sub_title));
            $fb_app_id = get_settings('carshop_settings','fb_app_id','none');

    ?>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="keywords" content="<?php echo $key_words; ?>"/>
    <meta property="og:title" content="<?php echo $page_title;?>" />
    <meta property="og:site_name" content="<?php echo get_settings('site_settings','site_title','carshop');?>" />
    <meta property="og:url" content="<?php echo get_the_current_url();?>" />
    <meta property="og:description" content="<?php echo $meta_desc;?>" />
    <meta property="og:type" content="article" />
    <?php  if($fb_app_id!='' && $fb_app_id!='none'){ ?>
    <meta property="fb:app_id" content="<?php echo get_settings('carshop_settings','fb_app_id','none');?>" />
    <?php }?>
    <?php
        }
    }
    ?>
    <meta name="revisit-after" content="<?php echo $crawl_after;?> days">

    <?php require_once'includes_top.php';?>

    <?php 

    $bg_color = get_settings('banner_settings','menu_bg_color', 'rgba(241, 89, 42, .8)');

    $text_color = get_settings('banner_settings','menu_text_color', '#ffffff');

    ?>

    <style>
        .top-nav li a{
            color:<?php echo $text_color;?> !important;
        }

        .top-nav .active a{
            color:<?php echo $active_text_color;?> !important;
        }
        .navbar-inverse{

            background:<?php echo $bg_color;?>;
        }

        .navbar-nav .dropdown-menu{
            background:<?php echo $bg_color;?>;
        }

        @media (max-width: 767px) {

            .navbar-inverse {  background:<?php echo $bg_color;?>; }

        }

        .orange{
            background-color: #f0ad4e !important;
            border-bottom: 1px solid  #f0ad4e !important;
        }
        .orange-border{
            border: 1px solid  #f0ad4e !important;
        }

        .btn-action,
        .btn-primary {  background-image: -webkit-linear-gradient(top, #FF9B22 0%, #FF8C00 100%); background-image: linear-gradient(to bottom, #FF9B22 0%, #FF8C00 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffFF9B22', endColorstr='#ffFF8C00', GradientType=0); filter: progid:DXImageTransform.Microsoft.gradient(enabled = false); background-repeat: repeat-x; border:0 none; }

        .footer1{
            background: #165f68;
        }
        .footer2{
            background: #191919;
        }
        
    </style>

</head>



<?php 
$CI = get_instance();
$curr_lang  = $CI->uri->segment(1);
if($curr_lang=='ar' || $curr_lang=='fa' || $curr_lang=='he' || $curr_lang=='ur')
{
?>
<body class="home" dir="rtl">
<link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/rtl-fix.css">
<?php 
}else{
?>
<body class="home" dir="<?php echo get_settings('site_settings','site_direction','ltr');?>">
<?php 
}
?>

    



    <?php require_once'header.php';?>

    <?php 

    if(isset($alias) && $alias=='dbc_home')

    {

        ?>
            <script src="<?php echo theme_url();?>/assets/js/jquery.stellar.min.js"></script>

            <script type="text/javascript">

                $(function(){

                    $.stellar({

                        horizontalScrolling: false,

                        verticalOffset: 40

                    });

                });

            </script>
        <?php


        require_once'slider_view.php';
        require_once'home_page_filter_view.php';


    }

    else

        echo '<div class="clear-fix" style="min-height:100px;"></div>';

    ?>



        

<div class="clearfix"></div>

    <!-- container -->

    <div class="container my-bg">

        <?php render_widgets('content_top');?>

        <?php echo (isset($content))?$content:'';?>

        <?php render_widgets('content_bottom');?>

    </div>  

    <!-- /container -->

    <?php require_once'footer.php';?>  
    <?php require_once'includes_bottom.php';?>

</body>

</html>
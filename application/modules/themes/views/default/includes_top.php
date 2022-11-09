<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<?php 
$compress_css = get_settings('site_settings','css_compression','No');
if($compress_css=='Yes')
{
?>
<link href="<?php echo theme_url();?>/assets/css/all-css.php" rel="stylesheet" type="text/css" />
<?php
}
else
{
?>  
    <link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/font-awesome.min.css">


    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/custom.css">

<?php
}
?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo theme_url();?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo theme_url();?>/assets/js/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo theme_url();?>/assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo theme_url();?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo theme_url();?>/assets/js/jssor.slider.min.js"></script>
    <script src="<?php echo theme_url();?>/assets/js/owl.carousel.min.js"></script>
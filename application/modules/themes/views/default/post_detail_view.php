<!-- full file updated on version 1.7 -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53fb1205151cc4cf"></script>

<?php

if(!isset($blogpost->title)||count($blogpost)<=0){

?>

<div class="alert alert-danger"><?php echo lang_key('post_not_found'); ?></div>

<?php

}else{

?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class="row">


  <div id="data-content" class="col-md-9" style="background:#fff;margin-top:15px;">

      <h3><?php echo get_blog_data_by_lang($blogpost,'title');?></h3>
      <p style="text-align:center;"><img alt="<?php echo get_blog_data_by_lang($blogpost,'title');?>" src="<?php echo get_featured_photo_by_id($blogpost->featured_img);?>" style="width:256px"></p>
      <div class="addthis_sharing_toolbox"></div>
      <?php echo get_blog_data_by_lang($blogpost,'description');;?>

  </div>





<div class="col-md-3">

    <?php render_widgets('right_bar_post_detail');?>

</div>



<div> <!-- /row -->
    <span class='st_sharethis_large' displayText='ShareThis'></span>
    <span class='st_facebook_large' displayText='Facebook'></span>
    <span class='st_twitter_large' displayText='Tweet'></span>
    <span class='st_linkedin_large' displayText='LinkedIn'></span>
    <span class='st_pinterest_large' displayText='Pinterest'></span>
    <span class='st_email_large' displayText='Email'></span>
</div>
</div>
<?php

}

?>


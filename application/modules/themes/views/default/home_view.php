<?php
$CI = get_instance();
$curr_lang = ($this->uri->segment(1)!='')?$this->uri->segment(1):'en';
?>
<link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/ion.rangeSlider.css">
<script src="<?php echo theme_url();?>/assets/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript">

        jQuery(document).ready(function(){
            
            

        });

</script>

<div class="row">
          <?php $current_url = base64_encode(current_url().'/#data-content');?>
          <div id="data-content" class="col-md-9">

              <h1 class="widget-title"><i class="fa fa-car fa-4"></i>&nbsp;<?php echo lang_key('featured_cars'); ?>

                </h1>
              <?php
              $query = (isset($featured))?$featured:array();
              ?>
              <!-- /Thumbnails container -->


                <?php require'carousel_view.php'; ?>

              <div class="clearfix"></div>
              <?php if($query->num_rows()>0){?>
                  <div class="view-more">
                    <a class="" href="<?php echo site_url('show/properties/featured');?>"><?php echo lang_key('view_all');?></a>
                  </div>
              <?php }?>

              <h1 class="widget-title">
                  <i class="fa fa-car fa-4"></i>&nbsp;<?php echo lang_key('recent_cars'); ?>
                  <?php require'switcher_view.php';?>
              </h1>

              <!-- Thumbnails container -->
              <?php
              $query = (isset($recents))?$recents:array();
              if($this->session->userdata('view_style')=='list')
              {
                  require'list_view.php';
              }
              else if($this->session->userdata('view_style')=='map')
              {
                  $map_id = 'recent_map_view';
                  require'map_view.php';
              }
              else
              {
                  require'grid_view.php';
              }
              ?>
              <div class="clearfix"></div>
              <?php if($query->num_rows()>0){?>
                  <div class="view-more"><a class="" href="<?php echo site_url('show/properties/recent');?>"><?php echo lang_key('view_all');?></a></div>
              <?php }?>

          </div>


          <div class="col-md-3">
            <?php render_widgets('right_bar_home');?>
          </div>


        </div> <!-- /row -->

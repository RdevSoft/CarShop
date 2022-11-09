<link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/ion.rangeSlider.css">
<script src="<?php echo theme_url();?>/assets/js/ion.rangeSlider.min.js"></script>
<?php $CI = get_instance(); ?>
<?php $range_val = (isset($data['range_slider']))?$data['range_slider']:''; 
if($range_val=='') {
  $data_from = $data_to = ''; 
}
else {
  $price_range = explode(';', $range_val);
  $data_from = "data-from=\"".$price_range[0]."\"";
  $data_to = "data-to=\"".$price_range[1]."\"";
}

$mileage_range = (isset($data['mileage_slider']))?$data['mileage_slider']:''; 
if($mileage_range=='') {
  $mileage_from = $mileage_to = ''; 
}
else {
  $mileage_range = explode(';', $mileage_range);
  $mileage_from = "data-from=\"".$mileage_range[0]."\"";
  $mileage_to = "data-to=\"".$mileage_range[1]."\"";
}

?>
<script type="text/javascript">

        jQuery(document).ready(function(){

            var min_price=0,max_price=500;
            jQuery.ajax({
              dataType: "json",
              url: "<?php echo site_url('show/get_min_max_car_price_ajax');?>/",
              success: function(data) {
                  min_price = data['min_price'];
                  max_price = data['max_price'];
                  $("#range_slider").ionRangeSlider({
                      min: min_price,
                      max: max_price,
                      type: 'double',
                      prefix: "<?php echo $CI->session->userdata('system_currency'); ?>",
                      maxPostfix: "+",
                      prettify: false,
                      hasGrid: true
                  });
              },
              error: function() {
                $("#range_slider").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    type: 'double',
                    prefix: "<?php echo $CI->session->userdata('system_currency'); ?>",
                    maxPostfix: "+",
                    prettify: false,
                    hasGrid: true
                });
              }
            });

          $("#mileage_slider").ionRangeSlider({
              min: 0,
              max: 10000,
              type: 'double',
              prefix: "",
              maxPostfix: "+",
              prettify: false,
              hasGrid: true
          });


            jQuery('#select-brand').change(function(){
            var brand = jQuery(this).val();
            var model = "<?php echo (isset($data['model']))?$data['model']:'';?>";
            if(brand!='') {
              jQuery.post(
                  "<?php echo site_url('show/get_models_ajax');?>/",
                  {brand: jQuery('#select-brand').val()},
                  function(html){
                      
                        jQuery('#select-model').empty();
                        jQuery('#select-model').html(html);
                        if(model!='')
                          jQuery('#select-model').val(model);
                      
                  },
                  "html"
              );
            }
            else {
              var options = '<option value="' + '' + '">' + 'All' + '</option>';
              jQuery('#select-model').empty();
              jQuery('#select-model').html(options);
            }
        }).change();

        });

</script>

<?php

$curr_lang = ($this->uri->segment(1)!='')?$this->uri->segment(1):'en';

?>

        <style type="text/css">

        .up,.down{color:#fff;}

        .up:hover,.down:hover{color:#fff;}

        </style>

        <div class="row">


          <?php $current_url = base64_encode(current_url().'/#data-content');?>

          <div class="col-md-9 " >

            <div class="search-wrapper" style="width: 100%">
            <form action="<?php echo site_url('show/advfilter');?>" method="post">
                <div class="holder">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label style=""><?php echo lang_key('select_manufacturer'); ?></label>
                        <select name="brand" id="select-brand">
                            <option value=""><?php echo lang_key('all');?></option>
                            <?php $brands = get_all_brands();
                            foreach ($brands->result() as $brand) {
                              $sel = (isset($data['brand'])&&$data['brand']==$brand->id)?'selected="selected"':'';
                            ?>
                                <option value="<?php echo $brand->id;?>" id="<?php echo $brand->id;?>" <?php echo $sel;?>><?php echo lang_key($brand->name);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label style=""><?php echo lang_key('select_model'); ?></label>
                        <select name="model" id="select-model" >
                            <option value="" class="model-all"><?php echo lang_key('all');?></option>
                            <?php $models = get_all_models();
                            foreach ($models->result() as $model) {
                              $sel = (isset($data['model'])&&$data['model']==$model->id)?'selected="selected"':'';
                            ?>
                                <option value="<?php echo $model->id;?>" class="model-<?php echo $model->parent;?>" <?php echo $sel;?>><?php echo lang_key($model->name);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label><?php echo lang_key('price_range'); ?></label>
                        <input type="text" id="range_slider" name="range_slider" value="" <?php echo $data_from;echo $data_to; ?>/>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label style=""><?php echo lang_key('select_type'); ?></label>
                          <?php
                          $CI = get_instance();
                          $CI->load->config('carshop');
                          $custom_types = $CI->config->item('car_types');
                          ?>
                          <select name="car_type">
                                <option value="" ><?php echo lang_key('all');?></option>
                                  <?php foreach ($custom_types as $option) { 
                                    $sel = (isset($data['car_type'])&&rawurldecode($data['car_type'])==$option['title'])?'selected="selected"':'';
                                    ?>
                                  <option value="<?php echo $option['title'];?>" <?php echo $sel;?>><?php echo lang_key($option['title']);?></option>
                              <?php } ?>
                          </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label style=""><?php echo lang_key('model_year'); ?>(From-To)</label>
                        

                        <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
                            <?php 
                                $this->load->helper('date');
                                $current_year =  mdate("%Y", time());
                            ?>
                              <select name="year_from">
                                <option value=""><?php echo lang_key('all');?></option>
                                <?php $v = (isset($data['year_from']))?$data['year_from']:'';?>
                                <?php for($i=$current_year+1;$i>=1910;$i--){
                                        $sel = ($i==$v)?'selected="selected"':'';
                                  ?>
                                  <option value="<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
                                <?php }?>
                              </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 0px">
                            <?php 
                                $this->load->helper('date');
                                $current_year =  mdate("%Y", time());
                            ?>
                              <select name="year_to">
                                <option value=""><?php echo lang_key('all');?></option>
                                <?php $v = (isset($data['year_to']))?$data['year_to']:'';?>
                                <?php for($i=$current_year+1;$i>=1910;$i--){
                                        $sel = ($i==$v)?'selected="selected"':'';
                                  ?>
                                  <option value="<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
                                <?php }?>
                              </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <label><?php echo lang_key('mileage_range'); ?></label>
                        <input type="text" id="mileage_slider" name="mileage_slider" value="" <?php echo $mileage_from;echo $mileage_to; ?>/>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <label style=""><?php echo lang_key('select_car_condition'); ?></label>
                          <?php
                          $CI = get_instance();
                          $CI->load->config('carshop');
                          $custom_conditions = $CI->config->item('car_condition');
                          ?>
                          <select name="condition">
                              <option value="" ><?php echo lang_key('all');?></option>
                              <?php foreach ($custom_conditions as $status) {
                                      $sel = (isset($data['condition'])&&rawurldecode($data['condition'])==$status['title'])?'selected="selected"':'';
                                  ?>
                                  <option value="<?php echo $status['title'];?>" <?php echo $sel;?>><?php echo lang_key($status['title']);?></option>
                              <?php } ?>
                          </select>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <label style=""><?php echo lang_key('select_transmission_type'); ?></label>
                          <?php
                          $CI = get_instance();
                          $CI->load->config('carshop');
                          $custom_transmissions = $CI->config->item('car_transmission');
                          ?>
                          <select name="transmission">
                              <option value="" ><?php echo lang_key('all');?></option>
                              <?php foreach ($custom_transmissions as $status) {
                                      $sel = (isset($data['transmission'])&&rawurldecode($data['transmission'])==$status['title'])?'selected="selected"':'';
                                ?>
                                  <option value="<?php echo $status['title'];?>" <?php echo $sel;?>><?php echo lang_key($status['title']);?></option>
                              <?php } ?>
                          </select>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <label>&nbsp;</label>
                        <input type="submit" value="<?php echo lang_key('filter_vehicles'); ?> »" class="btn btn-info">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>

        </div>

              <h1 class="widget-title"><i class="fa fa-car"></i>&nbsp;<?php echo lang_key('result'); ?>

                  <?php require'switcher_view.php';?>

              </h1>

              <?php

              

              if($this->session->userdata('view_style')=='list')

              {

                  require'list_view.php';

              }

              else if($this->session->userdata('view_style')=='map')

              {

                  $map_id = 'search_map_view';

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

          </div>

          <div class="col-md-3">
            <div style="clear:both;height:20px;"></div>
            <?php render_widgets('side_bar_advance_search',$data);?>
          </div>


        </div> <!-- /row -->

        <script type="text/javascript">



            function updown()

            {

              $('.up').click(function(e){

                  e.preventDefault();

                  var panel = $(this).attr('href');

                  $(panel+' > .panel-body').hide();

                  $(panel+ ' .fa-chevron-up').addClass('fa-chevron-down');

                  $(panel+ ' .fa-chevron-up').removeClass('fa-chevron-up');

                  $(this).addClass('down');

                  $(this).removeClass('up');

                  updown();

                });



                $('.down').click(function(e){

                  e.preventDefault();

                  var panel = $(this).attr('href');

                  $(panel+' > .panel-body').show();

                  $(panel+ ' .fa-chevron-down').addClass('fa-chevron-up');

                  $(panel+ ' .fa-chevron-down').removeClass('fa-chevron-down');

                  $(this).addClass('up');

                  $(this).removeClass('down');

                  updown();

                });

            }

            $(function () {

                

                updown();



                $('#ignor_plain').change(function() {

                    if($(this).is(":checked")) {

                        // var returnVal = confirm("Are you sure?");

                        // $(this).attr("checked", returnVal);

                        var panel = jQuery(this).attr('target');

                        jQuery(panel).hide();

                    }

                    else

                    {

                        var panel = jQuery(this).attr('target');

                        jQuery(panel).show();

                    }

                }).change();




            });



        </script>
<div  class="map-search" data-stellar-background-ratio="0.5" style="margin:0;width:100%;padding:50px 0;text-align:center;background: url(<?php echo base_url('uploads/banner/'.get_settings('banner_settings','search_bg','default.jpg'));?>)">
    <div class="container my-bg">
    <div class="row">
        <div class="search-wrapper" style="width: 100%">
            <form action="<?php echo site_url('show/advfilter');?>" method="post">
                <div class="holder">
                    <div class="col-md-4 col-sm-4">
                        <label style=""><?php echo lang_key('select_manufacturer'); ?></label>
                        <select name="brand" id="brand">
                            <option value=""><?php echo lang_key('all');?></option>
                            <?php $brands = get_all_brands();
                            foreach ($brands->result() as $brand) {
                            ?>
                                <option value="<?php echo $brand->id;?>" id="<?php echo $brand->id;?>"><?php echo lang_key($brand->name);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label style=""><?php echo lang_key('select_model'); ?></label>
                        <select name="model" id="model">
                            <option value="" class="model-all"><?php echo lang_key('all');?></option>
                            <?php $models = get_all_models();
                            foreach ($models->result() as $model) {
                            ?>
                                <option value="<?php echo $model->id;?>" class="model-<?php echo $model->parent;?>"><?php echo lang_key($model->name);?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label><?php echo lang_key('price_range'); ?></label>
                        <input type="text" id="range_slider" name="range_slider" value="" />
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 col-sm-4">
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
                    <div class="col-md-4 col-sm-4">
                        <label style=""><?php echo lang_key('model_year'); ?>(From-To)</label>
                        

                        <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left: 0px">
                            <?php 
                                $this->load->helper('date');
                                $current_year =  mdate("%Y", time());
                            ?>
                              <select name="year_from">
                                <option value=""><?php echo lang_key('all');?></option>
                                <?php $v = (set_value('year_from')!='')?set_value('year_from'):'';?>
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
                                <?php $v = (set_value('year_to')!='')?set_value('year_to'):'';?>
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
                        <input type="text" id="mileage_slider" name="mileage_slider" value="" />
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
                              <?php foreach ($custom_conditions as $status) {?>
                                  <option value="<?php echo $status['title'];?>"><?php echo lang_key($status['title']);?></option>
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
                              <?php foreach ($custom_transmissions as $status) {?>
                                  <option value="<?php echo $status['title'];?>"><?php echo lang_key($status['title']);?></option>
                              <?php } ?>
                          </select>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <label>&nbsp;</label>
                        <input type="submit" value="<?php echo lang_key('filter_vehicles'); ?> »" class="btn btn-info">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>

        </div>
    </div>

    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#brand').change(function(){
        var val = jQuery(this).val();
        if(val!='') {
          jQuery.post(
              "<?php echo site_url('show/get_models_ajax');?>/",
              {brand: val},
              function(html){

                    jQuery('#model').empty();
                    jQuery('#model').html(html);
                  
              },
              "html"
          );
        }
        else {
          var options = '<option value="' + '' + '">' + 'All' + '</option>';
          jQuery('#model').empty();
          jQuery('#model').html(options);
        }
    }).change();

    var min_price,max_price;
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

    var min_milage = '<?php echo get_settings("carshop_settings","min_car_milage",0);?>';
    var max_milage = '<?php echo get_settings("carshop_settings","max_car_milage",10000);?>';

    $("#mileage_slider").ionRangeSlider({
        min: min_milage,
        max: max_milage,
        type: 'double',
        prefix: "",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

});
 </script>
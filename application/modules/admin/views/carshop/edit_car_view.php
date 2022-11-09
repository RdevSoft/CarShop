<!--Rickh Text Editor-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<style type="text/css">
.file-upload{
    margin:0 !important;
    padding:0 !important;
    list-style: none;
}
.file-upload li{
    clear: both;
}
.facilities{
    list-style: none;
    margin: 0;
    padding: 0;
}
.facilities li{
    float: left;
    margin-right: 10px;
}
</style>
<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('msg');?>
    <?php echo validation_errors();?>
    <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/carshop/updatecar');?>" method="post">
      <input type="hidden" name="id" value="<?php echo $car->id;?>">
      <input type="hidden" name="page" value="<?php echo $page;?>">
    <div class="box">

      <div class="box-title">
        <h3><i class="fa fa-bars"></i><?php echo lang_key('basic_info');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

      <div class="box-content">

            <?php 
            $CI = get_instance();
            $CI->load->model('admin/system_model');
            $CI->load->config('carshop');
            $query = $CI->system_model->get_all_langs();
            $active_languages = $query->result();
            ?>
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab1">
                    <?php $flag=1; foreach ($active_languages as $lang){ ?>
                    <li class="<?php echo ($flag==1)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang->short_name;?>"><i class="fa fa-home"></i> <?php echo $lang->short_name;?></a></li>
                    <?php $flag++; }?>
                </ul>
                <div class="tab-content" id="myTabContent1">
                     <?php $flag=1; foreach ($active_languages as $lang){ ?>
                     <div id="<?php echo $lang->short_name;?>" class="tab-pane fade in <?php echo ($flag==1)?'active':'';?>">

                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Title:</label>
                      <div class="col-sm-4 col-lg-5 controls">
                        <?php 
                        $title = get_title_for_edit_by_id_lang($car->id,$lang->short_name);
                        $title = (set_value('title'.$lang->short_name)!='')?set_value('title'.$lang->short_name):$title;
                        ?>
                        <input type="text" name="title<?php echo $lang->short_name;?>" value="<?php echo $title;?>" placeholder="Package Title" class="form-control input-sm" >
                        <span class="help-inline">&nbsp;</span>
                        <?php echo form_error('title'.$lang->short_name); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Description:</label>
                      <div class="col-sm-7 col-lg-7 controls">
                        <?php 
                        $description = get_description_for_edit_by_id_lang($car->id,$lang->short_name);
                        $description = (set_value('description'.$lang->short_name)!='')?set_value('description'.$lang->short_name):$description;
                        ?>
                        <textarea style="min-height:200px" class="form-control wysihtml5" name="description<?php echo $lang->short_name;?>"><?php echo $description;?></textarea>
                        <span class="help-inline">&nbsp;</span>
                        <?php echo form_error('description'.$lang->short_name); ?>
                      </div>
                    </div>

                    </div>
                    <?php $flag++; }?>
                </div>
            </div>

          <div class="clearfix"></div>
          <div class="col-md-6">
              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('car_type');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php $custom_types = $CI->config->item('car_types'); ?>
                      <select name="car_type" class="form-control input-sm">
                          <?php $v = (set_value('car_type')!='')?set_value('car_type'):$car->car_type;?>
                          <?php foreach ($custom_types as $option) {
                              $sel = ($option['title']==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $option['title'];?>" <?php echo $sel;?>><?php echo lang_key($option['title']);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('car_type'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('car_make');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <select name="brand" class="form-control input-sm" id="select-brand">
                          <?php $v = (set_value('brand')!='')?set_value('brand'):$car->brand;?>
                          <?php foreach ($brands->result() as $brand) {
                              $sel = ($brand->id==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $brand->id;?>" <?php echo $sel;?>><?php echo lang_key($brand->name);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('brand'); ?>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('car');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <select name="model" class="form-control input-sm" id="select-model">
                          <?php $v = (set_value('model')!='')?set_value('model'):$car->model;?>
                          <?php foreach ($models->result() as $model) {
                              $sel = ($model->id==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $model->id;?>" <?php echo $sel;?>><?php echo lang_key($model->name);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('model'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('year');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php
                      $this->load->helper('date');
                      $current_year =  mdate("%Y", time());
                      ?>
                      <select name="year" class="form-control">
                          <?php $v = (set_value('year')!='')?set_value('year'):$car->year;?>
                          <?php for($i=$current_year+1;$i>=1910;$i--){
                              $sel = ($i==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
                          <?php }?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('year'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('mileage');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <div class="input-group">
                          <?php $v = (set_value('mileage')!='')?set_value('mileage'):$car->mileage;?>
                          <input type="text" name="mileage" value="<?php echo $v;?>" placeholder="Mileage" class="form-control" >
                          <span class="input-group-addon" style="border-radius: 0 5px 5px 0;"><?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></span>
                      </div>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('mileage'); ?>
                  </div>
              </div>
          </div>


          <div class="col-md-6">
              <div class="form-group">
                  <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('price');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <div class="input-group">
                          <?php $v = (set_value('price')!='')?set_value('price'):$car->price;?>
                          <span class="input-group-addon"><?php echo $this->session->userdata('system_currency'); ?></span>
                          <input type="text" id="price" name="price" value="<?php echo $v;?>" placeholder="Total Price" class="form-control input-sm" >
                      </div>
                      <!-- added on version 1.7-->
                      <?php 
                      $v = '0';
                      if(isset($_POST['ask_for_price']))
                        $v = $_POST['ask_for_price'];
                      else
                      {
                        if($car->price<0)
                          $v = 1;
                      }
                      $chk = ($v==1)?'checked="checked"':'';
                      ?>
                      <span class="help-inline"><label><input type="checkbox" name="ask_for_price" id="ask_for_price" value="1" <?php echo $chk;?>> <?php echo lang_key('ask_for_price');?></label></span>
                      <?php echo form_error('price'); ?>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('transmission');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php

                      $custom_transmissions = $CI->config->item('car_transmission');
                      ?>

                      <select name="transmission" class="form-control input-sm">
                          <?php $v = (set_value('transmission')!='')?set_value('transmission'):$car->transmission;?>
                          <?php foreach ($custom_transmissions as $option) {
                              $sel = ($option['title']==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $option['title'];?>" <?php echo $sel;?>><?php echo lang_key($option['title']);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('transmission'); ?>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('condition');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php $custom_conditions = $CI->config->item('car_condition'); ?>
                      <?php $v = (set_value('condition')!='')?set_value('condition'):$car->condition;?>
                      <select name="condition" class="form-control input-sm">
                          <?php foreach ($custom_conditions as $status) {
                              $sel = ($status['title']==$v)?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $status['title'];?>" <?php echo $sel;?>><?php echo lang_key($status['title']);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('condition'); ?>
                  </div>
              </div>
              <?php if(is_admin()){ ?>
                  <div class="form-group">
                      <label class="col-md-4 col-sm-4 control-label">Agent :</label>
                      <div class="col-md-8 col-sm-8 controls">
                          <?php $CI = get_instance();
                          $CI->load->model('show/show_model');
                          $agents = $CI->show_model->get_users_by_range('all','','first_name');?>
                          <select name="created_by" class="form-control input-sm">
                              <?php $v = (set_value('created_by')!= '') ? set_value('created_by') : $CI->session->userdata('user_id'); ?>
                              <?php foreach ($agents->result() as $agent) {
                                  $sel = ($agent->id== $v)?'selected="selected"':'';
                                  ?>
                                  <option value="<?php echo $agent->id;?>" <?php echo $sel;?>><?php echo $agent->first_name.' '.$agent->last_name;?></option>
                              <?php } ?>
                          </select>
                          <span class="help-inline">&nbsp;</span>
                          <?php echo form_error('created_by'); ?>
                      </div>
                  </div>
              <?php } ?>
              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('tags');?>:</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php $v = (set_value('tags')!='')?set_value('tags'):get_post_meta($car->id,'tags','');?>
                      <textarea class="form-control" name="tags"><?php echo $v;?></textarea>
                      <span class="help-inline">Put tags as , (comma) separated</span>
                      <?php echo form_error('tags'); ?>
                  </div>
              </div>
          </div>
          <div class="clearfix"></div>


      </div>
    </div>

    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i><?php echo lang_key('other_info');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

       <div class="box-content">

           <div class="col-md-6">
               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('reg_no');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('reg_no')!='')?set_value('reg_no'):$car->reg_no;?>
                       <input type="text" name="reg_no" value="<?php echo $v;?>" placeholder="Ex-78123" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('reg_no'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('engine_size');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('engine_size')!='')?set_value('engine_size'):$car->engine_size;?>
                       <input type="text" name="engine_size" value="<?php echo $v;?>" placeholder="Ex- 2000cc/4.9L" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('engine_size'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('engine_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('engine_type')!='')?set_value('engine_type'):$car->engine_type;?>
                       <input type="text" name="engine_type" value="<?php echo $v;?>" placeholder="Ex-V8 Engine" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('engine_type'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('exterior_color');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('exterior_color')!='')?set_value('exterior_color'):$car->exterior_color;?>
                       <input type="text" name="exterior_color" value="<?php echo $v;?>" placeholder="Ex-Green" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('exterior_color'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('interior_color');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('interior_color')!='')?set_value('interior_color'):$car->interior_color;?>
                       <input type="text" name="interior_color" value="<?php echo $v;?>" placeholder="Ex-Green" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('interior_color'); ?>
                   </div>
               </div>
           </div>

           <div class="col-md-6">
               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('fuel_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $options = array("Gas", "Diesel", "Petrol", "Octane", "Others");?>
                       <select name="fuel_type" class="form-control input-sm">
                           <?php $v = (set_value('fuel_type')!='')?set_value('fuel_type'):$car->fuel_type;?>
                           <?php foreach ($options as $option) {
                               $sel = ($option==$v)?'selected="selected"':'';
                               ?>
                               <option value="<?php echo $option;?>" <?php echo $sel;?>><?php echo lang_key($option);?></option>
                           <?php } ?>
                       </select>
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('fuel_type'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('safety_rating');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $options = array("1", "2", "3", "4","5");?>
                       <select name="safety_rating" class="form-control input-sm">
                           <?php $v = (set_value('safety_rating')!='')?set_value('safety_rating'):$car->safety_rating;?>
                           <?php foreach ($options as $option) {
                               $sel = ($option==$v)?'selected="selected"':'';
                               ?>
                               <option value="<?php echo $option;?>" <?php echo $sel;?>><?php echo lang_key($option);?></option>
                           <?php } ?>
                       </select>
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('safety_rating'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('standard_seating');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('no_of_seats')!='')?set_value('no_of_seats'):$car->no_of_seats;?>
                       <input type="text" name="no_of_seats" value="<?php echo $v;?>" placeholder="No of seats" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('no_of_seats'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('steering_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('steering_type')!='')?set_value('steering_type'):$car->steering_type;?>
                       <input type="text" name="steering_type" value="<?php echo $v;?>" placeholder="Ex- Power Steering" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('steering_type'); ?>
                   </div>
               </div>
           </div>

          <div class="clearfix"></div>

       </div>
    </div>    

    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i><?php echo lang_key('dimensions');?> (Optional)</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

       <div class="box-content">

           <div class="col-md-6">
               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('height');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('height')!='')?set_value('height'):$car->height;?>
                       <input type="text" name="height" value="<?php echo $v;?>" placeholder="Total Price" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('height'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('width');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('width')!='')?set_value('width'):$car->width;?>
                       <input type="text" name="width" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('width'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('length');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('length')!='')?set_value('length'):$car->length;?>
                       <input type="text" name="length" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('length'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('wheelbase');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('wheel_base')!='')?set_value('wheel_base'):$car->wheel_base;?>
                       <input type="text" name="wheel_base" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('wheel_base'); ?>
                   </div>
               </div>
           </div>


           <div class="col-md-6">
               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('track_rear');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('track_rear')!='')?set_value('track_rear'):$car->track_rear;?>
                       <input type="text" name="track_rear" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('track_rear'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('track_front');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('track_front')!='')?set_value('track_front'):$car->track_front;?>
                       <input type="text" name="track_front" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('track_front'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('ground_clearance');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $v = (set_value('ground_clearance')!='')?set_value('ground_clearance'):$car->ground_clearance;?>
                       <input type="text" name="ground_clearance" value="<?php echo $v;?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('ground_clearance'); ?>
                   </div>
               </div>
           </div>
          <div class="clearfix"></div>

       </div>
    </div>

    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i><?php echo lang_key('car_brochure');?> (Optional)</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

      <div class="box-content">
        
        <div class="form-group">

            <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key('car_brochure');?>:</label>
            <div class="col-sm-4 col-lg-5 controls">
                <?php $v = (isset($_POST['car_brochure'])) ? $_POST['car_brochure'] : get_post_meta($car->id,'car_brochure'); ?>
                <input type="hidden" name="car_brochure" id="car_brochure_input" value="<?php echo $v;?>">
                <iframe src="<?php echo site_url('admin/carshop/brochureuploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                <div class="clearfix"></div>
                <span class="help-inline">Upload PDF, Doc or DocX file</span>

            </div>

        </div>

      

      <?php if($v == 'n/a'){
      ?>
          <span id="brochure-error"><label class="col-sm-3 col-lg-2">&nbsp;</label><div class="col-sm-4 col-lg-5"><div class="alert alert-info" style="margin-bottom:0;"><?php echo "No brochure uploaded";?></div></div></span>
      <?php }else if($v != ''){
      ?>
          <span id="brochure-error"><label class="col-sm-3 col-lg-2">&nbsp;</label><div class="col-sm-4 col-lg-5"><div class="alert alert-success" style="margin-bottom:0;"><a href="<?php echo base_url('uploads/gallery/'.$v);?>">View brochure: <?php echo $v;?></a></div></div></span>
      <?php
      } else {
      ?>
      <span id="brochure-error"></span>
      <?php }
      ?>

      <div class="clearfix"></div>
      </div>
    </div>

    <?php 
          $this->config->load('carshop');
          $enable_custom_fields = $this->config->item('enable_custom_fields');
          if($enable_custom_fields=='Yes')
          {


    ?>
    <!-- custom box start -->
    <div class="box">

      <div class="box-title">
        <h3><i class="fa fa-bars"></i><?php echo lang_key('custom_fields');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

      <div class="box-content">
            <?php 
              $custom_values = (array)json_decode(get_post_meta($car->id,'custom_values','[]'));
              $fields = $this->config->item('custom_fields');
              foreach ($fields as $field) {
                $field_val = (isset($custom_values[$field['name']]))?$custom_values[$field['name']]:'';
                $v = (set_value($field['name'])!='')?set_value($field['name']):$field_val;
                if($field['type']=='text')
                {
                  ?>
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key($field['title']); ?>:</label>
                    <div class="col-sm-6 col-lg-6 controls">
                       
                        <input class="form-control" type="text" name="<?php echo $field['name'];?>" value="<?php echo $v;?>">
                        <?php echo form_error($field['name']);?>
                        <span class="help-inline">&nbsp;</span>
                    </div>
                  </div>

                  <?php
                }
                elseif($field['type']=='textarea')
                {
                  ?>
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key($field['title']); ?>:</label>
                    <div class="col-sm-6 col-lg-6 controls">
                        <textarea name="<?php echo $field['name'];?>" class="form-control"><?php echo $v;?></textarea>
                        <?php echo form_error($field['name']);?>
                        <span class="help-inline">&nbsp;</span>
                    </div>
                  </div>
                  <?php
                }
                elseif($field['type']=='select')
                {
                  ?>
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key($field['title']); ?>:</label>
                    <div class="col-sm-6 col-lg-6 controls">
                        <select class="form-control" name="<?php echo $field['name'];?>">
                          <?php foreach ($field['value'] as $key => $label) {
                              $sel = ($v==$key)?'selected="selected"':'';
                            ?>
                              <option value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $label;?></option>
                            <?php
                          }?>
                        </select>
                        <?php echo form_error($field['name']);?>
                        <span class="help-inline">&nbsp;</span>
                    </div>
                  </div>
                  <?php
                }
              }
            ?>
            <div class="clearfix"></div>    
      </div>
    </div>

    <!-- end custom box -->
    <?php
        }
    ?>

    <!-- image box start -->
    <div class="box">

      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Images</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

       <div class="box-content">

            
           <div class="col-md-6">
               <h4>Featured Image :</h4>
               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label">&nbsp;</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $featured_img = (set_value('featured_img')!='')?set_value('featured_img'):$car->featured_img;?>
                       <img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id($featured_img);?>" style="width:256px;">
                   </div>
                   <div class="clearfix"></div>
                   <span id="featured-photo-error"></span>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label">Featured Image:</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo $featured_img;?>">
                       <iframe src="<?php echo site_url('admin/carshop/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                       <?php echo form_error('featured_img');?>
                       <span class="help-inline">&nbsp;</span>
                   </div>
               </div>
               <div class="clearfix"></div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('embed_video_url');?>:</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <span id="video_preview"></span>
                       <input type="text" class="form-control" name="video_url" id="video_url" value="<?php echo get_post_meta($car->id,'video_url');?>">
                       <span class="help-inline">youtube or videmo url</span>
                   </div>
               </div>
               <div class="clearfix"></div>
           </div>

            <div class="col-md-6">
                <h4>Gallery :</h4>
                <?php $gallery = ($car->gallery!='')?json_decode($car->gallery):array();?>
                <ul class="multiple-uploads">
                    <?php foreach ($gallery as $item) {
                        ?>
                        <li style="margin:10px 10px 0 0;overflow:hidden">
                            <input type="hidden" name="gallery[]" value="<?php echo $item;?>" />
                            <image src="<?php echo base_url('uploads/gallery/'.$item);?>" style="height:100%"/>
                            <!-- updated on version 1.5 -->
                            <div class="remove-image" onclick="removeImage(this);" img="<?php echo $item;?>">X</div>
                            <!-- end -->
                        </li>
                    <?php }?>
                    <li class="add-image" id="dragandrophandler">+</li>
                </ul>
                <div class="clearfix"></div>
                <span style="font-size:14px;font-style: italic;">NB: you can drag drop to reorder the gallery photos. Photos are not resized.</span>
                <div class="clearfix" style="height:20px;"></div>
            </div>

           <div class="clearfix"></div>

      </div>
    </div>

    <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Update</button>
    <div class="clearfix"></div>

    <!-- end image box -->
    </form>

  </div>
</div>
<!--Rich text editor-->
<script src="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

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

    $(document).ready(function(){
        jQuery('#video_url').change(function(){
          var url = jQuery(this).val();
          showVideoPreview(url);
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
                
                jQuery.post(
                    "<?php echo site_url('admin/carshop/get_cities_ajax');?>/",
                    {term: request.term,state: jQuery('#selected_state').val()},
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
                if ( term.length < 2 || jQuery('#selected_state').val()=='') {
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

        var base_url = "<?php echo base_url();?>";

        jQuery('.gallery').change(function(){
            var val = jQuery(this).val();
            var src = base_url+'uploads/gallery/'+val;
            var preview = jQuery(this).attr('preview');
            jQuery('.'+preview).attr('src',src);
        });

        jQuery('#featured_photo_input').change(function(){
            var val = jQuery(this).val();
            var src = base_url+'uploads/thumbs/'+val;
            jQuery('#featured_photo').attr('src',src);
        }).change();

        jQuery('.add-another').click(function(e){
            e.preventDefault();
            var length = no_of_images++;
            var html = '<li>'+
                            '<div class="form-group">'+
                                '<label class="col-sm-3 col-lg-2 control-label">'+
                                    '<img class="thumbnails thumb'+length+'" src="<?php echo base_url("assets/admin/img/gallery-preview.jpg");?>" style="width:80px;">'+
                                '</label>'+
                                '<div class="col-sm-2 col-lg-3 controls">'+
                                    '<input type="hidden" name="gallery[]" class="gallery_photo'+length+' gallery" preview="thumb'+length+'" value="">                    '+
                                    '<iframe src="<?php echo site_url("admin/carshop/galleryimguploader");?>/'+length+'" style="border:0;margin:0;padding:0;height:130px;"></iframe>'+
                                    '<span class="help-inline gallery-error'+length+'"></span>'+
                                '</div>'+
                                '<div class="col-sm-2 col-lg-1 controls">'+
                                   ' <a href="javascript:void(0);" style="color:red" onclick="removeImage()" img="">X Remove</a>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
            jQuery('.file-upload').append(html);

            jQuery('.gallery').change(function(){
                var val = jQuery(this).val();
                var src = base_url+'uploads/gallery/'+val;
                var preview = jQuery(this).attr('preview');
                jQuery('.'+preview).attr('src',src);
            });             

        });




        jQuery('#select-brand').change(function(){
            var val = jQuery(this).val();
            jQuery.post(
                "<?php echo site_url('show/get_models_ajax');?>/",
                {brand: val},
                function(html){
                    
                    jQuery('#select-model').empty();
                    jQuery('#select-model').html(html);
                    //console.log(options);
                },
                "html"
            );
        });



    });
</script>

<?php require'multiple-uploader.php';?>
<?php require'bulk_uploader_view.php';?>
<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('.multiple-uploads > .add-image').click(function(){
            jQuery('#photoimg').attr('target','.multiple-uploads');
            jQuery('#photoimg').attr('input','gallery');
            jQuery('#photoimg').click();
        });

        jQuery( ".multiple-uploads" ).sortable();

        //added on version 1.7
        jQuery('#ask_for_price').click(function(e){
          ask_for_price();
        });
        ask_for_price();

    });

    //added on version 1.7
    function ask_for_price()
    {
          var val = jQuery('#ask_for_price').attr('checked');
          if(val=='checked')
          {
            jQuery('#price').attr('disabled','disabled');
          }
          else
          {
            jQuery('#price').removeAttr('disabled');            
          }
    }
    //end

    // added on version 1.5
    function removeImage(e)
    {
          var img_e =  e;
          var img = jQuery(e).attr('img');
          jQuery.post(
              "<?php echo site_url('admin/carshop/remove_unused_img');?>/",
              {name:img},
              function(responseText){
                jQuery(img_e).parent().remove();
              },
              "html"
          );

    }
</script>
<style type="text/css">
    .multiple-uploads{
        list-style: none;
        margin:0;
        padding: 10px;
    }
    .multiple-uploads li{
        width: 100px;
        height: 100px;
        float: left;
        margin-right: 10px;
        margin-top: 10px;
        cursor: move;
    }
    .multiple-uploads .add-image{
        border: 3px dashed #aaa;
        height: 100px;
        padding-top: 0px;
        text-align: center;
        width: 100px;
        cursor: pointer !important;
        font-size: 65px;
        color: #aaa;
    }
    .multiple-uploads .add-image:hover{
        border: 3px dashed #78a;
        color: #78a;
    }

    .multiple-uploads .remove-image{
        color: red;
        cursor: pointer;
        float: right;
        font-size: 17px;
        font-weight: bold;
        left: -6px;
        position: relative;
        top: -102px;
        width: 10px;
    }
</style>
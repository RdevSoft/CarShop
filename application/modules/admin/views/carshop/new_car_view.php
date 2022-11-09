<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('msg');?>
    <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/carshop/addcar');?>" method="post">

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
                    <li class="<?php echo (default_lang()==$lang->short_name)?'active':'';?>"><a data-toggle="tab" href="#<?php echo $lang->short_name;?>"><i class="fa fa-home"></i> <?php echo $lang->short_name;?></a></li>
                    <?php $flag++; }?>
                </ul>
                <div class="tab-content" id="myTabContent1">
                     <?php $flag=1; foreach ($active_languages as $lang){ ?>
                     <div id="<?php echo $lang->short_name;?>" class="tab-pane fade in <?php echo (default_lang()==$lang->short_name)?'active':'';?>">

                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Title:</label>
                      <div class="col-sm-4 col-lg-5 controls">
                        <input type="text" name="title<?php echo $lang->short_name;?>" value="<?php echo(set_value('title'.$lang->short_name)!='')?set_value('title'.$lang->short_name):'';?>" placeholder="Title" class="form-control input-sm" >
                        <span class="help-inline">&nbsp;</span>
                        <?php echo form_error('title'.$lang->short_name); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 col-lg-2 control-label">Description:</label>
                      <div class="col-sm-7 col-lg-7 controls">
                        <textarea  style="min-height:200px" class="form-control wysihtml5" name="description<?php echo $lang->short_name;?>"><?php echo(set_value('description'.$lang->short_name)!='')?set_value('description'.$lang->short_name):'';?></textarea>
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
                          <?php foreach ($custom_types as $option) {
                              $sel = ($option['title']==set_value('car_type'))?'selected="selected"':'';
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
                          <?php foreach ($brands->result() as $brand) {
                              $sel = ($brand->id==set_value('brand'))?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $brand->id;?>" <?php echo $sel;?>><?php echo lang_key($brand->name);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('brand'); ?>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('car_model');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <select name="model" class="form-control input-sm" id="select-model">
                          <?php foreach ($models->result() as $model) {
                              $sel = ($model->id==set_value('model'))?'selected="selected"':'';
                              ?>
                              <option value="<?php echo $model->id;?>" <?php echo $sel;?>><?php echo lang_key($model->name);?></option>
                          <?php } ?>
                      </select>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('model'); ?>
                  </div>
              </div>

              <div class="form-group">
                  <label  class="col-md-4 col-sm-4 control-label"><?php echo lang_key('year');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php
                      $this->load->helper('date');
                      $current_year =  mdate("%Y", time());
                      ?>
                      <select name="year" class="form-control">
                          <?php $v = (set_value('year')!='')?set_value('year'):$current_year;?>
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
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('mileage');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <div class="input-group">
                          <input type="text" name="mileage" value="<?php echo(set_value('mileage')!='')?set_value('mileage'):'';?>" placeholder="Mileage" class="form-control" >
                          <span class="input-group-addon" style="border-radius: 0 5px 5px 0;"><?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></span>
                      </div>
                      <span class="help-inline">&nbsp;</span>
                      <?php echo form_error('mileage'); ?>
                  </div>
              </div>
          </div>


          <div class="col-md-6">
              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('price');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <div class="input-group">
                          <span class="input-group-addon"><?php echo $this->session->userdata('system_currency'); ?></span>
                          <input type="text" id="price" name="price" value="<?php echo(set_value('price')!='')?set_value('price'):'';?>" placeholder="Total Price" class="form-control input-sm" >
                      </div>
                      <!-- added on version 1.7-->
                      <?php $chk = (isset($_POST['ask_for_price']) && $_POST['ask_for_price']==1)?'checked="checked"':'';?>
                      <span class="help-inline"><label><input type="checkbox" name="ask_for_price" id="ask_for_price" value="1" <?php echo $chk;?>> <?php echo lang_key('ask_for_price');?></label></span>
                      <?php echo form_error('price'); ?>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('transmission');?> :</label>
                  <div class="col-md-8 col-sm-8 controls">
                      <?php $custom_transmissions = $CI->config->item('car_transmission'); ?>
                      <select name="transmission" class="form-control input-sm">
                          <?php foreach ($custom_transmissions as $option) {
                              $sel = ($option['title']==set_value('transmission'))?'selected="selected"':'';
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
                      <select name="condition" class="form-control input-sm">
                          <?php foreach ($custom_conditions as $status) {
                              $sel = ($status['title']==set_value('condition'))?'selected="selected"':'';
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
                      <label class="col-md-4 col-sm-4 control-label">Dealer :</label>
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
                      <textarea class="form-control" name="tags"><?php echo set_value('tags');?></textarea>
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
        <h3><i class="fa fa-bars"></i><?php echo lang_key('specifications');?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
        </div>
      </div>

       <div class="box-content">

           <div class="col-md-6">
               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('reg_no');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="reg_no" value="<?php echo(set_value('reg_no')!='')?set_value('reg_no'):'';?>" placeholder="Ex-78123" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('reg_no'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('engine_size');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="engine_size" value="<?php echo(set_value('engine_size')!='')?set_value('engine_size'):'';?>" placeholder="Ex- 2000cc/4.9L" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('engine_size'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('engine_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="engine_type" value="<?php echo(set_value('engine_type')!='')?set_value('engine_type'):'';?>" placeholder="Ex-V8 Engine" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('engine_type'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('exterior_color');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="exterior_color" value="<?php echo(set_value('exterior_color')!='')?set_value('exterior_color'):'';?>" placeholder="Ex-Black" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('exterior_color'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('interior_color');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="interior_color" value="<?php echo(set_value('interior_color')!='')?set_value('interior_color'):'';?>" placeholder="Ex-Green" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('interior_color'); ?>
                   </div>
               </div>
           </div>


           <div class="col-md-6">
               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('fuel_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <?php $options = array("Gas", "Diesel", "Petrol",
                           "Octane", "Others");?>
                       <select name="fuel_type" class="form-control input-sm">
                           <?php foreach ($options as $option) {
                               $sel = ($option==set_value('fuel_type'))?'selected="selected"':'';
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
                           <?php foreach ($options as $option) {
                               $sel = ($option==set_value('safety_rating'))?'selected="selected"':'';
                               ?>
                               <option value="<?php echo $option;?>" <?php echo $sel;?>><?php echo lang_key($option);?></option>
                           <?php } ?>
                       </select>
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('safety_rating'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('standard_seating');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="no_of_seats" value="<?php echo(set_value('no_of_seats')!='')?set_value('no_of_seats'):'';?>" placeholder="No of seats" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('no_of_seats'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label class="col-md-4 col-sm-4 control-label"><?php echo lang_key('steering_type');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="steering_type" value="<?php echo(set_value('steering_type')!='')?set_value('steering_type'):'';?>" placeholder="Ex- Power Steering" class="form-control input-sm" >
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
                       <input type="text" name="height" value="<?php echo(set_value('height')!='')?set_value('height'):'';?>" placeholder="Ex- 300inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('height'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('width');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="width" value="<?php echo(set_value('width')!='')?set_value('width'):'';?>" placeholder="Ex- 300inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('width'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('length');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="length" value="<?php echo(set_value('length')!='')?set_value('length'):'';?>" placeholder="Ex- 100inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('length'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('wheelbase');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="wheel_base" value="<?php echo(set_value('wheel_base')!='')?set_value('wheel_base'):'';?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('wheel_base'); ?>
                   </div>
               </div>
           </div>

           <div class="col-md-6">
               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('track_rear');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="track_rear" value="<?php echo(set_value('track_rear')!='')?set_value('track_rear'):'';?>" placeholder="Ex- 300inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('track_rear'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('track_front');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="track_front" value="<?php echo(set_value('track_front')!='')?set_value('track_front'):'';?>" placeholder="Ex- 100inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('track_front'); ?>
                   </div>
               </div>

               <div class="form-group">
                   <label id="sales-label" class="col-md-4 col-sm-4 control-label"><?php echo lang_key('ground_clearance');?> :</label>
                   <div class="col-md-8 col-sm-8 controls">
                       <input type="text" name="ground_clearance" value="<?php echo(set_value('ground_clearance')!='')?set_value('ground_clearance'):'';?>" placeholder="Ex- 200inch" class="form-control input-sm" >
                       <span class="help-inline">&nbsp;</span>
                       <?php echo form_error('ground_clearance'); ?>
                   </div>
               </div>
           </div>

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
              $fields = $this->config->item('custom_fields');
              foreach ($fields as $field) {
                if($field['type']=='text')
                {
                  ?>
                  <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label"><?php echo lang_key($field['title']); ?>:</label>
                    <div class="col-sm-6 col-lg-6 controls">
                        <input class="form-control" type="text" name="<?php echo $field['name'];?>" value="<?php echo set_value($field['name']);?>">
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
                        <textarea name="<?php echo $field['name'];?>" class="form-control"><?php echo set_value($field['name']);?></textarea>
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
                              $sel = (set_value($field['name'])==$key)?'selected="selected"':'';
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

            
            <h4>Featured image :</h4>
            
            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
                <div class="col-sm-4 col-lg-5 controls">
                    <img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id('');?>" style="width:256px;">
                </div>
                <div class="clearfix"></div>                   
                <span id="featured-photo-error"></span> 
            </div>

            <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Featured Image:</label>
                <div class="col-sm-4 col-lg-5 controls">                    
                    <input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo(set_value('featured_img')!='')?set_value('featured_img'):'';?>">                    
                    <iframe src="<?php echo site_url('admin/carshop/featuredimguploader');?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                    <?php echo form_error('featured_img');?>
                    <span class="help-inline">&nbsp;</span>
                </div>          
            </div>
            <div class="clearfix"></div>

            <h4><?php echo lang_key('embed_video_url');?> :</h4>
           <div class="alert alert-danger">First create car. Then you'll be able to add youtube or vimeo url from edit option</div> 
            <h4>Gallery :</h4>
           <div class="alert alert-danger">First create car. Then you'll be able to upload gallery photos from edit option</div> 

      </div>
    </div>

    <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Create</button>
    <div class="clearfix"></div>

    <!-- end image box -->
    </form>

  </div>
</div>
<!--Rich text editor-->
<script src="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url();?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        var base_url = "<?php echo base_url();?>";

        jQuery('#featured_photo_input').change(function(){
            var val = jQuery(this).val();
            if(val!='')
            {
              var src = base_url+'uploads/thumbs/'+val;            
            }
            else
            {
              var src = base_url+'assets/admin/img/preview.jpg'
            }
            jQuery('#featured_photo').attr('src',src);
        }).change();
        

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
        }).change();

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

</script>

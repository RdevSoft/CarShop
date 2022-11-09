<div class="row"> 
  <div class="col-md-12">
    <?php echo $this->session->flashdata('msg');?>
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Create New Package</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
          
        <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/package/addpackage');?>" method="post">
        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">Title:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="title" value="<?php echo(set_value('title')!='')?set_value('title'):'';?>" placeholder="Package Title" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('title'); ?>
          </div>
        </div>      

        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">Description:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <textarea name="description" value="" placeholder="Package Description" class="form-control input-sm"><?php echo(set_value('description')!='')?set_value('description'):'';?></textarea>
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('description'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">Price <?php echo get_currency_icon(get_settings('paypal_settings','currency','USD')).'('.get_settings('paypal_settings','currency','USD').')';?>:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="price" value="<?php echo(set_value('price')!='')?set_value('price'):'';?>" placeholder="Package Price" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('price'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">Maximum post:</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="max_post" value="<?php echo(set_value('max_post')!='')?set_value('max_post'):'';?>" placeholder="Maximum post per day" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('max_post'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">Expiration Time (days):</label>
          <div class="col-sm-4 col-lg-5 controls">
            <input type="text" name="expiration_time" value="<?php echo(set_value('expiration_time')!='')?set_value('expiration_time'):'';?>" placeholder="Package Expiration Time (days)" class="form-control input-sm" >
            <span class="help-inline">&nbsp;</span>
            <?php echo form_error('expiration_time'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-lg-3 control-label">&nbsp;</label>
          <div class="col-sm-4 col-lg-5 controls">            
            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Create Package</button>
          </div>
        </div>


      </form>

    </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Word filter</h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
        <div class="box-content">

        <form action="<?php echo site_url('admin/carshop/addwordfilters');?>" method="post">
            <?php echo $this->session->flashdata('msg');?>
            <div class="form-group">
                <label class="col-sm-1 col-lg-1 control-label">Words</label>
                <div class="col-sm-6 col-lg-7 controls">
                    <textarea name="wordfilters" class="form-control"><?php echo (isset($wordfilters))?$wordfilters:'';?></textarea>
                    <span class="help-inline">Put (,) comma separated word. Ex. bitch|b***h,fuck|f**k</span>
                    <?php echo form_error('wordfilters'); ?>
                </div>
            </div>       
            <div style="clear:both"></div> 
            <div class="form-group">
                <label class="col-sm-1 col-lg-1 control-label">&nbsp;&nbsp;</label>
                <div class="col-sm-6 col-lg-7 controls">
                    <button type="submit" class="btn btn-success">Save &amp; apply</button>
                    <span class="help-inline">&nbsp;</span>
                </div>
            </div>        

            <div style="clear:both"></div> 
        </form>
        </div>
    </div>
  </div>
</div>

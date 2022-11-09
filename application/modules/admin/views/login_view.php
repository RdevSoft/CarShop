<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>carshop | Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'template/includes_top.php';?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/loginpanel.css" />
    <style>
    .login-form-title {
      background-color: #2c3e50;
      color: #fff;
      font-weight: 100;
      padding: 3px 10px;
      -webkit-border-radius: 5px 5px 0px 0px;
      -moz-border-radius: 5px 5px 0px 0px;
      border-radius: 5px 5px 0px 0px;
    }
    </style>
</head>
<body class="login-page">
  <?php //include 'template/theme_settings.php';?>
    <div class="login-wrapper">
      <div style="text-align:center;width:340px;margin:0 auto;">        
              <?php if(isset($error))echo $error;?>
              <?php echo $this->session->flashdata('msg');?>
      </div>
      <form id="form-login" action="<?php echo site_url('admin/auth/login/');?>" method="post">
          
          <div class="login-form-title">
              <h4><i class="fa fa-lock"></i> carshop Admin</h4>
           </div>
            <?php echo $this->session->flashdata('msg');?>
            <div style="text-align:center">
                <img src="<?php echo base_url('assets/images/logo_webhelios_64.png');?>" style="height:60px; margin:20px 0px 0px;" />
            </div>

        <div class="form-group">
          <div class="controls">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                      <input class="form-control" type="text" name="username" placeholder="Username">
                  </div>
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input class="form-control" type="password" name="password" placeholder="password">
                  </div>
          </div>
        </div>

        <div class="form-group">
          <div class="controls">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select name="lang" class="form-control">

                           <?php

                            $CI         = get_instance();
                            $uri        = current_url();
                            $curr_lang  = ($CI->uri->segment(1)!='')?$CI->uri->segment(1):default_lang();

                            if($CI->uri->segment(1)=='')
                                $sel_lang = default_lang();


                            $CI->load->model('admin/system_model');
                            $query = $CI->system_model->get_all_langs();

                            foreach ($query->result() as $lang) {   

                                $uri = str_replace('/'.$curr_lang,'/'.$lang->short_name,$url);

                                $sel = (trim($curr_lang)==$lang->short_name)?'selected="selected"':'';
                                ?>
                                <option value="<?php echo $lang->short_name;?>" <?php echo $sel;?>><?php echo ucwords($lang->lang);?></option>
                                <?php
                            }
                            ?>

                      </select>
                  </div>
          </div>
        </div>

        <?php if(constant("ENVIRONMENT")=='demo'){?>
        <div class="form-group">
          <div class="controls">
                  <div class="input-group">
                      Demo Admin : admin password: 12345
                  </div>
          </div>
        </div>
        <?php }?>
        
        <hr style="margin-bottom:0px;" />
        <div class="form-group">
          <div class="controls">
                  <button type="submit" class="btn btn-primary form-control" style="width:50%">Log In</button>
                  <a href="<?php echo site_url('account/recoverpassword');?>" class="goto-forgot" style="width:49%;margin-right:2px;">Forgot password?</a>
          </div>
        </div>
        <hr/>
      </form>
          
    </div>
    <?php include 'template/includes_bottom.php';?>
</body>
</html>
<div id="navbar" class="navbar">
	<button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
	<span class="fa fa-bars"></span>
	</button>
	<a class="navbar-brand" href="<?php echo site_url('admin');?>">
	<small>
	<img src="<?php echo base_url('assets/admin/img/logo_webhelios_64.png')?>"  style="height:30px">
	<span>Webhelios Admin</span> </small>
	</a>

	<div class="pull-left logged-in-user-info">
	<img class="thumbnail" src="<?php echo get_profile_photo_by_id($this->session->userdata('user_id'),'thumb');?>"  style="" />
		<span style=""><b><?php echo lang_key('Logged in as')?> :</b> <?php echo get_user_title_by_id($this->session->userdata('user_id'));?></span>
	</div>
		
	<ul class="nav carshop-nav pull-right admin-top-menu">
		<li class="user-profile">
			<a data-toggle="dropdown" href="index.html#" class="user-menu dropdown-toggle">
			<i class="fa fa-user"></i>
			<span class="hhh user_info"><?php echo $this->session->userdata('user_name');?></span>
			<i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-navbar" id="user_menu">
				<li style="margin-top:10px;"></li>	
				<li>
				<a href="<?php echo site_url('admin/auth/changepass');?>">
				<i class="fa fa-cog"></i>
					<?php echo lang_key("Change password") ?> </a>
				</li>
				<li>
				<a href="<?php echo site_url('admin/editprofile');?>">
				<i class="fa fa-wrench"></i>
					<?php echo lang_key("Edit profile") ?> </a>
				</li>
				<li>			
				<li class="divider"></li>
				<li>
				<a href="<?php echo site_url('admin/auth/logout')?>">
				<i class="fa fa-sign-out"></i>
					<?php echo lang_key("logout") ?> </a>
				</li>
				<li class="divider"></li>
			</ul>
		</li>
       
       	<!-- added on version 1.5 -->
       
        <li class="user-profile">
            <?php

            $CI         = get_instance();
            $uri        = current_url();
            $curr_lang  = get_current_lang();
            
            $CI->load->model('admin/system_model');
            $languages = $CI->system_model->get_all_langs();

            ?>
            <a data-toggle="dropdown" href="" class="user-menu dropdown-toggle">
                <i class="fa fa-globe"></i>
                <span class="hhh user_info"><?php echo (isset($curr_lang))?$curr_lang:'language';?></span>
                <i class="fa fa-caret-down"></i>
            </a>

            <?php

            if($CI->uri->segment(1)=='')
                $uri .= '/'.default_lang();


            echo '<ul class="dropdown-menu dropdown-navbar" id="user_menu2">';

            $url = $uri;

            foreach ($languages->result() as $lang) {

                $uri = str_replace('/'.$curr_lang.'/','/'.$lang->short_name.'/',$url);

                $sel = ($curr_lang==$short_name)?'active':'';

                echo '<li class="'.$sel.'"><a href="'.$uri.'">'.$lang->lang.'</a></li>';

            }
            echo '</ul>';
            ?>
        </li>

        <!-- end -->
		<li>
			<a href="<?php echo site_url();?>">
				<i class="fa fa-laptop"></i>
				<span class="hhh user_info"><?php echo lang_key("Visit site") ?></span>
			</a>
		</li>
	</ul>
</div>
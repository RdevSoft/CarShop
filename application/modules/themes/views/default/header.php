<!-- Fixed navbar -->

    <div class="navbar navbar-inverse navbar-fixed-top headroom" >

        <div class="container">

            <div class="navbar-header">

                <!-- Button for smallest screens -->

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                    <?php 
                    $logo_type = get_settings('site_settings','logo_type','Image');
                    if($logo_type=='Image')
                    {
                    ?>
                        <a class="navbar-brand" href="<?php echo site_url();?>">
                        <img src="<?php echo get_site_logo();?>" alt="Logo" style="height:63px">
                        </a>
                    <?php 
                    }else{
                    ?>
                    <a class="navbar-brand" href="<?php echo site_url();?>">
                    <h1 class="logo-text" style="color:<?php echo get_settings('site_settings','logo_text_color','#222');?>">
                        <?php echo  get_settings('site_settings','logo_text','No Logo')?>
                    </h1>
                    </a>
                    <?php 
                    }
                    ?>

            </div>

            <div class="navbar-collapse collapse">



                <ul class="nav navbar-nav pull-right">

                

                <?php

                        $CI = get_instance();

                        $CI->load->model('admin/page_model');

                        $CI->page_model->init();

                    ?>



                        <?php 

                            $alias = (isset($alias))?$alias:'';

                            foreach ($CI->page_model->get_menu() as $li) 

                            {

                                if($li->parent==0)

                                $CI->page_model->render_top_menu($li->id,0,$alias);

                            }

                        ?>



                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <?php echo lang_key('type');?> <b class="caret"></b>

                            </a>

                            <ul class="dropdown-menu">

                                <?php 

                                $filter_options = array();

                                $CI->load->config('carshop');
                                $custom_types = $CI->config->item('car_types');
                                if(is_array($custom_types)) foreach ($custom_types as $key => $custom_type) {
                                      $filter_options[$custom_type['title']] = urlencode($custom_type['title']);
                                }

                                foreach ($filter_options as $k=>$v) {

                                ?>

                                <li class="<?php echo is_active_menu('show/type/'.$v);?>">

                                    <a href="<?php echo site_url('show/type/'.$v);?>">

                                        </i>&nbsp;<?php echo lang_key($k);?>

                                    </a>

                                </li>

                                <?php

                                }

                                ?>
                            </ul>    

                        </li>    

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="fa fa-globe"></i> <b class="caret"></b>

                            </a>



                            <?php

                            $CI         = get_instance();

                            $uri        = current_url();

                            $curr_lang  = ($CI->uri->segment(1)!='')?$CI->uri->segment(1):'en';



                            if($CI->uri->segment(1)=='')

                                $uri .= '/en';



                            $CI->load->model('admin/system_model');

                            $query = $CI->system_model->get_all_langs();

                            echo '<ul class="dropdown-menu lang-menu">';

                            $url = $uri;

                            foreach ($query->result() as $lang) {   

                                $uri = str_replace('/'.$curr_lang,'/'.$lang->short_name,$url);

                                $sel = ($curr_lang==$lang->short_name)?'active':'';

                                echo '<li class="'.$sel.'"><a href="'.$uri.'">'.ucwords($lang->lang).'</a></li>';

                            }

                            echo '</ul>';



                            ?>

                        </li>

                        

                   <!--  <li class="active"><a href="#">Home</a></li>

                    <li><a href="<?php echo site_url('show/detail');?>">Detail</a></li>

                    <li><a href="<?php echo site_url('show/search');?>">Advance Search</a></li>

                    <li><a href="<?php echo site_url('show/list_view');?>">List View</a></li> -->

                    <!--li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <li><a href="sidebar-left.html">Left Sidebar</a></li>

                            <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>

                        </ul>

                    </li-->

                    <!--li><a href="<?php echo site_url('show/contact');?>">Contact</a></li-->

                    <?php if(!is_loggedin()){?>

                    <?php if(get_settings('carshop_settings','enable_signup','Yes')=='Yes'){?>

                    <li><a class="btn" data-toggle="modal" href="#myModal"><?php echo lang_key('sign_in'); ?></a></li>

                    <li><a class="btn" href="<?php echo site_url('account/signup');?>"><?php echo lang_key('sign_up'); ?></a></li>

                    <?php }?>

                    <?php }else{?>

                        <?php if(!is_admin()){?>

                        <li><a class="btn" href="<?php echo site_url('admin/carshop/allcarsdealer');?>"><?php echo lang_key('dealer_panel'); ?></a></li>

                        <?php }else{?>

                        <li><a class="btn" href="<?php echo site_url('admin');?>"><?php echo lang_key('admin_panel'); ?></a></li>

                        <?php }?>

                    <li><a class="btn" href="<?php echo site_url('account/logout');?>"><?php echo lang_key('Logout'); ?></a></li>

                    <?php }?>

                </ul>

            </div><!--/.nav-collapse -->

        </div>

    </div> 

    <!-- /.navbar -->
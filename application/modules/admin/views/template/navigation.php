<div id="sidebar" class="navbar-collapse collapse">



		<ul class="nav nav-list">





      <?php if(is_admin()){?>

            <!--<li class="active"> HIGHLIGHTS MENU-->



			<li class="<?php echo is_active_menu('admin/index');?>">



			<a href="<?php echo site_url('admin/index');?>">



			<i class="fa fa-dashboard"></i>



			<span>Dashboard</span>



			</a>



			</li>







			<li class="<?php echo is_active_menu('admin/themes');?>">



			<a href="<?php echo site_url('admin/themes');?>">



			<i class="fa fa-desktop"></i>



			<span>Themes</span>



			</a>



			</li>





      <?php }?>

      <li class="<?php echo is_active_menu('admin/carshop/');?>">



                <a href="#" class="dropdown-toggle">



                    <i class="fa fa-plus-circle"></i>



                    <span>carshop</span>



                    <b class="arrow fa fa-angle-right"></b>



                </a>



                <ul class="submenu">



                  <?php if(is_admin()){?>

                  <li class="<?php echo is_active_menu('admin/carshop/allcars');?>"><a href="<?php echo site_url('admin/carshop/allcars');?>">



                         All <?php echo lang_key('cars');?>



                      </a>



                  </li>


                  <li class="<?php echo is_active_menu('admin/carshop/newcar');?>"><a href="<?php echo site_url('admin/carshop/newcar');?>">



                         <?php echo lang_key('new');?> <?php echo lang_key('car');?>



                      </a>



                  </li>

                  <?php }else{?>

                 <li class="<?php echo is_active_menu('admin/carshop/allcarsdealer');?>"><a href="<?php echo site_url('admin/carshop/allcarsdealer');?>">



                         All <?php echo lang_key('cars');?>



                      </a>



                  </li>

                  <li class="<?php echo is_active_menu('admin/carshop/newcar');?>"><a href="<?php echo site_url('admin/carshop/newcar');?>">



                         New <?php echo lang_key('car');?>



                      </a>



                  </li>
                    <?php if(get_settings('carshop_settings','enable_pricing','Yes')=='Yes'){?>

                      <li class="<?php echo is_active_menu('account/renew');?>"><a href="<?php echo site_url('account/renew');?>">



                             <?php echo lang_key('change_package');?>



                          </a>



                      </li>
                    <?php }?>
                    
                  <?php }?>


                  <li class="<?php echo is_active_menu('admin/carshop/emailtracker');?>"><a href="<?php echo site_url('admin/carshop/emailtracker');?>">

                         <?php echo lang_key('email_tracker');?>

                      </a>

                  </li>

                  <li class="<?php echo is_active_menu('admin/carshop/bulkemailform');?>"><a href="<?php echo site_url('admin/carshop/bulkemailform');?>">

                         <?php echo lang_key('bulk_email');?>

                      </a>

                  </li>


                  <?php if(is_admin()){?>


                  <li class="<?php echo is_active_menu('admin/carshop/brandmodels');?>"><a href="<?php echo site_url('admin/carshop/brandmodels');?>">



                          <?php echo lang_key('manufacturers');?>



                      </a>



                  </li>



                  <li class="<?php echo is_active_menu('admin/carshop/locations');?>"><a href="<?php echo site_url('admin/carshop/locations');?>">



                          Locations



                      </a>



                  </li>







                  

                  <li class="<?php echo is_active_menu('admin/carshop/carshopsettings');?>"><a href="<?php echo site_url('admin/carshop/carshopsettings');?>">



                          Site Settings



                      </a>



                  </li>



                  <li class="<?php echo is_active_menu('admin/carshop/paypalsettings');?>"><a href="<?php echo site_url('admin/carshop/paypalsettings');?>">



                          Paypal Settings



                      </a>



                  </li>



                  <li class="<?php echo is_active_menu('admin/carshop/payments');?>"><a href="<?php echo site_url('admin/carshop/payments');?>">



                          Payment history



                      </a>



                  </li>

                  

                  <li class="<?php echo is_active_menu('admin/carshop/bannersettings');?>"><a href="<?php echo site_url('admin/carshop/bannersettings');?>">



                          carshop Settings



                      </a>



                  </li>



                  <?php }?>

                </ul>







      </li>



      <li class="<?php echo is_active_menu('admin/editprofile');?>">



        <a href="<?php echo site_url('admin/editprofile');?>">



          <i class="fa fa-user"></i>



          <span><?php echo lang_key('profile');?></span>



        </a>



      </li>



      <?php if(is_admin()){?>



      <li class="<?php echo is_active_menu('admin/package/');?>">



            <a href="#" class="dropdown-toggle">



                <i class="fa fa-bars"></i>



                <span>Packages</span>



                <b class="arrow fa fa-angle-right"></b>



            </a>



            <ul class="submenu">



              <li class="<?php echo is_active_menu('admin/package/all');?>"><a href="<?php echo site_url('admin/package/all');?>">



                      All Packages



                  </a>



              </li>

              <?php $urls = array('admin/package/addpackage','admin/package/newpackage');?>

              <li class="<?php echo is_active_menu($urls);?>"><a href="<?php echo site_url('admin/package/newpackage');?>">



                      New Package



                  </a>



              </li>



            </ul>

      </li>





      <li class="<?php echo is_active_menu('admin/users');?>">



      <a href="<?php echo site_url('admin/users');?>">



      <i class="fa fa-users"></i>



      <span>Dealers</span>



      </a>



      </li>







			<li class="<?php echo is_active_menu('admin/widgets/');?>">



                <a href="#" class="dropdown-toggle">



                    <i class="fa fa-bars"></i>



                    <span>Widgets</span>



                    <b class="arrow fa fa-angle-right"></b>



                </a>



                <ul class="submenu">



                  <li class="<?php echo is_active_menu('admin/widgets/all');?>"><a href="<?php echo site_url('admin/widgets/all');?>">



                          All Widgets



                      </a>



                  </li>



                  <li class="<?php echo is_active_menu('admin/widgets/widgetpositions');?>"><a href="<?php echo site_url('admin/widgets/widgetpositions');?>">



                          Widget Positions



                      </a>



                  </li>



                </ul>







			</li>







			<li class="<?php echo is_active_menu('admin/plugins/all');?>">



               <a href="#" class="dropdown-toggle">



               	<i class="fa fa-code-fork"></i>



               	<span>Plugins</span>



                <b class="arrow fa fa-angle-right"></b>



                </a>



               <ul class="submenu">



                  <li class="<?php echo is_active_menu('admin/plugins/all');?>"><a href="<?php echo site_url('admin/plugins/all');?>">All Plugins</a></li>



                  <?php $plugins = get_plugins();?>



                  <?php foreach($plugins->result() as $row){



                      $plugin = json_decode($row->plugin);



                  ?>



                  <li><a href="<?php echo site_url($plugin->access_url);?>"><?php echo $plugin->name;?></a></li>



                  <?php }?>



               </ul>



          	</li>







			<li class="<?php echo is_active_menu('admin/plugins/index');?>">



  			<a href="<?php echo site_url('admin/plugins/index');?>">



    			<i class="fa fa-cloud-upload"></i>



    			<span>Upload</span>



  			</a>



			</li>







			<!--<li class="active"> OPENS SUBMENU BY DEFAULT-->

      <li class="<?php echo is_active_menu('admin/blog/');?>">



                <a href="#" class="dropdown-toggle">



                    <i class="fa fa-file-o"></i>



                    <span>Blog/News/Article</span>



                    <b class="arrow fa fa-angle-right"></b>



                </a>



                <ul class="submenu">



                  <!--<li class="active"> HIGHLIGHTS SUBMENU-->



                  <li class="<?php echo is_active_menu('admin/blog/all');?>"><a href="<?php echo site_url('admin/blog/all');?>">All posts</a></li>



                  <li class="<?php echo is_active_menu('admin/blog/manage');?>"><a href="<?php echo site_url('admin/blog/manage');?>">New post</a></li>



                </ul>



      </li>

			<li class="<?php echo is_active_menu('admin/page/');?>">



                <a href="#" class="dropdown-toggle">



                    <i class="fa fa-file-o"></i>



                    <span>Pages &amp; Menu</span>



                    <b class="arrow fa fa-angle-right"></b>



                </a>



                <ul class="submenu">



                  <!--<li class="active"> HIGHLIGHTS SUBMENU-->



                  <li class="<?php echo is_active_menu('admin/page/all');?>"><a href="<?php echo site_url('admin/page/all');?>">All pages</a></li>



                  <li class="<?php echo is_active_menu('admin/page/index');?>"><a href="<?php echo site_url('admin/page/index');?>">New page</a></li>



                  <li class="<?php echo is_active_menu('admin/page/menu');?>"><a href="<?php echo site_url('admin/page/menu');?>">Menu</a></li>



                </ul>



			</li>















            <!--<li class="active"> OPENS SUBMENU BY DEFAULT-->



			<li class="<?php echo is_active_menu('admin/system');?>">



                <a href="#" class="dropdown-toggle">



                    <i class="fa fa-cog"></i>



                    <span>System</span>



                    <b class="arrow fa fa-angle-right"></b>



                </a>



                <ul class="submenu">



                  <!--<li class="active"> HIGHLIGHTS SUBMENU-->



                  <li class="<?php echo is_active_menu('admin/system/allbackups');?>"><a href="<?php echo site_url('admin/system/allbackups');?>">Manage Backups</a></li>



                  <!--li class="<?php echo is_active_menu('admin/system/newlang');?>"><a href="<?php echo site_url('admin/system/newlang');?>">New Language</a></li-->



                  <li class="<?php echo is_active_menu('admin/system/editlang');?>"><a href="<?php echo site_url('admin/system/editlang');?>">Manage Language</a></li>



                    <li class="<?php echo is_active_menu('admin/system/smtpemailsettings'); ?>"><a
                            href="<?php echo site_url('admin/system/smtpemailsettings'); ?>"><?php echo lang_key('SMTP email settings'); ?></a>
                    </li>


                  <li class="<?php echo is_active_menu('admin/system/emailtmpl');?>"><a href="<?php echo site_url('admin/system/emailtmpl');?>">Edit Email Text</a></li>
                  
                  <li class="<?php echo is_active_menu('admin/system/debugemail');?>"><a href="<?php echo site_url('admin/system/debugemail');?>">Debug email</a></li>



                  <li class="<?php echo is_active_menu('admin/system/sitesettings');?>"><a href="<?php echo site_url('admin/system/sitesettings');?>">Site Settings</a></li>                      



                  <li class="<?php echo is_active_menu('admin/system/settings');?>"><a href="<?php echo site_url('admin/system/settings');?>">Admin Settings</a></li>                    



                </ul>



			</li>



			<?php }?>



						



		</ul>



		<div id="sidebar-collapse" class="visible-lg">



			<i class="fa fa-angle-double-left"></i>



		</div>



	</div>
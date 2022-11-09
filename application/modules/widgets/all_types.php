<h2 class="widget-title"><i class="fa fa-puzzle-piece"></i> <?php echo lang_key('type_filters'); ?></h2>
<div class="sidepanel widget_nav_menu">
    <ul class="menu">
                    <?php
                    $CI = get_instance();

                    $filter_options = array();

                    $CI->load->config('carshop');
                    $custom_types = $CI->config->item('car_types');
                    if(is_array($custom_types)) foreach ($custom_types as $key => $custom_type) {
                          $filter_options[$custom_type['title']] = urlencode($custom_type['title']);
                    }

                    foreach ($filter_options as $k=>$v) {
                    ?>
                    <li class="menu-item <?php echo is_active_menu('show/type/'.$v);?>">
                        <a href="<?php echo site_url('show/type/'.$v);?>">
                            <?php echo lang_key($k);?>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div style="clear:both"></div>
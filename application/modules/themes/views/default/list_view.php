<?php 
    if($query->num_rows()<=0)
    {
        ?>
        <div class="alert alert-warning"><?php echo lang_key('no_cars_found'); ?></div>
        <?php
    }
    else
    {
?>        
        <?php foreach ($query->result() as $row):
            if(get_settings('carshop_settings','hide_posts_if_expired','No')=='Yes')
            {
                  $is_expired = is_user_package_expired($row->created_by);
                  if($is_expired)
                    continue;                    
            }
        ?>
            <?php $title = get_title_for_edit_by_id_lang($row->id,$curr_lang);?>
            <div class="col-md-12 ">
                <div class="thumbnail thumb-shadow">
                <div style="margin-top:10px"></div>
                    <div class="col-md-3 col-sm-3 rtl-right">
                        <div class="property-header">
                            <a href="<?php echo site_url('show/detail/'.$row->unique_id.'/'.url_title($title));?>"></a>
                            <img class="property-header-image" src="<?php echo get_featured_photo_by_id($row->featured_img);?>" alt="<?php echo $title; ?>" style="width:100%">
                            <?php if($row->condition == 'condition_new'){
                                $condition_class  = 'new';
                                $condition_data = lang_key($row->condition);
                            }
                            else if($row->condition == 'condition_used'){
                                $condition_class  = 'used';
                                $condition_data = lang_key($row->condition);
                            }
                            else if($row->condition == 'condition_pre_owned'){
                                $condition_class  = 'recondition';
                                $condition_data = lang_key($row->condition);
                            }
                            else if($row->condition == 'condition_recondition'){
                                $condition_class  = 'recondition';
                                $condition_data = lang_key($row->condition);
                            }
                            else if($row->condition == 'condition_sold'){
                                $condition_class  = 'sold';
                                $condition_data = lang_key($row->condition);
                            }
                            else{
                                $condition_class  = 'others';
                                $condition_data = lang_key($row->condition);
                            }
                            ?>
                            <span class="property-contract-type <?php echo $condition_class; ?>"><span style="font-size: 11px"><?php echo $condition_data; ?></span>

                            </span>

                            <div class="property-thumb-meta">
                                <span class="property-price"><?php echo show_price($row->price);?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="caption" style="padding: 2px;">                            
                            <h4><?php echo character_limiter($title,30);?></h4>
                            <p><?php echo get_brand_model_name_by_id($row->brand).' '.get_brand_model_name_by_id($row->model);?></p>

                            <div style="clear:both;">
                                <span class="rtl-right" style="float:left; font-weight:bold;"><?php echo lang_key('type'); ?>:</span>
                                <span class="rtl-left" style="float:right; "><?php echo lang_key($row->car_type);?></span>
                            </div>

                            <div style="clear:both;">
                                <span class="rtl-right" style="float:left; font-weight:bold;"><?php echo lang_key('transmission'); ?>:</span>
                                <span class="rtl-left" style="float:right; "><?php echo lang_key($row->transmission);?></sup></span>

                            </div>
                            <div style="clear:both;" class="property-utilities">
                                <div style="float: right; padding-top: 0px;">
                                    <div><i class="fa fa-clock-o"></i> <?php echo $row->year;?></div>

                                </div>
                                <div  style="float: left; padding-top: 0px;">
                                    <div><i class="fa fa-tachometer"></i> <?php echo $row->mileage;?> <?php echo get_settings('carshop_settings','mileage_unit','miles'); ?></div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                            <p>
                                <a href="<?php echo site_url('show/detail/'.$row->unique_id.'/'.url_title($title));?>" class="view-listing-button-list ">
                                    <?php echo lang_key('view_listing'); ?>

                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endforeach; ?>
<?php 
    }
?>        
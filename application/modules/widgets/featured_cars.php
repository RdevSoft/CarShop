<?php 
$total = 5;
$curr_lang = ($CI->uri->segment(1)!='')?$CI->uri->segment(1):'en';
$CI = get_instance();
$CI->load->model('show/show_model');
$featured_esates = $CI->show_model->get_featured_cars(0,$total);

if($featured_esates->num_rows() <= 0 ){ ?>
<div class="alert alert-info">No Featured Cars</div>
<?php
} else {
?>
            <div class="widget">

                <h2 class="widget-title"><i class="fa fa-car"></i>&nbsp;<?php echo lang_key('featured_cars'); ?></h2>

                <?php 
                foreach ($featured_esates->result() as $row) {
                ?>
                <?php $title = get_title_for_edit_by_id_lang($row->id,$curr_lang);?>
                <div class="thumbnail thumb-shadow widget-listing">
                    <div class="property-header">
                        <a href="<?php echo site_url('show/detail/'.$row->unique_id.'/'.url_title($title));?>"></a>
                        <img class="property-header-image" src="<?php echo get_featured_photo_by_id($row->featured_img);?>" alt="<?php $title; ?>" style="width:100%">
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
                    </div>
                    <div class="caption" style="padding: 2px;">
                        <span class="property-title"><?php echo character_limiter($title,13);?></span>
                        <div class="clearfix"></div>
                        <span class="property-address" style=""><?php echo get_brand_model_name_by_id($row->brand).' '.get_brand_model_name_by_id($row->model);?></span>
                        <div class="clearfix"></div>
                        <span class="property-address" style=""><?php echo lang_key($row->car_type);?></span>
                        <div class="clearfix"></div>
                        <span class="property-price" style=""><?php echo show_price($row->price);?></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
                }
                ?>                
        </div>
        <div class="view-more"><a class="" href="<?php echo site_url('show/properties/featured');?>"><?php echo lang_key('view_all');?></a></div>
        <div class="clearfix"></div>
<?php } ?>
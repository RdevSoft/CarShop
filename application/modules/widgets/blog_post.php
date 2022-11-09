<?php
$CI = get_instance();
$start =0;
$type='blog';
$PER_PAGE = get_per_page_value();
$posts = $CI->show_model->get_all_active_blog_posts_by_range($start,$PER_PAGE,'id','desc',$type);
?>
<h1 class="widget-title"><i class="fa fa-home fa-4"></i>&nbsp;<?php echo $type;?></h1>
<div class="agent-container" id="panel">
    <?php
    if($posts->num_rows()<=0){
        ?>
        <div class="alert alert-warning"><?php echo lang_key('post_not_found'); ?></div>
    <?php
    }
    else
        foreach($posts->result() as $post){ ?>
            <div class="agent-holder clearfix">
                <h4><a href="<?php echo site_url('show/postdetail/'.$post->id.'/'.dbc_url_title($post->title));?>"><?php echo $post->title;?></a></h4>
                <a href="<?php echo site_url('show/postdetail/'.$post->id.'/'.dbc_url_title($post->title));?>"><img alt="<?php echo $post->title;?>" src="<?php echo get_featured_photo_by_id($post->featured_img);?>" class="post-thumb"></a>
                <?php echo truncate(strip_tags($post->description),400,'&nbsp;<a href="'.site_url('show/postdetail/'.$post->id.'/'.dbc_url_title($post->title)).'">'.lang_key('view_more').'</a>',false);?>

                <?php $detail_link = site_url('show/postdetail/'.$post->id.'/'.dbc_url_title($post->title)); ?>
                <div class="follow-agent clearfix">
                    <ul class="social-networks clearfix">
                        <li class="fb">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $detail_link;?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                        </li>
                        <li class="twitter">
                            <a href="https://twitter.com/share?url=<?php echo $detail_link;?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                        </li>
                        <li class="gplus">
                            <a href="https://plus.google.com/share?url=<?php echo $detail_link;?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    <div class="clearfix"></div>
    <div style="text-align:center">
        <ul class="pagination">
            <?php echo (isset($pages))?$pages:'';?>
        </ul>
    </div>
</div>
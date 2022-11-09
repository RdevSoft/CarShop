<div class="row">

    <div class="col-md-12">

        <?php echo $this->session->flashdata('msg'); ?>

        <?php $page = ($this->uri->segment(5)!='')?$this->uri->segment(5):0;?>

        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i> All reported posts</h3>



                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>



                </div>

            </div>

            <div class="box-content">

                <?php $this->load->helper('text'); ?>

                <?php if ($posts->num_rows() <= 0) { ?>

                    <div class="alert alert-info">No Pages</div>

                <?php } else { ?>

                <form action="" method="post" id="all_posts_form">

                    <div id="no-more-tables">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric"><input type="checkbox" id="select_all"></th>



                                <th class="numeric">#</th>



                                <th class="numeric">Photo</th>



                                <th class="numeric">Title</th>



                                <th class="numeric">Type</th>



                                <th class="numeric">By</th>



                                <th class="numeric">Total reports</th>



                                <th class="numeric">Options</th>



                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1;

                            foreach ($posts->result() as $row): 
                                if($row->posttype=='video')
                                {
                                    $detail_link = site_url('video/'.$row->unique_id.'/'.url_title($row->title));
                                }
                                else
                                {
                                    $detail_link = site_url('meme/'.$row->unique_id.'/'.url_title($row->title));
                                }

                                ?>

                                <tr>

                                    <td data-title="#" class="numeric"><input type="checkbox" name="id[]" value="<?php echo $row->id;?>"></td>



                                    <td data-title="#" class="numeric"><?php echo $i; ?></td>



                                    <td data-title="Photo" class="numeric">                                        

                                        <img src="<?php echo $row->thumb_url; ?>" class="thumbnail" style="height:50px;">

                                    </td>



                                    <td data-title="Name" class="numeric">

                                        <a href="<?php echo $detail_link;?>" target="_blank">

                                            <?php echo character_limiter($row->title,20); ?>

                                        </a>

                                    </td>



                                    <td data-title="Type" class="numeric">

                                        <?php 

                                        echo ($row->posttype!='upload' && $row->posttype!='url')?$row->posttype:'photo';

                                        ?>

                                    </td>



                                    <td data-title="Type" class="numeric">

                                        <a href="<?php echo site_url('admin/users/detail/' . $row->created_by); ?>">

                                            <?php echo get_username_by_id($row->created_by); ?>

                                        </a>

                                    </td>



                                    <td data-title="Email" class="numeric"><?php echo $row->report;?></td>

                                

                                    <td data-title="Options" class="numeric">



                                        <div class="btn-group">



                                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown"

                                               href="ui_button.html#"><i class="fa fa-cog"></i> Action <span

                                                    class="caret"></span></a>



                                            <ul class="dropdown-menu dropdown-info">

                                                <li><a href="<?php echo site_url('admin/carshop/approvepost/'.$page.'/allreported/'.$row->id); ?>">Approve</a>

                                                <li><a href="<?php echo site_url('admin/carshop/deletepost/'.$page.'/allreported/'.$row->id); ?>">Delete</a>

                                                </li>                                                

                                            </ul>



                                        </div>



                                    </td>



                                </tr>

                                <?php $i++;endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <a href="#" id="approve-selected" class="btn btn-info">Approve</a>

                    <a href="#" id="delete-selected" class="btn btn-danger">Delete</a>

                    </form>

                    <div class="pagination" style="margin-top:10px">

                        <ul class="pagination pagination-colory"><?php echo $pages; ?></ul>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">





    jQuery('#searchkey').keyup(function () {



        var val = jQuery(this).val();



        var loadUrl = '<?php echo site_url('admin/search/');?>';



        jQuery("#bookings").html(ajax_load).load(loadUrl, {'key': val});



    });





    var ajax_load = '<div class="box">loading...</div>';





    jQuery('document').ready(function () {



        jQuery.ajaxSetup({



            cache: false



        });



        jQuery('#approve-selected').click(function(e){

            e.preventDefault();

            jQuery('#all_posts_form').attr('action','<?php echo site_url("admin/carshop/bulkapprove/allreported");?>');

            jQuery('#all_posts_form').submit();

        });



        jQuery('#delete-selected').click(function(e){

            e.preventDefault();

            jQuery('#all_posts_form').attr('action','<?php echo site_url("admin/carshop/bulkdelete/allreported");?>');

            jQuery('#all_posts_form').submit();

        });



    });



</script>
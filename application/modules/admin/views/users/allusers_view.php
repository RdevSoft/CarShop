<link href="<?php echo base_url(); ?>assets/datatable/dataTables.bootstrap.css" rel="stylesheet">
<style type="text/css">
    #all-dealers_filter input {
        width: 200px;
    }
</style>
<div class="row">

    <div class="col-md-12">

        <?php echo $this->session->flashdata('msg'); ?>



        <div class="box">

            <div class="box-title">

                <h3><i class="fa fa-bars"></i> All Dealers</h3>

                <?php $page = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 0; ?>

                <div class="box-tool">

                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


                </div>

            </div>

            <div class="box-content">

                <?php $this->load->helper('text'); ?>

                <?php if ($posts->num_rows() <= 0) { ?>

                    <div class="alert alert-info">No Dealers</div>

                <?php } else { ?>
                    <a href="<?php echo site_url('admin/users/exportemails'); ?>" class="btn btn-success">Export Dealer Emails(.csv)</a>

                    <!-- added on version 1.5 -->
                    <a href="<?php echo site_url('admin/users/sendemail'); ?>" class="btn btn-warning">Send Email to Dealers</a>
                    <!-- end -->

                    <div style="clear:both;margin-top:7px;"></div>
                    <div id="no-more-tables">

                        <table id="all-dealers" class="table table-hover">

                            <thead>

                            <tr>

                                <th class="numeric">#</th>


                                <th class="numeric">Photo</th>


                                <th class="numeric">Name</th>


                                <th class="numeric">Type</th>


                                <th class="numeric">Email</th>


                                <th class="numeric">Gender</th>


                                <th class="numeric">Status</th>


                                <th class="numeric">Options</th>


                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1;

                            foreach ($posts->result() as $row): ?>

                                <tr>

                                    <td data-title="#" class="numeric"><?php echo $i; ?></td>


                                    <td data-title="Photo" class="numeric">

                                        <img src="<?php echo get_profile_photo_by_id($row->id, 'thumb'); ?>"
                                             class="thumbnail" style="height:36px;">

                                    </td>


                                    <td data-title="Name" class="numeric"><a

                                            href="<?php echo site_url('admin/users/detail/' . $row->id); ?>"><?php echo $row->user_name; ?></a>

                                    </td>

                                    <td data-title="Type"
                                        class="numeric"><?php
                                        if ($row->user_type == 1)
                                            echo 'Admin';
                                        else if ($row->user_type == 3)
                                            echo 'Moderator';
                                        else
                                            echo 'Dealer';
                                        ?></td>
                                    <td data-title="Email" class="numeric"><?php echo $row->user_email;; ?></td>
                                    <td data-title="Gender"
                                        class="numeric"><?php echo ($row->gender == '') ? 'N/A' : $row->gender; ?></td>
                                    <td data-title="Status" class="numeric">
                                        <?php
                                        if ($row->confirmed != 1)

                                            echo '<div class="label label-info">Pending</div>';

                                        else if ($row->banned == 1)

                                            echo '<div class="label label-danger">Banned</div>';

                                        else {

                                            echo '<div class="label label-success">Active</div>';

                                        }
                                        ?>
                                    </td>
                                    <td data-title="Options" class="numeric">
                                        <div class="btn-group">
                                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-cog"></i> Action <span class="caret"></span></a>


                                            <ul class="dropdown-menu dropdown-info">

                                                <li>
                                                    <a href="<?php echo site_url('admin/edituser/' . $row->id); ?>">Edit</a>
                                                </li>

                                                <li><a href="<?php echo site_url('admin/userdetail/' . $row->id); ?>">Detail</a>

                                                </li>

                                                <?php if ($row->confirmation_key != '') { ?>

                                                    <li>
                                                        <a href="<?php echo site_url('admin/confirmuser/' . $page . '/' . $row->id); ?>">Confirm</a>

                                                    </li>

                                                <?php } ?>

                                                <?php if ($row->user_type != 1) { ?>

                                                    <li>
                                                        <a href="<?php echo site_url('admin/deleteuser/' . $page . '/' . $row->id); ?>">Delete</a>

                                                    </li>

                                                    <?php

                                                    if ($row->banned == 1) {

                                                        ?>

                                                        <li>

                                                            <a href="<?php echo site_url('admin/users/unban_user/' . $row->id . '/' . $this->uri->segment(5)); ?>">Un-Ban</a>

                                                        </li>

                                                    <?php

                                                    } else {

                                                        ?>
                                                        <li>

                                                            <a href="<?php echo site_url('admin/users/ban_user/' . $row->id . '/' . $this->uri->segment(5)); ?>">Ban</a>

                                                        </li>

                                                    <?php

                                                    }

                                                }

                                                ?>

                                            </ul>


                                        </div>


                                    </td>
                                </tr>
                                <?php $i++;endforeach; ?>

                            </tbody>

                        </table>

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
    });


</script>

<script src="<?php echo base_url(); ?>assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery('#all-dealers').dataTable();

    });
</script>
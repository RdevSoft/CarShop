<link href="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.css" rel="stylesheet">
<style type="text/css">
    #payment-history_filter input{
        width: 200px;
    }
</style>
<?php
$curr_page = $this->uri->segment(5);
if($curr_page=='')
  $curr_page = 0;
?>
<div class="row">
   
  <div class="col-md-12">

    <div class="box">

      <div class="box-title">

        <h3><i class="fa fa-bars"></i> All Payments</h3>

        <div class="box-tool">

          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


        </div>

      </div>

      <div class="box-content">

        <?php echo $this->session->flashdata('msg');?>

        <?php if($posts->num_rows()<=0){?>

        <div class="alert alert-info">No data</div>

        <?php }else{?>

        <div id="no-more-tables">

        <table id="payment-history" class="table table-hover">

           <thead>

               <tr>

                  <th class="numeric">#</th>

                  <th class="numeric">User</th>

                  <th class="numeric">Package</th>

                  <th class="numeric">Amount</th>

                  <th class="numeric">Request Date</th>

                  <th class="numeric">Activation date</th>
                  
                  <th class="numeric">Expiration date</th>

                  <th class="numeric">Status</th>

                  <th class="numeric">Actions</th>

               </tr>

           </thead>

           <tbody>

        	<?php $i=$start+1;foreach($posts->result() as $row):  ?>

               <tr>

                  <td data-title="#" class="numeric"><?php echo $i;?></td>
                   <?php $user_fullname = get_user_fullname_by_id($row->user_id); ?>
                  <td data-title="User" class="numeric">
                      <a href="<?php echo $user_fullname == 'N/A' ? 'javascript:void(0)' : site_url('admin/users/detail/'.$row->user_id);?>">
                          <?php echo $user_fullname?></a>
                  </td>

                  <td data-title="Package" class="numeric"><?php echo get_package_name_by_id($row->package_id);?></td>

                  <td data-title="Amount" class="numeric"><?php echo $row->amount;?></td>

                  <td data-title="Request Date" class="numeric"><?php echo $row->request_date;?></td>

                  <td data-title="Activation date" class="numeric"><?php echo $row->activation_date;?></td>
                  
                  <td data-title="Expiration date" class="numeric"><?php echo $row->expirtion_date;?></td>
                  
                  <td data-title="Status" class="numeric"><?php echo get_payment_status_title_by_value($row->is_active);?></td>

                  <td data-title="Action" class="numeric">

                    <div class="btn-group">

                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> Action <span class="caret"></span></a>

                      <ul class="dropdown-menu dropdown-info">

                          <li><a href="<?php echo site_url('admin/carshop/deletehistory/'.$curr_page.'/'.$row->id);?>">Delete</a></li>
                          <li><a href="<?php echo site_url('admin/carshop/confirmtransaction/'.$curr_page.'/'.$row->unique_id);?>"><?php echo lang_key('confirm');?></a></li>

                      </ul>

                    </div>

                  </td>

               </tr>

            <?php $i++;endforeach;?>   

           </tbody>

        </table>

        </div>



        <?php }?>

        </div>

    </div>

  </div>

</div>


<script src="<?php echo base_url();?>assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#payment-history').dataTable();

    });
</script>

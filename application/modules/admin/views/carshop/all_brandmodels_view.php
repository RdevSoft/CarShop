<?php 
$curr_page = $this->uri->segment(5);
if($curr_page=='')
  $curr_page = 0;
?>
<div class="row">

  <div class="col-md-12">

    <a href="<?php echo site_url('admin/carshop/newbrandmodel/brand');?>" class="btn btn-success add-brandmodel">Add brand</a>
    <a href="<?php echo site_url('admin/carshop/newbrandmodel/model');?>" class="btn btn-info add-brandmodel">Add model</a>
    <div style="clear:both;margin-top:20px;"></div>

    <div class="box">

      <div class="box-title">

        <h3><i class="fa fa-bars"></i> All Brandmodels</h3>

        <div class="box-tool">

          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>


        </div>

      </div>

      <div class="box-content">

        <?php echo $this->session->flashdata('msg');?>

        <?php if(count($posts)<=0){?>

        <div class="alert alert-info">No brandmodel</div>

        <?php }else{?>

        <div id="no-more-tables">

        <table class="table table-hover">

           <thead>

               <tr>

                  <th class="numeric">#</th>

                  <th class="numeric">Name</th>

                  <th class="numeric">Type</th>

                  <th class="numeric">Parent</th>

                  <th class="numeric">Actions</th>

               </tr>

           </thead>

           <tbody>

        	<?php $i=1;foreach($posts as $row):
                $dash = '';
                if($row->type=='model')
                  $dash = '|___';
          ?>

               <tr>

                  <td data-title="#" class="numeric"><?php echo $i;?></td>

                  <td data-title="Title" class="numeric"><?php echo $dash.' '.$row->name;?></td>

                  <td data-title="Description" class="numeric"><?php echo $row->type;?></td>

                  <td data-title="Status" class="numeric">

                    <?php echo get_brandmodel_name_by_id($row->parent);?>

                  </td>

                  <td data-title="Action" class="numeric">

                    <div class="btn-group">

                      <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="ui_button.html#"><i class="fa fa-cog"></i> Action <span class="caret"></span></a>

                      <ul class="dropdown-menu dropdown-info">

                          <li><a href="<?php echo site_url('admin/carshop/editbrandmodel/'.$row->type.'/'.$row->id);?>" class="edit-brandmodel">Edit</a></li>
                          <li><a href="<?php echo site_url('admin/carshop/deletebrandmodel/'.$curr_page.'/'.$row->id);?>">Delete</a></li>

                      </ul>

                    </div>

                  </td>

               </tr>

            <?php $i++;endforeach;?>   

           </tbody>

        </table>

        </div>

        <div class="pagination"><ul class="pagination pagination-colory"><?php echo $pages;?></ul></div>

        <?php }?>

        </div>

    </div>

  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="brandmodel-model" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="border-bottom:0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
            <div class="modal-body"  style="padding-top:0px;">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery(".add-brandmodel").click(function(event){
        event.preventDefault();
        var loadUrl = jQuery(this).attr("href");
        jQuery('#brandmodel-model').modal('show');
        jQuery("#brandmodel-model  .modal-body").html("Loading...");
        jQuery.get(
                loadUrl,
                {},
                function(responseText){
                    jQuery("#brandmodel-model  .modal-body").html(responseText);
                },
                "html"
            );
    });

    jQuery(".edit-brandmodel").click(function(event){
        event.preventDefault();
        var loadUrl = jQuery(this).attr("href");
        jQuery('#brandmodel-model').modal('show');
        jQuery("#brandmodel-model  .modal-body").html("Loading...");
        jQuery.get(
                loadUrl,
                {},
                function(responseText){
                    jQuery("#brandmodel-model  .modal-body").html(responseText);
                },
                "html"
            );
    });

    jQuery('#brandmodel-model').on('hidden.bs.modal', function () {
        location.reload();
    });

});
</script>

         <form action="<?php echo site_url('show/advfilter');?>" method="post"> 

              <div  class="blue-border panel panel-primary effect-helix in" id="plain_box">

                  <div class="panel-heading blue"><?php echo lang_key('plain_search'); ?><a class="up" style="float:right" data-action="collapse" href="#plain_box"><i class="fa fa-chevron-up"></i></a></div>

                  <div class="panel-body">

                      <span id="plain_container">

                        <div class="info_list">                      

                              <input class="form-control" type="text" value="<?php echo (isset($data['plainkey']))?rawurldecode($data['plainkey']):'';?>" name="plainkey">

                          </div>

                        <button type="submit" class="btn btn-info  btn-labeled" style="margin:10px 0 10px 0">

                        <?php echo lang_key('search'); ?>

                        <span class="btn-label btn-label-right">

                           <i class="fa fa-search"></i>

                        </span>

                        </button>

                      </span>  

                  </div>

             </div>

            </form>
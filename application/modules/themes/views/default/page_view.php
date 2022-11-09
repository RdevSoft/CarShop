<?php
#whole file updated on version 1.7
$curr_lang = get_current_lang();
$page_local_data = load_page_local_data($alias,$curr_lang);
$layout = get_page_layout($alias);
$page = $query->row_array();

if($page_local_data['status']==0)
{
	
	if(isset($page['content_from']) && $page['content_from']=='Manual')
	{
	    $sidebar = '<div style="margin-top:20px;"></div>'.$page['sidebar'];
	    $content = $page['content'];
	    $status  = $page['status'];
	} 	
}
else
{
	$page_data = $page_local_data;
	$sidebar = '<div style="margin-top:20px;"></div>'.$page_data['sidebar'];
    $content = $page_data['content'];
    $status  = $page_data['status'];
}

?>
 <div class="row">
 	<?php if($layout==0){?>
 	<div class="col-md-3">
 		<?php
			if(isset($sidebar) && $sidebar!='')
	        {
	            	echo '<div class="page-sidebar sidebar">';

					preg_match_all("/\[[^\]]*\]/", $sidebar, $matches);

					foreach ($matches[0] as $key=>$widget_name) {
						
						$widget_name = str_replace('[','',$widget_name);
						$widget_name = str_replace(']','',$widget_name);
						$CI = get_instance();
						$view = load_view('render_widget',array('widget_name'=>$widget_name),TRUE);
						$sidebar = str_replace('['.$widget_name.']', $view, $sidebar);
					}

					echo $sidebar;
		        	echo '</div>';
	        }
 		?>
 	</div>
 	<?php }?>

 	<div class="col-md-9"> 
		<?php 	
			if($query->num_rows()<=0)
			{
				?>
				<div class="alert alert-info">
		        <button data-dismiss="alert" class="close" type="button">×</button>
		        <strong>Oops, page not found :(
			    </div>
				<?php
			}
			else
			{
				$row = $query->row();

				if($row->status!=1)
				{
					?>
					<div class="alert alert-info">
			        <button data-dismiss="alert" class="close" type="button">×</button>
			        <strong><?php echo lang_key('oops'); ?> :(
				    </div>
					<?php
				}
				else
				{
					if(isset($content) && $content!='')
			        {
			        	echo '<div class="page-sidebar" style="min-height:200px;margin-top:20px;">';

						preg_match_all("/\[[^\]]*\]/", $content, $matches);

						foreach ($matches[0] as $key=>$widget_name) {
							
							$widget_name = str_replace('[','',$widget_name);
							$widget_name = str_replace(']','',$widget_name);
							$CI = get_instance();
							$view = load_view('render_widget',array('widget_name'=>$widget_name),TRUE);
							$content = str_replace('['.$widget_name.']', $view, $content);
						}

						echo $content;
			        	echo '</div>';
			        }
				}
			}
		?>
	</div>
	
	<?php if($layout==1){?>
	<div class="col-md-3">
 		<?php
			if(isset($sidebar) && $sidebar!='')
	        {
	           		echo '<div class="page-sidebar sidebar">';

					preg_match_all("/\[[^\]]*\]/", $sidebar, $matches);

					foreach ($matches[0] as $key=>$widget_name) {
						
						$widget_name = str_replace('[','',$widget_name);
						$widget_name = str_replace(']','',$widget_name);
						$CI = get_instance();
						$view = load_view('render_widget',array('widget_name'=>$widget_name),TRUE);
						$sidebar = str_replace('['.$widget_name.']', $view, $sidebar);
					}

					echo $sidebar;
		        	echo '</div>';
	        }
 		?>
	</div>
	<?php }?>		

</div>
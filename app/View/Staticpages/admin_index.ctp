<div class="content">
<div class="header">
  <h1 class="page-title"> Static pages </h1>
</div>
<ul class="breadcrumb">
  <li><a href="#">Home</a> <span class="divider">/</span></li>
  <li class="active"> Static pages </li>
</ul>
<div class="container-fluid">
  <div class="row-fluid">
 	<?php 
		$msg = $this->Session->flash();
		if(!empty($msg)) { ?>
	 		
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><?php echo $msg;?> </strong>
		</div>
     <?php } ?>
    <!--<div class="btn-toolbar"> <a href="<?php echo BASE_URL;?>admin/staticpages/add">
      <button class="btn btn-primary"><i class="icon-plus"></i> New page </button>
      </a>
      <div class="btn-group"> </div>
    </div>-->
    <?php //echo $this->Paginator->numbers(); ?>
    <div class="well">
      <table class="table display" id="" style="border:1px solid #aaa; padding:10px; margin-bottom:20px;">
        <thead>
          <tr>
            <?php /*?>  <th><?php echo $this->Paginator->sort('sid'); ?></th><?php */?>
            <th class="notsort">No</th>
            <th><div id="sort">Name<div id="sorticon"></div></div></th>
            <th><div id="sort">Title<div id="sorticon"></div></div></th>
            <th><div id="sort">Link<div id="sorticon"></div></div></th>
            <th><div id="sort">Status<div id="sorticon"></div></div></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php 
		  $i=1;
		  foreach ($staticpages as $staticpage): ?>
          <tr>
            <?php /*?>  <td><?php echo h($staticpage['Staticpage']['sid']); ?>&nbsp;</td><?php */?>
            <td><?php echo h($i); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_name']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_title']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_link']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['status']); ?>&nbsp;</td>
            <td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $staticpage['Staticpage']['lan'],$staticpage['Staticpage']['sta_link'],'admin'=>'true'),array('class' => 'icon-zoom-in','title'=>'view')); ?> 
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $staticpage['Staticpage']['lan'],$staticpage['Staticpage']['sta_link']),array('class' => 'icon-pencil','title'=>'edit')); ?>
              <!--<a rel="<?php echo BASE_URL?>admin/staticpages/delete/<?php echo $staticpage['Staticpage']['sta_id'];?>" class="test" href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>--></td>
          </tr>
          <?php $i++; endforeach; ?>
        </tbody>
      </table>
      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Delete Confirmation</h3>
        </div>
        <div class="modal-body">
          <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <button class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
      <footer>
        <hr>
        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
      </footer>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(".test").click(function(){
		var rel = $(this).attr('rel');
		$(".btn-danger").attr('id', rel);
		});
	$(".btn-danger").click(function(){
		var href = $(this).attr('id');
		window.location.href = href;
	});
	</script>
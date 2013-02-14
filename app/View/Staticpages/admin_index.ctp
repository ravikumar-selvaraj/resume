<div class="content">        
        <div class="header">            
            <h1 class="page-title"> Static pages </h1>
        </div>        
        <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>staticpages">Home</a> <span class="divider">/</span></li>
					<li class="active"> Static pages </li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<?php 
			if(!empty($_SESSION['Message']['flash'])) { ?>
	 		
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><?php echo $_SESSION['Message']['flash']['message'];?> </strong>
		</div>
     <?php } ?>
                    
<div class="btn-toolbar">
    <a href="<?php echo BASE_URL;?>admin/staticpages/add"><button class="btn btn-primary"><i class="icon-plus"></i> New page </button></a>
  <div class="btn-group">
  </div>
</div>
     <div class="well">
    <table class="table">
          <tr>
          <?php /*?>  <th><?php echo $this->Paginator->sort('sid'); ?></th><?php */?>
            <th><?php echo $this->Paginator->sort('sta_title'); ?></th>
            <th><?php echo $this->Paginator->sort('sta_name'); ?></th>
            <th><?php echo $this->Paginator->sort('sta_link'); ?></th>
            <th><?php echo $this->Paginator->sort('sta_type'); ?></th>
            <th><?php echo $this->Paginator->sort('sta_url'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('createddate'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
          <?php foreach ($staticpages as $staticpage): ?>
          <tr>
          <?php /*?>  <td><?php echo h($staticpage['Staticpage']['sid']); ?>&nbsp;</td><?php */?>
            <td><?php echo h($staticpage['Staticpage']['sta_title']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_name']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_link']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_type']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['sta_url']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['status']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['createdate']); ?>&nbsp;</td>
             
             <td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $staticpage['Staticpage']['sta_id'],'admin'=>'true'),array('class' => 'icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $staticpage['Staticpage']['sta_id']),array('class' => 'icon-pencil')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $staticpage['Staticpage']['sta_id']),array('class' => 'icon-trash'), null, __('Are you sure you want to delete # %s?', $staticpage['Staticpage']['sta_id'])); ?>
		</td>
             
             
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
 <div class="pagination">
    <ul>
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>

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
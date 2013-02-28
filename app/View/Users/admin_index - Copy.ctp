<div class="content">        
        <div class="header">            
            <h1 class="page-title"> User Management </h1>
        </div>        
        <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>users">Home</a> <span class="divider">/</span></li>
					<li class="active"> User Management </li>
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
    <?php //echo $this->Paginator->numbers(); ?>
     <div class="well">
	<table class="table display" id="example" style="border:1px solid #aaa; padding:10px; margin-bottom:20px;">
	 <tr>
          <?php /*?>  <th><?php echo $this->Paginator->sort('sid'); ?></th><?php */?>
            <th>No</th> 
            <th>Name</th>
            <th>E-mail</th>
            <th>Country</th>
            <th>Status</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
	<?php $i=1; foreach ($users as $user): ?>
	<tr>
		 <td><?php echo h($i); ?>&nbsp;</td>
            <td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
             <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['country']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['uid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['uid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['uid']), null, __('Are you sure you want to delete # %s?', $user['User']['uid'])); ?>
		</td>
	</tr>
<?php  $i++; endforeach; ?>
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
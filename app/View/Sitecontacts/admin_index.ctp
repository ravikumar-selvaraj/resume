<div class="content">        
        <div class="header">            
            <h1 class="page-title">Contact Management</h1>
        </div>        
        <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li class="active"> Contact Management </li>
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
                    
<div class="btn-toolbar">
   <!-- <a href="<?php echo BASE_URL;?>admin/staticpages/add"><button class="btn btn-primary"><i class="icon-plus"></i> New page </button></a>-->
  <div class="btn-group">
  </div>
</div>
    <?php //echo $this->Paginator->numbers(); ?>
     <div class="well">
    <table class="table display" id="example" style="border:1px solid #aaa; padding:10px; margin-bottom:20px;">
    <thead>
          <tr>
          <?php /*?>  <th><?php echo $this->Paginator->sort('sid'); ?></th><?php */?>
            <th class="notsort">No</th> 
            <th><div id="sort">Name<div id="sorticon"></div></div></th>
            <th><div id="sort">E-mail<div id="sorticon"></div></div></th>
            <th><div id="sort">Subject<div id="sorticon"></div></div></th>
            <th><div id="sort">Post date<div id="sorticon"></div></div></th>
           <!-- <th>View</th>-->
            <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
          </thead>
          <tbody>
          <?php 
		  $i=1;
		  foreach ($contact as $contact): ?>
          <tr <?php if($contact['Sitecontact']['view']==0) echo 'class="bold"' ?> >
          <?php /*?>  <td><?php echo h($staticpage['Staticpage']['sid']); ?>&nbsp;</td><?php */?>
           <td><?php echo $i; ?>&nbsp;</td>
            <td><?php echo h($contact['Sitecontact']['name']); ?>&nbsp;</td>
             <td><?php echo h($contact['Sitecontact']['email']); ?>&nbsp;</td>
            <td><?php echo h($contact['Sitecontact']['subject']); ?>&nbsp;</td>
             <td><?php echo h($contact['Sitecontact']['date']); ?>&nbsp;</td>
          <!--   <td><?php //echo h($contact['Sitecontact']['view']); ?>&nbsp;</td>-->
             <td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $contact['Sitecontact']['cid'],'admin'=>'true'),array('class' => 'icon-zoom-in','title'=>'view')); ?>
			<?php //echo $this->Html->link(__(''), array('action' => 'edit', $contact['Sitecontact']['uid']),array('class' => 'icon-pencil')); ?>
			<?php //echo $this->Form->postLink(__(''), array('action' => 'delete', $staticpage['Staticpage']['sta_id']),array('class' => 'icon-trash test'), null, __('Are you sure you want to delete # %s?', $staticpage['Staticpage']['sta_id'])); ?>
            	<a rel="<?php echo BASE_URL?>admin/sitecontacts/delete/<?php echo $contact['Sitecontact']['cid'];?>" title="delete" class="test" href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
		</td>
             
             
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
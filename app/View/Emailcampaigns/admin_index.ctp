<div class="content">        
        <div class="header">            
            <h1 class="page-title">Email Campaign</h1>
        </div>        
        <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li class="active">Email Campaign List</li>
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
    <a href="<?php echo BASE_URL;?>admin/emailcampaigns/add"><button class="btn btn-primary"><i class="icon-plus"></i> New Email Campaign</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table display" id="example" style="border:1px solid #aaa; padding:10px; margin-bottom:20px;">
      <thead>
        <tr>
          	<th class="notsort">No</th>
			<th><div id="sort">Name<div id="sorticon"></div></div></th>
			<th><div id="sort">Subject<div id="sorticon"></div></div></th>
			<th><div id="sort">From<div id="sorticon"></div></div></th>
			<th><div id="sort">Message<div id="sorticon"></div></div></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
      </thead>
      <tbody>
	  
	  	<?php 
		$i=1;
		foreach ($emailcampaigns as $emailcampaign){
		?>
        <tr>
        <td><?php echo $i;//h($emailcampaign['Emailcampaign']['ecid']); ?>&nbsp;</td>
		<td><?php echo h($emailcampaign['Emailcampaign']['name']); ?>&nbsp;</td>
		<td><?php echo h($emailcampaign['Emailcampaign']['subject']); ?>&nbsp;</td>
		<td><?php echo h($emailcampaign['Emailcampaign']['from']); ?>&nbsp;</td>
		<td><?php echo substr(strip_tags($emailcampaign['Emailcampaign']['message']),0,30); if(strlen(strip_tags($emailcampaign['Emailcampaign']['message']))>30) echo '...'; ?>&nbsp;</td>
			<td class="actions">
				<a href="<?php echo BASE_URL?>admin/emailcampaigns/view/<?php echo $emailcampaign['Emailcampaign']['ecid'];?>" title="view" ><i class="icon-zoom-in"></i></a>
				<a href="<?php echo BASE_URL?>admin/emailcampaigns/edit/<?php echo $emailcampaign['Emailcampaign']['ecid'];?>" title="edit" ><i class="icon-pencil"></i></a>
              	<a rel="<?php echo BASE_URL?>admin/emailcampaigns/delete/<?php echo $emailcampaign['Emailcampaign']['ecid'];?>"  title="delete" class="test" href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
			</td>
        </tr>
		<?php $i++; }  ?>
		
      </tbody>
    </table>
</div>

<?php /*?><div class="pagination">
    <ul>
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div><?php */?>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete this email campaign?</p>
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

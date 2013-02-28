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
    <?php //echo $this->Paginator->numbers(); ?>
     <div class="well">
    <table class="table display" id="example">
    <thead>
          <tr>
          <?php /*?>  <th><?php echo $this->Paginator->sort('sid'); ?></th><?php */?>
            <th>No</th> 
            <th>Name</th>
            <th>Title</th>
            <th>URL</th>
            <th>Status</th>
          
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
            <td><?php echo h($staticpage['Staticpage']['sta_url']); ?>&nbsp;</td>
            <td><?php echo h($staticpage['Staticpage']['status']); ?>&nbsp;</td>
             
             <td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $staticpage['Staticpage']['sta_id'],'admin'=>'true'),array('class' => 'icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $staticpage['Staticpage']['sta_id']),array('class' => 'icon-pencil')); ?>
			<?php //echo $this->Form->postLink(__(''), array('action' => 'delete', $staticpage['Staticpage']['sta_id']),array('class' => 'icon-trash test'), null, __('Are you sure you want to delete # %s?', $staticpage['Staticpage']['sta_id'])); ?>
            	<a rel="<?php echo BASE_URL?>admin/staticpages/delete/<?php echo $staticpage['Staticpage']['sta_id'];?>" class="test" href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
		</td>
             
             
          </tr>
          <?php $i++; endforeach; ?>
          </tbody>
        </table>
        
        <!--<table class="table display" id="example">
    <thead>
	<tr><th class="sorting_asc" rowspan="1" colspan="1" style="width: 133px;"><a href="/aparajayahcms/admin/departments/index/sort:id/direction:asc">Id</a></th><th class="sorting" rowspan="1" colspan="1" style="width: 302px;"><a class="asc" href="/aparajayahcms/admin/departments/index/sort:name/direction:desc">Name</a></th><th class="sorting" rowspan="1" colspan="1" style="width: 556px;"><a href="/aparajayahcms/admin/departments/index/sort:created/direction:asc">Created</a></th><th class="actions sorting" rowspan="1" colspan="1" style="width: 230px;">Actions</th></tr>
    </thead>
     
	<tbody><tr class="odd">
		<td class=" sorting_1">11&nbsp;</td>
		<td>tamilre&nbsp;</td>
		<td>2013-01-11 11:02:05&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/11"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/11"></a>			<form method="post" style="display:none;" id="post_511e17a2e2264" name="post_511e17a2e2264" action="/aparajayahcms/admin/departments/delete/11"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e2264.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="even">
		<td class=" sorting_1">12&nbsp;</td>
		<td>kumeresh&nbsp;</td>
		<td>2013-01-11 11:02:55&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/12"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/12"></a>			<form method="post" style="display:none;" id="post_511e17a2e1d55" name="post_511e17a2e1d55" action="/aparajayahcms/admin/departments/delete/12"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1d55.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="odd">
		<td class=" sorting_1">13&nbsp;</td>
		<td>english&nbsp;</td>
		<td>2013-01-11 11:03:01&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/13"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/13"></a>			<form method="post" style="display:none;" id="post_511e17a2e1845" name="post_511e17a2e1845" action="/aparajayahcms/admin/departments/delete/13"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1845.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="even">
		<td class=" sorting_1">14&nbsp;</td>
		<td>chgdfgdfg&nbsp;</td>
		<td>2013-01-18 11:10:08&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/14"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/14"></a>			<form method="post" style="display:none;" id="post_511e17a2e1215" name="post_511e17a2e1215" action="/aparajayahcms/admin/departments/delete/14"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1215.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="odd">
		<td class=" sorting_1">4&nbsp;</td>
		<td>kumeresh&nbsp;</td>
		<td>2013-01-10 18:38:23&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/4"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/4"></a>			<form method="post" style="display:none;" id="post_511e17a2e1ad2" name="post_511e17a2e1ad2" action="/aparajayahcms/admin/departments/delete/4"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1ad2.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="even">
		<td class=" sorting_1">5&nbsp;</td>
		<td>english&nbsp;</td>
		<td>2013-01-10 18:38:30&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/5"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/5"></a>			<form method="post" style="display:none;" id="post_511e17a2e1546" name="post_511e17a2e1546" action="/aparajayahcms/admin/departments/delete/5"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1546.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr><tr class="odd">
		<td class=" sorting_1">6&nbsp;</td>
		<td>tamil&nbsp;</td>
		<td>2013-01-10 18:38:37&nbsp;</td>
		<td class="actions">
			<a class="icon-eye-open" href="/aparajayahcms/admin/departments/view/6"></a>			<a class="icon-pencil" href="/aparajayahcms/admin/departments/edit/6"></a>			<form method="post" style="display:none;" id="post_511e17a2e1fd3" name="post_511e17a2e1fd3" action="/aparajayahcms/admin/departments/delete/6"><input type="hidden" value="POST" name="_method"></form><a onclick="document.post_511e17a2e1fd3.submit(); event.returnValue = false; return false;" class="icon-trash" href="#"></a>		</td>
	</tr></tbody></table>-->
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
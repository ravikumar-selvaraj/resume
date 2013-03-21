  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
    
    <div class="resume-box-cont" >
    
    <h2 ><?php echo __("Blog");
		$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage'))));

	?>
    <div class="pull-right" style="color:#727272">
   <?php echo $this->Html->link(__("Delete"),'#',array('class'=>'question_link', 'onClick'=>'bdel(\'User\',\'uid\',\''.$user_de['User']['uid'].'\',\'index\');return false;')); ?>
  </div></h2>
    <?php 
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
		if(!empty($items)){
    foreach ($items as $items)
    { 
										
										?>
    <div class="exp-box <?php echo $template;?> clearfix" <?php echo $style;?> >
    <h3><?php echo $this->html->link($items['title'],$items['link'], array('target'=>'_blank'));?></h3>
    <div class="blog_date"><?php echo date("M d, Y", strtotime($items['pubDate'])); ?></div>
    <div class="blog_desc"> <?php echo html_entity_decode($items['description'],ENT_QUOTES);?></div>
    <!--<ul class="">
    <li><?php //echo html_entity_decode($items['description'],ENT_QUOTES);?></li>
    <li><?php //echo  strip_tags(html_entity_decode($items['description'],ENT_QUOTES), '<p><b>');?></li>
    
    <li></li>
    <li><?php //echo date("d/m/Y", strtotime($items['pubDate']));
    //date('Y m',$items['pubDate']);?></li>
    </ul>-->
    </div>
    <?php } }?>
    
    </div>
    
    
    </div>
</div>
</div>
<script>
function bdel(table,field,value,page){
	
	var result = confirm('<?php echo __("Are you sure you want to delete blog?");?>');  
	if(result){
		$.ajax({
		type: "POST",
		url: "<?php echo BASE_URL?>users/blogdelete",
		data: "table="+table+"&field="+field+"&value="+value+"&page="+page,
		success: function(msg){ 
		//alert('<?php echo BASE_URL.$this->Session->read('User.username') ?>');
		if(msg=='yes')
		{
		
			window.location='<?php echo BASE_URL.$this->Session->read('User.username') ?>'
		}
		
		}
		});
	}
}
</script>    
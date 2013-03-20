  <?php echo $this->Element('side');?>
        <div id="content" class="span9 viewmore middle-col hresume">
	<div id="components">
	<div class="middle dyb_componentsview" style="width:700px;">

     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 class="text"><?php echo __("Interest");?></h2>
                        <div class="widgets">
                          <?php
						  $est = 1;
                        foreach($int as $int) { 
						
						$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$int['Interest']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
						
                        ?>
						<div name="widget_interest" class="widget widget_view widget_interest ">
							<div id="interest_<?php echo $int['Interest']['iid'];?>" class="view widget-middle">
						<div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" onmouseout="exp_div_hide('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" <?php echo $style;?>>
                            <div class="options">
								<h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $int['Interest']['interest_type']?></a></h3>
							</div>
                            <ul class="">
                                <?php $sp=explode(',',$int['Interest']['interest']) ;
                        $i=0;
                        foreach($sp as $sp1) {
							if(trim($sp1)!='') {
							?>
                        <li><?php echo $sp1; ?></li>
                        <?php } $i++;}?>
                          
                   <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editinterest<?php echo $int['Interest']['iid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editinterest',array('in'=>$int['Interest']['iid'])); ?><?php */?>
                 <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?> 
                   <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Interest<?php echo $int['Interest']['iid']; ?>" id="p_int_del_<?php echo $est;?>"  style="padding-left:3px;"  ><?php echo __("Delete");?></a>
                <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editinterest<?php echo $int['Interest']['iid']; ?>" id="p_int_edit_<?php echo $est;?>" ><?php echo __("Edit");?> | </a> 
                
                 </div>
                 
                 <?php echo $this->Element('editinterest',array('in'=>$int['Interest']['iid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$int['Interest']['iid'],'model'=>'Interest','wid'=>'iid','rid'=>Configure::read('userpage').'/interest')); ?>
                <?php } } ?>  
                  
                            </ul>
                           <!-- <a href="" class="pull-right">view all</a>-->
                         </div> 
						 
						 </div>
						 </div>
						 
						  <?php $est++; }?>
						  </div>
                        
                </div>
    
   
      <?php } ?>
    </div>
	</div>
    
    </div>
    
</div>
</div>

<script type="text/javascript">
/*$(".instab").click(function(){
$(this).parents('div.modal-body').find("div.news_ins").append('<div id="interest_div" class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Interest");?></label><div class="controls"><input type="text" id="interest1" name="data[interest][]"><a class="instd btn btn-mini btn-primary" id="delmy">Del</a><span class="help-inline" id="interest_error"></span></div></div>');		
	return true;
					});
					
$('a.instd').live('click',function(){
	$(this).parents('div.control-group').remove();
});*/
</script>
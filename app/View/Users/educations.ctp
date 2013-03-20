 <style>
.norecm
{
	width:254px;
	background:#FFF;
	float:left;
	padding:23px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:17px;
	color:#333;
}
.resumebtn
{
	width:254px;
	background:#eaeaea;
	float:left;
	padding:23px;
	font-size:12px;
	color:#39F;
	text-align:center;
}
.resa
{
	padding:10px;
	font-size:12px;
	color:#39F;
}
</style>
  


                                
                                
                                
  <?php echo $this->Element('side');?>
   <div id="content" class="span9 viewmore middle-col hresume">
	<div id="components">
	<div class="middle dyb_componentsview" style="width:700px;">
	
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 ><?php echo __('Education') ?></h2>
                    <div class="widgets">
                    <?php  $ed=1;    
                    foreach($edu as $edu) { 
					$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$edu['Education']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
                    ?>
					<div name="widget_education" class="widget widget_view widget_education ">
														<div id="education_<?php echo $edu['Education']['eid'];?>" class="view widget-middle">
                  <div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" <?php echo $style;?> >
				  	<div class="options">
                    <h3><a class="move" href="<?php echo BASE_URL;?>pages/update_overall"><?php echo $edu['Education']['course']?></a></h3>
					</div>
                    <div class="blog_date">
                    <?php 
                    echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
                    </div>
                    <ul class="">
                    <?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(trim($sp1) !='') {
						?>
                        
                    <li><?php echo $sp1; ?></li>
                    <?php }  ?>
					
					
                  
                 <?php  $i++;} ?>
              <?php  if($this->Session->read('User.uid')) { if(($this->Session->read('User.username')==Configure::read('userpage'))) { ?>    
                 <div class="editdelete"><a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Education<?php echo $edu['Education']['eid']; ?>" id="p_edu_del_<?php echo $ed;?>" style="padding-left:3px;" ><?php echo __('Delete'); ?>  </a>
      <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" id="p_edu_edit_<?php echo $ed;?>" > <?php echo __('Edit') ?> | </a>  
       
       </div>
                  <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$edu['Education']['eid'],'model'=>'Education','wid'=>'eid','rid'=>Configure::read('userpage').'/educations')); ?>
                 
            <?php } } ?>       
               <?php /*?>  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?><?php */?>
                    </ul>
					<?php if(!empty( $edu['Education']['desc'])){?>
                   <?php echo __('Company Description'); ?>
                    <ul>
                    <li> <?php echo $edu['Education']['desc']?></li>
                   
                  
                    </ul>
                    <?php }?>
                  </div>
				  </div>
				  </div>
                    <?php $ed++; }?>
                    </div>
                    </div>
    
    </div>
    
    
    
    
    
    
      <?php } ?>
</div></div>    
    
    </div>
    
</div>
</div>


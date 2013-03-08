  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 class="text-right">Skills</h2>
                    
                    <?php  $sk = 1;      
                    foreach($skill as $skill) { 
                    ?><div class="exp-box clearfix" onmouseover="exp_div_show('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" onmouseout="exp_div_hide('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')">
                    <h3><a><?php echo $skill['Skill']['skill_area']?></a></h3>
                    <ul class="">
                    <?php $sp=explode(',',$skill['Skill']['skills']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(trim($sp1) !='') {
						?>
                    <li><?php echo $sp1; ?></li>
                    <?php } $i++;}?>
                    <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?><?php */?>
                  
                  <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
                  
                  <div class="editdelete">  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Skill<?php echo $skill['Skill']['sid']; ?>" id="p_skil_del_<?php echo $sk;?>"  style="margin-left:3px;" >Delete</a>
                 <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" id="p_skil_edit_<?php echo $sk;?>" >Edit |  </a> 
              
                 </div>
                 
                  <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$skill['Skill']['sid'],'model'=>'Skill','wid'=>'sid','rid'=>Configure::read('userpage').'/skill')); ?>
                  
                <?php } } ?>  
                  
                    </ul>
                    
                   <!-- <a href="" class="pull-right" id="sdsd">view all</a>-->
                   
                    </div> <?php $sk++;  }?>
                    </div>
    
   
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>
<script type="text/javascript">

$(".skitab").click(function(){	
$(".news_skill").append('<div class="control-group" id="skill_val_div"><label class="control-label" for="inputInfo" style="width:110px;"><?php echo __("Skill");?></label><div class="controls" style="margin-left:140px"><input type="text" id="signup_email" name="data[skill][]"><span class="help-inline" id="skills_error"></span></div></div>');return false;
});



</script>
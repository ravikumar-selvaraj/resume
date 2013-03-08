  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 class="text-right">Interest</h2>
                        
                          <?php
						  $est = 1;
                        foreach($int as $int) { 
                        ?><div class="exp-box clearfix" onmouseover="exp_div_show('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" onmouseout="exp_div_hide('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')">
                            <h3><a><?php echo $int['Interest']['interest_type']?></a></h3>
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
                 <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> 
                   <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Interest<?php echo $int['Interest']['iid']; ?>" id="p_int_del_<?php echo $est;?>"  style="padding-left:3px;"  >Delete</a>
                <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editinterest<?php echo $int['Interest']['iid']; ?>" id="p_int_edit_<?php echo $est;?>" >Edit | </a> 
                
                 </div>
                 
                 <?php echo $this->Element('editinterest',array('in'=>$int['Interest']['iid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$int['Interest']['iid'],'model'=>'Interest','wid'=>'iid','rid'=>Configure::read('userpage').'/interest')); ?>
                <?php } } ?>  
                  
                            </ul>
                           <!-- <a href="" class="pull-right">view all</a>-->
                         </div>   <?php $est++; }?>
                        
                </div>
    
   
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>

<script type="text/javascript">
$(".instab").click(function(){
$(".news_ins").append('<div id="interest_div" class="control-group"><label class="control-label" for="inputInfo" style="width:110px;"><?php echo __("Interest");?></label><div class="controls" style="margin-left:140px;"><input type="text" id="interest1" name="data[interest][]"><span class="help-inline" id="interest_error"></span></div></div>');		
	return true;
					});
</script>
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
  
  <!-- Recommend -->

<div  class="modal hide fade recommendtr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    
                                    <div class="resume-cont clearfix">
                                      <?php   	$recuser=ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage'))));
									if(empty($recuser['User']['image']) && $recuser['User']['username']==Configure::read('userpage')) { ?>
									<img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="CVomg - The best way to show yourself" height="" width="" class="pull-left img-polaroid">
                                     <?php } else { ?>
									 <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $recuser['User']['image']; ?>" height="" width="" class="pull-left img-polaroid">
									<?php } ?> 
                                        <div class="span5 resume_head">
                                            <h3><a href=""><?php echo Configure::read('userpage'); ?></a></h3>
                                            <small class="muted"><?php echo_($recuser['User']['resume_title']); ?></small>  
                                        </div>
                                    </div>
                                    
                                    <div class="recommend-skills">
                                        <p><?php echo __('Recommand '.Configure::read('userpage').'on one of his key-skills'); ?></p>
                                         <?php  $i=1; foreach($recskill as $recskill) { 
										 if(!empty($recskill['Recommentation']['skills'])) {
										  $rec1_for_first=count(ClassRegistry::init('Recomment')->find('all',array('conditions'=>array('rid'=>$recskill['Recommentation']['rid']))));?>
                                         <a href="#" class="ex2" rel="<?php echo $recskill['Recommentation']['rid'];?>" data-placement="top">
                                         <button class="btn btn-info"><?php echo $recskill['Recommentation']['skills'].$rec1_for_first; ?></button></a>
                                        <?php $i++; } } ?>
                                    </div>

                                    <ul class="nav nav-tabs" id="recommend-tab">
                                        <li class="active"><a href="#approval"><?php echo __('Waiting for approval ('.$recount.')'); ?></a></li>
                                        <li><a href="#my-recommend"><?php echo __('All my recommendations ('.$recount1.')'); ?></a></li>
                                    </ul>
 
                                    <div class="tab-content" style=" max-height:300px">
                                     
                                        <div class="tab-pane active" id="approval">
						              <?php  $j=1;
									   foreach($recomment as $recomment) { 
									   
									        $user_send_rec=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$recomment['Recomment']['uid'])));?>
                                           <div style="float:left; width:535px; padding-left:10px; padding-bottom:5px;" id="approve<?php echo $recomment['Recomment']['rid']; ?>"> 
                                           <?php   
												if(empty($user_send_rec['User']['image'])) { ?>
                                           <img src="<?php echo BASE_URL; ?>img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">
                                           <?php } else { ?>
									       <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $user_send_rec['User']['image']; ?>" height="20" width="20" class="pull-left img-polaroid">
									<?php } ?> 
                                            <div class="resume-cont recommend-list clearfix pull-left span6">
                                                <span><?php if($_SESSION['User']['username']==Configure::read('userpage')) { ?><a href=""><i class="icon-remove pull-right"></i></a><?php } ?></span>
                                                <div class=" resume_head">
                                                    <h5><a href=""><?php echo $user_send_rec['User']['username']; ?></a>
                                                    <div class="" id="broadcast_resume" style="float:right">
                                                    <a onclick="acknowledge(this.id,this.rel)" id="ok" rel="<?php echo $recomment['Recomment']['rid']; ?>"><span class="label label-success"><?php echo __('Ok') ?></span></a>
                                                    <a onclick="acknowledge(this.id,this.rel)" id="refuse" rel="<?php echo $recomment['Recomment']['rid']; ?>"><span class="label label-important"><?php echo __('Refuse')?></span></a>
                                                    </div>
                                                    </h5>
                                                    <small class="muted"><?php echo $user_send_rec['User']['resume_title']; ?></small>
                                                    <span class="label label-info">Php</span>
                                                </div>

                                                <input type="text" placeholder="<?php echo $recomment['Recomment']['recommend']; ?>" class="span6" disabled="">
                                                <small class="muted"><?php echo date("j / n / Y",strtotime($recomment['Recomment']['createdate'])); ?></small>
                                            </div></div>
											<?php $j++;} ?>
                                        </div>
                                         
                                        <div class="tab-pane savings" id="my-recommend"style="max-height:300px">
                                        <?php  $k=1;
									   foreach($recomment1 as $recomment1) { 
									        $user_send_rec1=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$recomment1['Recomment']['uid'])));?>
                                           <div style="float:left; width:510px; padding-left:10px; padding-bottom:5px;">
                                           <?php   
												if(empty($user_send_rec1['User']['image'])) { ?>
                                           <img src="<?php echo BASE_URL; ?>img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">
                                           <?php } else { ?>
									       <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $user_send_rec1['User']['image']; ?>" height="20" width="20" class="pull-left img-polaroid">
									<?php } ?> 
                                           
                                            <div class="resume-cont recommend-list clearfix pull-left span6">
                                                <span><?php if($_SESSION['User']['username']==Configure::read('userpage')) { ?><a href=""><i class="icon-remove pull-right"></i></a><?php } ?></span>
                                                <div class=" resume_head">
                                                    <h5><a href=""><?php echo $user_send_rec1['User']['username']; ?></a></h5>
                                                    <small class="muted"><?php echo $user_send_rec1['User']['resume_title']; ?></small>
                                                    <span class="label label-info">Php</span>
                                                </div>

                                                <input type="text" placeholder="<?php echo $recomment1['Recomment']['recommend']; ?>" class="span6" disabled="">
                                                <small class="muted"><?php echo date("j / n / Y",strtotime($recomment1['Recomment']['createdate'])); ?></small>
                                            </div></div>
											<?php $k++;} ?>
                                        
                                        </div>

                                       <button class="btn btn-block" type="button" ><a href=""><?php echo __('Go back to '.Configure::read('userpage').' resume'); ?></a></button>
                                    </div>
                                </div>
                                
                                
                                
  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 ><?php echo __('Education') ?></h2>
                    
                    <?php  $ed=1;    
                    foreach($edu as $edu) { 
                    ?>
                  <div class="exp-box well clearfix" onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" >
                    <h3><a><?php echo $edu['Education']['course']?></a></h3>
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
              <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>    
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
                    <?php $ed++; }?>
                    
                    </div>
    
    </div>
    
    
    
    
    
    
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>

<!--Footer recommend-->

<div class="recommend-fix" style="display:none" id="refoot">
            <a href="" class="add-recommend pull-left" data-toggle="modal" data-target=".recommendtr"><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt=""><?php echo __('Recommendation'); ?></a>
            <div class="recommend-skillsfix span5 offset7">
            <?php  $i=1; $j=1;
			foreach($recedu as $recedu)
			 {  
			 if(!empty($recedu['Recommentation']['skills'])) 
			 {  ?>
                <a href="#" class="ex2" rel="<?php echo $recedu['Recommentation']['rid'];?>" data-placement="top"><button class="btn"><?php echo $recedu['Recommentation']['skills']; ?></button></a>
                
                <?php $j++; }
				 $i++; } 
				 if($j!=6) { ?>
                  <a href="" class="" data-toggle="modal" data-target=".recommendtr"><?php echo __('More'); ?></a>
                  <?php } ?>
            </div>
            <a href="" class="pull-right span1" onclick="changefoot1()"><img src="<?php echo BASE_URL; ?>img/rnd_br_down_icon.png" alt=""></a>
        </div>
  <?php 
   $user_send=ClassRegistry::init('User')->find('first',array('conditions'=>array('username'=>Configure::read('userpage'))));
   $user_sendid=ClassRegistry::init('Recommentation')->find('all',array('conditions'=>array('uid'=>$user_send['User']['uid']))); 
   if(!empty($user_sendid)) { ?>      
<div class="resume_footer1" id="refoot1">
<a onclick="changefoot()" style="padding-left:15px;"><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-top:7px"></a>
</div>
<?php } ?>


<!--script content-->


<div id="ver_content" style="display:none; background:#fff">
  
  <!--if you can recomment-->
  
  <div>
  
  <div class="norecm recme"><?php echo __('No Recommentation For Now'); ?></div>
  
  <div class="norecm same_rec" style="display:none"><?php echo __('You can\'t recomment yourself'); ?></div>
  
   <div class="norecm again_rec" style="display:none"><?php echo __('You Already recomment this person'); ?></div>
   
     <div class="norecm success_rec" style="display:none">
     <?php echo __('Your Recommendation sent succssfully waiting for approval'); ?>
     <br /> <br />
     <a href="users/education" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline"><?php echo __('Back to resume'); ?></a>
     </div>
  
  <!--Recomment text box-->
  
    <div class="norecm recm_code" style="display:none;">
    <textarea rows="2" cols="5" id="recm_code23" name="data[present_code]" style="width:242px;"></textarea></div>
  
   <!--Recommentation button -->
   
   <div class="resumebtn">
     <a href="#" class="btn btn-large btn-primary disabled recmme" style="cursor:pointer" onclick="recommentme()" >
     <img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-right:15px;"><?php echo __('Recomment '.Configure::read('userpage').'') ?> </a> 
     <button class="btn btn-large btn-primary disabled recmbtn1" id="recmbtn" style="display:none" onclick="sentrecomment()"> 
     <input type="hidden" name="" id="" value="0"  class="myskill" />
     <img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-right:15px;"><?php echo __('Recomment '.Configure::read('userpage').'') ?></button>
      <br /> <br />
     <a href="#" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline" data-toggle="modal" data-target=".recommendtr"><?php echo __('See all recommentation') ; ?></a>
   </div>
   
   </div>
   
   
</div>







<script>
$(document).ready(function(){
	$('.ex2').click(function(){
		$('.popover').hide();
		})
$('.ex2').popover({
	html : true,
	content: function() {
		var rel = $(this).attr('rel');
		$.ajax({
		type: "POST",
		data: "recid="+<?php echo $_SESSION['User']['uid']; ?>+"&skill="+rel,
		url: "<?php echo BASE_URL; ?>users/recommentme",
		success: function(msg){
		if(msg=='no'){
		$('.recme').hide();	
		$('.recm_code').hide();	
		$('.resumebtn').hide();
		$('.same_rec').hide();
		$('.again_rec').show();	
		$('.popover').css({'top':'-100px'});
		}
		else if(msg=='same')
		{
		$('.recme').hide();	
		$('.recm_code').hide();	
		$('.resumebtn').hide();
		$('.same_rec').show();
		$('.again_rec').hide();
		$('.popover').css({'top':'-100px'});
		}
		else
		{
		$('.popover').css({'top':'-240px'});
		$('.recme').hide();	
		$('.recm_code').show();	
		$('.same_rec').hide();
		$('.again_rec').hide();
		$('.resumebtn').show();
		$('.recmme').hide();
		$('.recmbtn1').show();	
		$('.myskill').val(rel);
		}	
		}});
		
      return $('#ver_content').html();
    }
	
});










});

function sentrecomment(){
	alert("dg");
	var recval=$('#recm_code23').val();
	var recskil=$('.myskill').val();
		$.ajax({
		type: "POST",
		data: "content="+recval+"&user_id="+<?php echo $_SESSION['User']['uid']; ?>+"&skill_id="+recskil,
		url: "<?php echo BASE_URL; ?>users/sentrecomment",
		success: function(msg){
			if(msg=='success')
			{
				$('.recme').hide();	
				$('.recm_code').hide();	
				$('.resumebtn').hide();
				$('.same_rec').hide();
				$('.again_rec').hide();
				$('.success_rec').show();
				$('.popover').css({'top':'-100px'});
			}
		}});
	}


function poprec() {	 
	$('#refoot').show();
	$('#refoot1').hide();
 }
function changefoot(id) {
	$('#refoot').show();
	$('#refoot1').hide();
 }
 function changefoot1(id) {
	$('#refoot').hide();
	$('#refoot1').show();
 }
  function recommentme(id) {
	var rel = $(this).attr('rel');
	$('.recme').hide();
	$('.recmme').hide();
	$('.recm_code').show();
	$('#recmbtn').show()
	$('.popover').css({'top':'-240px'});
 }
 
 function acknowledge(ids,rel){
	$.ajax({
		type: "POST",
		data: "msgk="+ids+"&rid="+rel,
		url: "<?php echo BASE_URL; ?>users/acknowledge",
		success: function(msg){
			$('#approve'+rel).hide();
			$('.savings').append(msg);
		}});
		
	}
	
	function scat(){
	var logodel=$('#user_logo').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel+"&new="+fygf,
		url: "<?php echo BASE_URL; ?>users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			$(".hai").css({'width' : '140px', 'padding-top' : '0px','top' :'15px'})
			$("#delme").hide();
			$('.display').show();
			$(".display").css({'width' : '150px', 'padding-top' : '0px','top' :'15px'})
				
		}});
	}

  $('#recommend-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
   })
 
 
    </script>
    
    <!--  <a href="#" style="cursor:pointer;" class="btn btn-large btn-primary disabled " data-toggle="modal" data-target="#recommendmy">Recommentation</a>	
<div class="resume_footer" style="display:none" id="refoot">
<div class="resume_footer_rec"><span style="padding-left:10px;"><img src="../img/add.png" ></span><span><a href="#">Recommentation</a></span></div> 
<div class="resume_footer_skill">
<?php foreach($recmd as $recmd1) { ?>
<a><span class="re_skill"><?php echo $recmd1['Recommentation']['skills']; ?></span><span class="re_skill2">2</span></a>
<?php } ?>

<a href="#" id="ex2" data-placement="top">Please, let me speak!</a>
<div id="ver_content" style="display:none; background:#fff">
  <div>
  <div class="norecm">No Recommentation For Now</div>
   <div class="resumebtn">
     <button class="btn btn-info" type="button">PHP 25</button>  <br /> <br />
     <a href="#" style="color:#397; cursor:pointer; font-size:12px; border:none">See all recommentation</a>
   </div>
   </div>
</div>
 </div> 
<div class="resume_back"><a onClick="changefoot1();">old</a> </div>
</div>
<div class="resume_footer1" id="refoot1"><a onClick="changefoot();">new</a></div>-->






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
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 ><?php echo __('Education') ?></h2>
                    
                    <?php  $ed=1;    
                    foreach($edu as $edu) { 
                    ?>
                  <div class="exp-box well clearfix" onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" >
                    <h3><a><?php echo $edu['Education']['course']?></a></h3>
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
              <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>    
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
                    <?php $ed++; }?>
                    
                    </div>
    
    </div>
    
    
    
    
    
    
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>











    
   